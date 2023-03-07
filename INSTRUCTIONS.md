## Set Docker User
``
echo 'export DOCKER_USER="$(id -u)"' >> ~/.bash_profile
echo 'export DOCKER_GROUP="$(id -g)"' >> ~/.bash_profile
source ~/.bash_profile
``

## Start Container
``
docker-compose up -d
``