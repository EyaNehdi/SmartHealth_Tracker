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

        stage('Build Laravel Image') {
            steps {
                sh 'docker build -t $APP_IMAGE .'
            }
        }

        stage('Build and Run with Docker Compose') {
            steps {
                sh '''
                    docker compose -f docker-compose.yml down -v --remove-orphans
                    docker compose -f docker-compose.yml up -d --build
                '''
            }

        }
         stage('Wait for MySQL') {
            steps {
                echo 'Waiting for MySQL to be ready...'
                sh '''
                until docker exec mysql-db mysql -u root -p"$MYSQL_ROOT_PASSWORD" -e "SELECT 1;" &>/dev/null; do
                  echo "Waiting for MySQL..."
                  sleep 5
                done
                '''
            }
        }

        stage('Run Migrations') {
            steps {
                echo 'Running Laravel migrations...'
                sh """
                docker exec ${env.APP_CONTAINER} php artisan migrate --force
                docker exec ${env.APP_CONTAINER} php artisan config:clear
                docker exec ${env.APP_CONTAINER} php artisan cache:clear
                docker exec ${env.APP_CONTAINER} php artisan route:clear
                docker exec ${env.APP_CONTAINER} php artisan view:clear
                docker exec ${env.APP_CONTAINER} php artisan optimize
                """
            }
        }


    }


}
