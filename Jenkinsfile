pipeline {
    agent any

    environment {
        APP_IMAGE = "my-laravel-app:latest"
        DOCKER_COMPOSE_FILE = "docker-compose.yml"
        SONARQUBE = "sonar"
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
                sh "docker compose -f $DOCKER_COMPOSE_FILE down -v"
                sh "docker compose -f $DOCKER_COMPOSE_FILE up -d --build"

                // **WAIT FOR MYSQL TO BE READY**
                sh '''
                echo "Waiting for MySQL to be ready..."
                timeout 60s bash -c 'until docker compose exec -T mysql-db mysqladmin ping -hlocalhost -P3306 -uroot -prootpassword --silent; do echo "MySQL not ready, waiting..."; sleep 2; done'
                echo "MySQL is ready!"
                '''
            }
        }

        stage('Generate App Key & Copy Env') {
            steps {
                sh '''
                # Generate app key if needed
                docker compose exec -T laravel-app php artisan key:generate --no-interaction --force

                # Fix .env permissions
                docker compose exec -T laravel-app chmod 644 .env
                '''
            }
        }

        stage('Run Migrations') {
            steps {
                sh "docker compose exec -T laravel-app php artisan migrate --force"
            }
        }

        stage('Run Unit Tests') {
            steps {
                script {
                    sh "docker compose exec -T laravel-app mkdir -p /var/www/html/test-reports"
                    sh "docker compose exec -T laravel-app vendor/bin/phpunit --log-junit /var/www/html/test-reports/phpunit.xml || true"
                }
                junit 'test-reports/phpunit.xml'
            }
        }

        stage('SonarQube Analysis') {
            when {
                expression { env.SONARQUBE != null }
            }
            environment {
                SCANNER_HOME = tool name: 'SonarScanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
            }
            steps {
                withSonarQubeEnv('SonarQube') {
                    sh """
                    docker compose exec -T laravel-app vendor/bin/phpstan analyse -c phpstan.neon || true
                    sonar-scanner \
                        -Dsonar.projectKey=laravel-app \
                        -Dsonar.sources=app \
                        -Dsonar.host.url=$SONAR_HOST_URL \
                        -Dsonar.login=$SONAR_AUTH_TOKEN
                    """
                }
            }
        }
    }

    post {
        always {
            echo 'Cleaning up containers...'
            sh "docker compose -f $DOCKER_COMPOSE_FILE down -v"
        }
    }
}
