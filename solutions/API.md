# API

For my approach to building the api, I first created some migrations.

These can be run by executing:

```
docker-compose exec app php artisan migrate
```

If the migrations have already been ran for the NBA tables then the tables will already exist.

I placed the routes in `routes/api.php` and not `routes/web.php` since they are actually for an api, so it seems like the most appropriate choice in terms of semantics.

I also added a fallback route which is used when there is no matching route, and also to catch `ModelNotFoundException` exceptions in `Exceptions\Handler.php`.

The throttle middleware is also used to limit api requests to twenty per minute.

In an attempt to stick to restful controller action names (index, create,  show, edit, update, delete) I created three controllers, `PostCommentsController.php`, `UserPostsController.php` and `UsersController.php`.

The controllers make use of route model binding instead of manually fetching results, and finally, to return the data in a consistent format, Resource classes are used for each model type.

The api data itself can be cached by running the `cache:data` console command:

```
docker-compose exec app php artisan cache:data
```

For the actual fetching, I implemented a `Traits\ApiTrait.php` class which accepts an endpoint url and can be used in any model.

`updateOrCreate` is used to save the models based on the id of the record and to avoid duplicates.


