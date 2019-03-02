Note:
This is a regular wordpress site, you do not need docker to run it, you can use a regular wordpress installation.
for DB dump and other info, please ask on JOSA's slack channel #josa-website.


If you want to use docker, follow the following steps:

First time you clone this repo, you will need to run docker, then you will need to activate versionpress and apply changes from git.

## in your terminal:
1- Run Docker using (note you might need to use 'sudo' depending on your installation of docker) 
`dockerd`

2- `cd` to your clone of wp-josa

3- Run the following command to initialize the docker environment: 
`docker-compose up -d`

Wait for few minutes, when docker is done pulling images and setting up containers, once ready, you will need to import the database dump
first, you will need to know the DB contianer id

```
docker ps
```
find the container with `mariadb` image name, then use the continaer id in the following command, after replacing the path to the database dump file, then you should be ready to start development.

```
docker exec -i $contianer_id mysql -u root -pJOSARootPassword wordpress <  /absolute/path/to/db/dump.sql
```

The setup should be complete by now and you should see the josa home page on `localhost:8080`


## troubleshooting

If `permission denied` error occured on any of the previous steps:

1- ssh to your docker machine

2- add `www-data` to your sudoers file (you may have to install vim or a terminal text editor at this step)
run `visudo`
add this line below the root entry:
`www-data        ALL=(ALL:ALL) ALL`

3- Check directory permissions using this command: `ls -lah` it should be owned by `www-data` 

4- If it wasn't owned by `www-data`
	- make sure your in the project directory 
	- change the owner with this command `chown -R www-data:www-data .`
