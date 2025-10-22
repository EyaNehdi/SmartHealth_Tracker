pipeline {
    agent any

    environment {
        APP_IMAGE = "my-laravel-app:latest"
        DOCKER_COMPOSE_FILE = "docker-compose.yml"
        SONARQUBE = "sonar" // Name of SonarQube server in Jenkins
    }

    stages {
        stage('Hello Test') {
            steps {
                echo 'Hi Jihed'
            }
        }

        stage('Git Checkout') {
            steps {
                git branch: 'devops',
                    url: 'https://github.com/EyaNehdi/SmartHealth_Tracker.git'

            }
        }

        stage('Build Laravel Image') {
            steps {
                sh 'docker build -t $APP_IMAGE .'
            }
        }

        stage('Build and Run with Docker Compose') {
            steps {
                sh '''
                    docker compose -f docker-compose.yml down -v --remove-orphans
                    docker compose -f docker-compose.yml up  --build
                '''
            }




    }


}
