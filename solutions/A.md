# A

I decided to create four tables - `games`, `players`, `positions` and `teams`.

I used normalisation for `games` in order to store a `home_team_id` and an `away_team_id` and to avoid storing the team names as text.

All of the above tables are seeded either using an array of constants from the appropriate model (`Position` and `Team`), or by utilising the faker library via a factory (`Game` and `Player`).

To run migrations and seed the database, run:

```
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

The seeder can be run continuously since the tables are truncated before seeding.