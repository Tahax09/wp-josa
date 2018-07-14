first time you clone this repo, you will need to run docker, then you will need to activate versionpress and apply changes from git.

## in your terminal:
1- Run Docker using (note you might need to use 'sudo' depending on your installation of docker) `dockerd`

2- cd to your clone of wp-josa
3- run the following command to initialize the docker environment: `docker-compose up -d`
Wait for few minutes, when dcoker is done pulling images and setting up containers, login into your wp continer bash and apply the following commands

```
wp core install --url=http://localhost:8080 --title=JOSADev --admin_user=admin --admin_password=JOSAIsAwesome --admin_email=dev@josa.org
wp plugin activate versionpress
wp vp apply-changes
```

The setup should be complete by now and you should see the josa home page.

If `permission denied` error occured on any of the previous steps:
1- ssh to your docker machine
2- add `www-data` to your sudoers file (you may have to install vim or a terminal text editor at this step)
run `visudo`
add this line below the root entry:
`www-data        ALL=(ALL:ALL) ALL`
3- check direcotry permissions using this command: `ls -lah` it should be owned by `www-data` 
4- if it wasn't owned by `www-data`
	- make sure your in the project directory 
	- change the owner with this command `chown -R www-data:www-data .`