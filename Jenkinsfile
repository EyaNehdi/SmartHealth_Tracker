pipeline {
    agent any

    environment {
        APP_IMAGE = "my-laravel-app:latest"
        DOCKER_COMPOSE_FILE = "docker-compose.yml"
        SONARQUBE = "sonnar" // Name of SonarQube server in Jenkins
    }

    stages {

        stage('Hello Test') {
            steps {
                echo 'Hi Jihed'
            }
        }
        stage('Clean Workspace') {
            steps {
                deleteDir() // Deletes all workspace files
            }
        }

        stage('Git Checkout') {
            steps {
                git branch: 'devops',
                    url: 'https://github.com/EyaNehdi/SmartHealth_Tracker.git'

            }
        }
        
            stage('test unitaires') {
            steps {


                sh 'php artisan test'

            }
        }
        stage('Build Laravel Image') {
            steps {
                sh 'docker build -t $APP_IMAGE .'
            }
        }
        stage('SonarQube Analysis') {
    steps {
        withSonarQubeEnv('scanner') {
            sh '/opt/sonar-scanner/bin/sonar-scanner'
        }
    }
}



        stage('Build and Run with Docker Compose') {
            steps {
                sh '''
                    docker compose down --remove-orphans
                    docker compose up -d --build

                '''
            }

        }




    }


}
