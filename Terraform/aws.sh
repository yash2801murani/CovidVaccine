#!/bin/bash

echo "⚠️ WARNING: This will clean ALL AWS resources in your account!"

# Delete EKS clusters
for cluster in $(aws eks list-clusters --query clusters[] --output text); do
  echo "Deleting EKS cluster: $cluster"
  aws eks delete-cluster --name $cluster
done

# Delete all node groups
for cluster in $(aws eks list-clusters --query clusters[] --output text); do
  for ng in $(aws eks list-nodegroups --cluster-name $cluster --query nodegroups[] --output text); do
    echo "Deleting node group: $ng from cluster: $cluster"
    aws eks delete-nodegroup --cluster-name $cluster --nodegroup-name $ng
  done
done

# Delete EC2 instances
aws ec2 describe-instances --query 'Reservations[].Instances[].InstanceId' --output text | \
xargs -I {} aws ec2 terminate-instances --instance-ids {}

# Delete ELB (classic)
aws elb describe-load-balancers --query 'LoadBalancerDescriptions[].LoadBalancerName' --output text | \
xargs -I {} aws elb delete-load-balancer --load-balancer-name {}

# Delete ALB / NLB
aws elbv2 describe-load-balancers --query 'LoadBalancers[].LoadBalancerArn' --output text | \
xargs -I {} aws elbv2 delete-load-balancer --load-balancer-arn {}

# Delete ECR repos
aws ecr describe-repositories --query 'repositories[].repositoryName' --output text | \
xargs -I {} aws ecr delete-repository --repository-name {} --force

# Delete S3 buckets
for bucket in $(aws s3api list-buckets --query 'Buckets[].Name' --output text); do
  echo "Deleting S3 bucket: $bucket"
  aws s3 rm s3://$bucket --recursive
  aws s3api delete-bucket --bucket $bucket
done

# Delete VPCs
for vpc in $(aws ec2 describe-vpcs --query 'Vpcs[].VpcId' --output text); do
  echo "Force deleting VPC: $vpc"

  # Delete IGWs
  for igw in $(aws ec2 describe-internet-gateways --query 'InternetGateways[].InternetGatewayId' --output text); do
    aws ec2 detach-internet-gateway --internet-gateway-id $igw --vpc-id $vpc || true
    aws ec2 delete-internet-gateway --internet-gateway-id $igw || true
  done

  # Delete subnets
  for subnet in $(aws ec2 describe-subnets --query 'Subnets[].SubnetId' --output text); do
    aws ec2 delete-subnet --subnet-id $subnet || true
  done

  # Delete route tables
  for rt in $(aws ec2 describe-route-tables --query 'RouteTables[].RouteTableId' --output text); do
    aws ec2 delete-route-table --route-table-id $rt || true
  done

  # Delete SGs
  for sg in $(aws ec2 describe-security-groups --query 'SecurityGroups[].GroupId' --output text); do
    aws ec2 delete-security-group --group-id $sg || true
  done

  # Delete VPC
  aws ec2 delete-vpc --vpc-id $vpc || true
done

echo "🎉 Cleanup complete!"
