# Laravel Note Application

A simple note-taking application built with Laravel, allowing users to create, read, update, and delete notes. The application also features user authentication and profile management.

## Features

-   User registration and authentication
-   Create, read, update, and delete notes
-   User profile management
-   Secure password update functionality
-   Built with Laravel and Blade templating engine

## Requirements

-   PHP >= 8.0
-   Composer
-   MySQL (or any other supported database)
-   Laravel >= 10.x

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository:**
    ```bash
    git clone https://github.com/iamlegendarium/note-app-laravel.git
    cd note-app-laravel
    ```
2. **Install Dependencies: Make sure you have Composer installed, then run:**

    ```bash
    composer install
    ```

3. **Create a .env File: Duplicate the .env.example file and rename it to .env:**

    ```bash
    cp .env.example .env
    ```

4. **Configure Your Environment: Update the .env file with your database and application settings:**

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

5. **Generate an Application Key: Run the following command to generate a new application key:**

    ```bash
    php artisan key:generate
    ```

6. **Run Migrations: Create the necessary database tables:**

    ```bash
    php artisan migrate
    ```

7. **Run the Application: Start the development server:**
    ```bash
    php artisan serve
    ```

The application will be accessible at http://localhost:8000.

Usage
Register a new user account or log in if you already have an account.
Navigate to the dashboard to view, create, edit, or delete notes.
Go to the profile section to update your account details or change your password.

Contributing
If you'd like to contribute to this project, feel free to fork the repository and submit a pull request.