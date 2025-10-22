pipeline {
    agent any

    environment {
        APP_IMAGE = "my-laravel-app:latest"
        DOCKER_COMPOSE_FILE = "docker-compose.yml"
        SONARQUBE = "sonnar" // name of SonarQube server in Jenkins
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/EyaNehdi/SmartHealth_Tracker.git'
            }
        }

        stage('Build Laravel Image') {
            steps {
                sh 'docker build -t $APP_IMAGE .'
            }
        }

        stage('Start Containers') {
            steps {
                // Stop and remove previous containers
                sh "docker compose -f $DOCKER_COMPOSE_FILE down -v"
                // Start containers
                sh "docker compose -f $DOCKER_COMPOSE_FILE up --build"
            }
        }

        // stage('Wait for Laravel + DB') {
        //     steps {
        //         script {
        //             echo "Waiting for Laravel app to be ready..."
        //             sh """
        //             until docker compose exec -T laravel-app php artisan --version; do
        //                 echo 'Waiting 5s for Laravel container...'
        //                 sleep 5
        //             done
        //             """
        //         }
        //     }
        // }

        // stage('Run Unit Tests') {
        //     steps {
        //         script {
        //             sh "docker compose exec -T laravel-app vendor/bin/phpunit --log-junit /var/www/html/test-reports/phpunit.xml || true"
        //         }
        //         junit 'test-reports/phpunit.xml'
        //     }
        // }

        // stage('SonarQube Analysis') {
        //     environment {
        //         SCANNER_HOME = tool name: 'SonarScanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
        //     }
        //     steps {
        //         withSonarQubeEnv('SonarQube') {
        //             sh """
        //             docker compose exec -T laravel-app vendor/bin/phpstan analyse -c phpstan.neon || true
        //             sonar-scanner \
        //                 -Dsonar.projectKey=laravel-app \
        //                 -Dsonar.sources=app \
        //                 -Dsonar.host.url=$SONAR_HOST_URL \
        //                 -Dsonar.login=$SONAR_AUTH_TOKEN
        //             """
        //         }
        //     }
        // }

        // stage('Run Migrations') {
        //     steps {
        //         sh "docker compose exec -T laravel-app php artisan migrate --force"
        //     }
        // }
    }

    post {
        always {
            echo 'Cleaning up containers...'
            sh "docker compose -f $DOCKER_COMPOSE_FILE down -v"
        }
    }
}
