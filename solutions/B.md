# B

I used [RecursiveDirectoryIterator](https://www.php.net/manual/en/class.recursivedirectoryiterator.php) for this task.

I first used it recently for handling the contents of a user uploaded zip file and was impressed with how powerful it was and how easy it makes tasks like this.

The command can be run like so:

```
docker-compose exec app php artisan delete:files /var/www
```

`/var/www` is the path within the docker container.

`RegexIterator` is also a powerful option but wasn't as suitable here since the regex needs to check the beginning of the string which includes the full path and not just the filename.