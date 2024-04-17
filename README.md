# Project Setup Guide

This guide will walk you through setting up the environment for the project.

## Prerequisites

- XAMPP installed on your system. If not installed, download and install it from [XAMPP](https://www.apachefriends.org/index.html).
- Composer installed on your system. If not installed, download and install it from [Composer](https://getcomposer.org/).
- Node.js installed on your system. If not installed, download and install it from [Node.js](https://nodejs.org/en/download/).

## Installation Steps

1. **Navigate to Project Directory:**

    ```bash
    cd path/to/xampp/htdocs/project_name
    ```

2. **Check PHP Version:**

    ```bash
    php -v
    ```

    If PHP is not recognized, install XAMPP or Composer from [XAMPP](https://www.apachefriends.org/index.html) or [Composer](https://getcomposer.org/), respectively.

3. **Install Dependencies using Composer:**

    ```bash
    composer install
    ```

4. **Copy Environment Configuration:**

   
    Copy `.env.example.`
    Open the `.env` file, paste and adjust configurations such as port numbers, etc.

5. **Create Database Table:**

    - Open PHPMyAdmin and create a database named `project`.
    - Set the collation to `utf8_general_ci`.

6. **Run Database Migrations:**

    ```bash
    php artisan migrate
    ```

7. **Install Vite using npm:**

    ```bash
    npm install vite --save-dev
    ```

8. **Seed the Database:**

    ```bash
    php artisan db:seed
    ```

9. **Compile Assets:**

    ```bash
    npm run dev
    ```

10. **Start the Server:**

    Run the following commands in separate terminals:

    ```bash
    php artisan serve
    ```

    ```bash
    npm run dev
    ```

Now, your project environment is set up and ready to go!
