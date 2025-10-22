pipeline {
    agent any

    environment {
        APP_IMAGE = "my-laravel-app:latest"
        DOCKER_COMPOSE_FILE = "docker-compose.yml"
        SONARQUBE = "sonar" // Name of SonarQube server in Jenkins
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
            }
        }

        stage('Wait for Services') {
            steps {
                script {
                    echo "Waiting for MySQL and Laravel to be ready..."
                    // Wait for MySQL
                    sh """
                    until docker compose exec -T mysql-db mysqladmin ping -uroot --silent; do
                        echo 'Waiting 5s for MySQL...'
                        sleep 5
                    done
                    """
                    // Wait for Laravel
                    sh """
                    until docker compose exec -T laravel-app php artisan --version; do
                        echo 'Waiting 5s for Laravel...'
                        sleep 5
                    done
                    """
                }
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
