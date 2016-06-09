docker network create --subnet=10.10.0.0/16 mynet 
cd docker_server
docker build -t apache-img .
docker create --net mynet --ip 10.10.10.10 -p 8080:80 --name=apache apache-img
docker start apache
cd ..
cd docker_database
docker build -t postgres-img .
docker create --net mynet --ip 10.10.10.20 -p 5432:5432 --name=database postgres-img
docker start database
