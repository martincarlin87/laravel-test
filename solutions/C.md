# C

I estimate the sorting to take 0.01 seconds on a normal machine, running that 10^10 times would result in a time of 100,000,000 seconds, or approximately 38 months.

I used the standard library `sort` function since it will be faster and more efficient than anything I could implement.

```
docker-compose exec app php artisan sort:numbers
```