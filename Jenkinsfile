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

                // **DEBUG: Show logs**
                sh "docker compose logs mysql-db"

                // **ROBUST WAIT FOR MYSQL**
                sh '''
                echo "=== Waiting for MySQL (60s timeout) ==="
                for i in {1..30}; do
                    if docker compose ps mysql-db | grep "healthy"; then
                        echo "✓ MySQL is HEALTHY!"
                        break
                    elif ! docker compose ps mysql-db | grep "Up"; then
                        echo "✗ MySQL container is DOWN!"
                        docker compose logs mysql-db
                        exit 1
                    else
                        echo "⏳ MySQL starting... ($i/30)"
                        sleep 2
                    fi
                done

                # Final ping test
                if ! docker compose exec -T mysql-db mysqladmin ping -hlocalhost -uroot -prootpass --silent; then
                    echo "✗ MySQL ping failed!"
                    docker compose logs mysql-db
                    exit 1
                fi
                echo "✓ MySQL READY!"
                '''
            }
        }

        stage('Generate App Key') {
            steps {
                sh '''
                docker compose exec -T laravel-app php artisan key:generate --no-interaction --force
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
            echo 'Cleaning up...'
            sh "docker compose -f $DOCKER_COMPOSE_FILE down -v"
        }
    }
}
