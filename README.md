# Task API using Laravel

This repository contains a basic implementation of a RESTful API for managing tasks using the Laravel framework. The API allows users to perform CRUD operations (Create, Read, Update, Delete) on tasks. It also includes authentication and validation middleware to ensure data integrity and security.

## Purpose

The purpose of this project is to demonstrate how to create a simple RESTful API using Laravel and cover the following aspects:

1. Setting up a Laravel project.
2. Creating a model, migration, and controller.
3. Implementing routes for CRUD operations.
4. Adding authentication middleware.
5. Implementing validation middleware for data security

## Installation

Clone the repository

```bash
git clone https://github.com/imalisusan/dawit-interview
```

## Getting Started 🚀

```php
# Install required packages
composer install

# Generate app key
php artisan key:generate
```
## Setup the .env file

Declare database configuration values in the .env file
 
## Database Setup


```php
# Run database migrations
php artisan migrate

# Generate dummy application data for tasks
php artisan db:seed
```

## Run the Application
```php

# Start the application
php artisan serve
```

## Authentication
This API uses Laravel Sanctum for authentication. To authenticate, you need to register and log in as a user. Once logged in, you will receive an authentication token that you should include in the headers of your API requests.

## Usage
- POST /api/auth/register - Register and log in to obtain an access token.
- POST /api/auth/login - Log in to obtain an access token.
- Use the obtained access token in the headers(Bearer Token) of your API requests.

## API Endpoints
The API exposes the following endpoints:
- GET /api/tasks - View the seeded tasks
- POST /api/tasks - Create a new task
- GET /api/tasks/{id} - Retrieve a specific task by ID
- PUT /api/tasks/{id} - Update an existing task
- DELETE /api/tasks/{id} - Delete a task

Please ensure that you include appropriate headers for authentication (Bearer token) when making requests to protected endpoints.

## License

[MIT](https://choosealicense.com/licenses/mit/)