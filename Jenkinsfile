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


          stage('Run Unit Tests') {
            steps {
                script {
                    // Run PHPUnit tests inside the Laravel container
                    sh 'docker exec -it laravel-app vendor/bin/phpunit --log-junit /var/www/html/test-reports/phpunit.xml'
                }
                junit '/var/www/html/test-reports/phpunit.xml'
            }
        }

        stage('SonarQube Analysis') {
            environment {
                SCANNER_HOME = tool name: 'SonarScanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
            }
            steps {
                withSonarQubeEnv('SonarQube') {
                    script {
                        sh """
                        docker exec -it laravel-app vendor/bin/phpstan analyse -c phpstan.neon
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

        stage('Build Laravel Image') {
            steps {
                script {
                    sh 'docker build -t $APP_IMAGE .'
                }
            }
        }

        stage('Start Containers') {
            steps {
                script {
                    sh "docker-compose -f $DOCKER_COMPOSE_FILE up -d --build"
                }
            }
        }

        stage('Run Migrations') {
            steps {
                script {
                    sh 'docker exec -it laravel-app php artisan migrate --force'
                }
            }
        }


    }

    post {
        always {
            echo 'Cleaning up containers...'
            sh "docker-compose -f $DOCKER_COMPOSE_FILE down"
        }
    }
}
