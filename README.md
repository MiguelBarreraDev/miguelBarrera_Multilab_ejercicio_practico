# [Multilab Interview](https://multilab-interview-production.up.railway.app/home)

> ### Desarrollo de una prueba técnica como parte del proceso de selección para la empresa Multilab

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone https://github.com/MiguelBarreraDev/multilab-interview.git

Switch to the repo folder

    cd multilab-interview

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

Start integration with Vite

    npm install
    
Run server with vite (Development)

    npm run dev

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
