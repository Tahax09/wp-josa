first time you clone this repo, you will need to run docker, then you will need to activate versionpress and apply changes from git.

1- in your terminal
```
docker-compose up -d

```
Wait for few minutes, when dcoker is done pulling images and setting up containers, login into your wp continer bash and apply the following commands

```
wp core install --url=http://localhost:8080 --title=JOSADev --admin_user=admin --admin_password=JOSAIsAwesome --admin_email=dev@josa.org
wp plugin activate versionpress
wp vp apply-changes
```