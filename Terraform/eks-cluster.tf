module "eks" {
  source  = "terraform-aws-modules/eks/aws"
  version = "~> 20.0"

  cluster_name    = var.cluster_name
  cluster_version = "1.28" # Check AWS for the latest supported version

  vpc_id                   = module.vpc.vpc_id
  subnet_ids               = module.vpc.private_subnets # EKS places worker nodes in private subnets
  control_plane_subnet_ids = module.vpc.public_subnets  # EKS control plane ENIs

  # Enable OIDC provider for IAM Roles for Service Accounts (IRSA)
  enable_irsa = true

  # Managed Node Group configuration
  eks_managed_node_groups = {
    general = {
      instance_types = ["t2.medium"]
      min_size     = 1
      max_size     = 3
      desired_size = 2
      # Add the EKS cluster tag required for Cluster Autoscaler (if you install it later)
      tags = {
        "kubernetes.io/cluster/${var.cluster_name}" = "owned"
      }
    }
  }

  tags = {
    Project = "PHP-App-Deployment"
  }
}
