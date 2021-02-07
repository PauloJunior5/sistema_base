pipeline {
    agent any
    stages {

        stage("Build") {
            environment {
                DB_HOST = credentials("localhost")
                DB_DATABASE = credentials("sistema_base")
                DB_USERNAME = credentials("paulo")
                DB_PASSWORD = credentials("123456")
            }
            steps {
                sh 'php --version'
                sh 'composer install'
                sh 'composer --version'
                sh 'cp .env.example .env'
                sh 'echo DB_HOST=${DB_HOST} >> .env'
                sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
                sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
                sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
                sh 'php artisan key:generate'
                sh 'cp .env .env.testing'
                sh 'php artisan migrate'
            }
        }

        stage("Test") {
            
            steps {
                echo 'Testing the application...'

            }
        }

        stage("Deploy") {
            
            steps {
                echo 'Deploying the application...'
            }
        }

    }
}