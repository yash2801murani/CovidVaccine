pipeline {
    agent any

    environment {
        DOCKER_IMAGE     = "yash1231/php-app:latest"
        K8S_DIR          = "k8s"
        AWS_REGION       = "us-east-1"
        EKS_CLUSTER_NAME = "MyCluster"
        PATH             = "/usr/local/bin:/opt/homebrew/bin:/usr/bin:/bin"
    }

    stages {

        stage('Checkout Source Code') {
            steps {
                git branch: 'main', url: 'https://github.com/yash2801murani/CovidVaccine.git'
            }
        }

        stage('Build Docker Image (amd64)') {
            steps {
                echo "Building AMD64 image for EKS..."

                sh """
                docker buildx create --use || true

                docker buildx build \
                    --platform linux/amd64 \
                    -t ${DOCKER_IMAGE} \
                    --push .
                """
            }
        }

        stage('Configure kubectl') {
            steps {
                sh """
                export PATH=${PATH}

                echo "Updating kubeconfig..."
                aws eks update-kubeconfig \
                    --region ${AWS_REGION} \
                    --name ${EKS_CLUSTER_NAME}

                kubectl get nodes
                """
            }
        }

        stage('Deploy PHP App to EKS (NodePort)') {
            steps {
                sh """
                export PATH=${PATH}

                cd ${K8S_DIR}
                kubectl apply -f all-in-one-manifests.yaml
                """
            }
        }
    }

    post {
        success {
            echo "Pipeline completed — App deployed successfully 🎉"
        }
        failure {
            echo "❌ Pipeline failed. Check logs."
        }
    }
}
