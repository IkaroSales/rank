# ZendSkeleton

```bash
$ cd path/to/install
$ composer install
$ php -S 0.0.0.0:8080 -t public/ public/index.php
```

## Using docker-compose

This skeleton provides a `docker-compose.yml` for use with
[docker-compose](https://docs.docker.com/compose/); it
uses the `Dockerfile` provided as its base. Build and start the image using:

```bash
$ docker-compose up -d --build
```

At this point, you can visit http://localhost:8080 to see the site running.

You can also run composer from the image. The container environment is named
"zf", so you will pass that value to `docker-compose run`:

```bash
$ docker-compose run zf composer install
```

### End-point

```nginx
http://localhost:8080/users/add
http://localhost:8080/public/users/add
```
