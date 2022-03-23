[//]: # (<p align="center">)

[//]: # (<a href="https://adcash.com" target="_blank">)

[//]: # (    <img src="https://adcash.com/wp-content/themes/adcash/assets/dist/img/logo-footer.svg" width="400">)

[//]: # (</a>)

[//]: # (</p>)


## Stock Management and Virtual Portfolio Management

Create an application stock management. The application should have the following
    
- Add a new stock
- Update the unit price of an existing stock
- Delete a stock
- List all existing stocks
- Add a new client
- List all existing clients
- Purchase a stock for a client
- List of purchased stocks per client


## Domain Requirements
- Each new client should have a € 1000 virtual investment portfolio by default.
- Gain and loss should be calculated based on the difference between purchase and
  current prices of stocks.
- List of clients should be displayed sorted by profit.
- List of stocks should be displayed sorted by unit price.
- No need to store all unit price changes done for a stock.

## Technologies

- PHP
- Laravel
- Mysql
- Vuejs

## How to run the application
 Below are the steps you need to successfully setup and run the application.

- Clone the app from the repository and cd into the root directory of the app
- Run composer install
- Copy .env.example into .env
- Update DB credentials to match with your db
- Run php artisan migrate to migrate database tables
- Run php artisan db:seed to seed the default records
- Run npm install
- Run npm watch run
## Running Test
- Run php artisan test

