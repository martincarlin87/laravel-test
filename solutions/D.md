# D

I estimate the sorting to take around 1 second on my machine.

I again initially used the standard library `sort` but decided to restructure it so that the massive products weren't shown and instead show the numbers as `a^b` in order to make the output easier to read.

I then tried to see if there was anything more efficient I could do so created the `powerSort` method in the `Sorter` class.

Initially this contained the following code:

```
usort($numbers, function ($a, $b) {
    // base numbers are the array key and exponents the value
    // first check if the exponent is larger
    list($baseA, $exponentA) = $a;
    list($baseB, $exponentB) = $b;

    if ($exponentA > $exponentB) {
        return 1;
    } else if ($exponentB > $exponentA) {
        return -1;
    } elseif ($exponentA === $exponentB) {
        // compare base numbers
        if ($baseA > $baseB) {
            return 1;
        } elseif ($baseB > $baseA) {
            return -1;
        }
    } else {
        return 0;
    }
});
```

I initially thought sorting by the exponent then the base would work to save calculating and then sorting so many huge numbers but the output was incorrect.

I then replaced that logic with just `return pow($baseA, $exponentA) <=> pow($baseB, $exponentB);`.

```
docker-compose exec app php artisan sort:powers
```
