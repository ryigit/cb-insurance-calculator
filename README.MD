# Insurance Calculator
## Rahmetullah Yiğit

This is a sample project I built for a Job application a year ago.
Since done in a limited time, some features is missing.

This is a pure PHP application, only dependency is for unit tests.

This basically calculates insurance fee for a product according to given rules.
## Running Application:

Application requires PHP8 or higher, and need PDO and pdo-mysql extensions.

First, install dependencies via Composer. Main dependency is PHPUnit for tests.

Then, just like the example codebase this comes with a docker-compose setup. Provided you have docker installed, start the app with `docker-compose up`, after which you can access the "application" via `http://localhost:8080`.

Database schema has been provided in the *etc* folder

There are 3 routes to check:

Product Details: http://localhost:8080/product/572770

Product Insurance Fee: http://localhost:8080/product/insurance/572770

Product Type: http://localhost:8080/types/35

## Tests:

Tests depends on PHPUnit and dependencies can be installed via composer.

## Further Improvements:

These are the next steps I plan to implement:

- Better Error Handling
- Better handling of the response header and codes.
- Logging & Monitoring
- Security(Preventing SQL injection etc.)
- I also left a few comments for possible future improvements.