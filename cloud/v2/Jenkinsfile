podTemplate(label: 'phppod', containers: [
    containerTemplate(name: 'php', image: 'reg.x1ankun.com/library/jenkinscicd:phpv2.2', ttyEnabled: true, command: 'bash'),
  ],
  volumes: [
    hostPathVolume(hostPath: '/var/run/docker.sock', mountPath: '/var/run/docker.sock')
  ]) {
    node('phppod') {

        container('php') {
            stage('Get a project') {
                git ''
            }
            stage('Build a project') {
                sh 'composer global require "fxp/composer-asset-plugin:^1.3.1"'
                sh 'composer install -vvv'
                sh './init --env=Development  --overwrite=y'
                echo "jump over.."
            }
            stage('Test a project') {
                echo 'jump over..'
            }
            stage('Pack a project'){
                sh 'tar -zcvf scaffold.tar.gz ./*'
                sh 'mv scaffold.tar.gz docker_builder/project/php.tar.gz'
            }
            stage('Build a project docker iamge'){
                sh "docker login reg.x1ankun.com -u ${params.DOCKER_REG_USER} -p '${params.DOCKER_REG_PASSWD}'"
                sh "sed -i '1s#BASE_SERVER#${params.BASE_SERVER}#' docker_builder/project/Dockerfile"
                sh "cat docker_builder/project/Dockerfile"
		shortCommit = sh(returnStdout: true, script: "git log -n 1 --pretty=format:'%h'").trim()
                sh "docker build -t reg.example.com/library/project:$shortCommit docker_builder/project/"
                sh "docker push reg.example.com/library/project:$shortCommit"
            }
            stage('Apply a project kubernetes yaml'){
                sh "cp -r /root/.kube /home/jenkins/"
                sh "kubectl apply kube-yaml"
            }
        }

    }
}