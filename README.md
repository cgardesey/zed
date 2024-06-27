# CRUD Functionality for pyz_book Table
## Table of Contents

- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Methods Overview](#methods-overview)
- [Example Response](#example-response)
- [Installation](#installation)
- [Development Workflow](#development-workflow)
- [License](#license)


## Introduction

This is a laravel application that demonstrates CRUD with operations on pyz_book table


## Prerequisites

Before you get started, make sure you have the following tools installed:

- [Docker](https://docs.docker.com/get-docker/)
- [DockerCompose](https://docs.docker.com/compose/install/)

## Methods Overview

1. **index()**
   - Fetches and returns a list of all books.
   - **Route: GET /**


2. **store(Request $request)**
    - Creates a new book.
    - **Route: POST /book/create**

   
3. **update(Request $request, PyzBook $pyzBook)**
    - Updates an existing book in the database.
    - **Route: POST /book/create**

   
4. **destroy(PyzBook $pyzBook)**
    - Deletes a specified book from the database.
    - **Route: DELETE /book/id**


## Example Response

- Successful execution of all requests returns an array of books:
    - Example Response:
      ```bash
      {
        "books": [
          {
            "id": 1,
            "name": "Beauty and the Beast",
            "description": "Novel",
            "publication_date": "2024-05-22 16:24:59",
            "created_at": "2024-06-17T11:13:20.000000Z",
            "updated_at": "2024-06-17T11:17:20.000000Z",
          },
          ...
         ]
      }
## Installation

- Clone this repository to your local machine:
  ```bash
     git clone https://github.com/cgardesey/zed.git
- Navigate to the project directory:
   ```bash
      cd applications
- Create a .env file:
   ```bash
      cp .env.example .env
- Generate the application key:
   ```bash
      ./vendor/bin/sail artisan key:generate
- Set up your database credentials in the .env file:
   ```bash
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=your_database_name
      DB_USERNAME=your_database_username
      DB_PASSWORD=your_database_password
- Start the Docker environment using Sail:
   ```bash
      ./vendor/bin/sail up -d
- Install composer dependencies:
   ```bash
      ./vendor/bin/sail composer install
- Build your frontend application using the Vite build tool:
   ```bash
      ./vendor/bin/sail npm run build     
- Generate a Laravel application key:
   ```bash
      ./vendor/bin/sail artisan key:generate
- Run the database migrations and seed the database:
   ```bash
      ./vendor/bin/sail artisan migrate --seed
- Your Laravel application should now be accessible at http://localhost.



## Development Workflow

The application follows a standard Laravel Development Workflow:

-  To start the Docker environment: `./vendor/bin/sail up -d`
-  To stop the Docker environment: `./vendor/bin/sail down`
-  To run artisan commands: `./vendor/bin/sail artisan your-command`
-  To access the application's shell: `./vendor/bin/sail shell`


## License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).

   

