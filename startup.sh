cd docker_server
docker build -t apache-img .
docker create -p 8080:80 --name=apache apache-img
docker start apache
cd ..
cd docker_database
docker build -t postgres-img .
docker create -p 5432:5432 --name=database postgres-img
docker start database
