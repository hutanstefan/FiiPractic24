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

7. **Seed the Database:**

    ```bash
    php artisan db:seed
    ```    

8. **Install Vite using npm:**

    ```bash
    npm install vite --save-dev
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


***


## UML Diagram: Project Structure

![UML Diagram](public/images/ProjectDiagram.drawio.png)

### Description

This UML diagram presents the structure of the project.

#### User Types:

- **Seller**
- **Buyer**
- **Admin**

#### Methods for All Users:

- **Login**: Allows users to log in to the system.
- **Register**: Enables users to create a new account.
- **Forget Password**: Provides a way for users to reset their password.
- **View Products**: Allows users to browse available products.

#### Methods for Seller:

- **Sell Product**: Enables the seller to list a new product for sale.
  - Description: This method allows sellers to add details of a new product, including its name, description, and price, to the marketplace.
- **Edit Product**: Allows the seller to modify existing product details.
  - Description: Sellers can edit the details of their listed products, such as updating the product description or changing the price.
- **Hide Product**: Allows the seller to temporarily hide a product from the marketplace.
  - Description: Sellers can hide their products from public view, typically used when a product is out of stock or undergoing maintenance.
- **Delete Product**: Allows the seller to permanently remove a product from the marketplace.
  - Description: This method removes a product from the marketplace entirely, including all associated data and listings.
- **Chat with Buyer**: Enables the seller to communicate with potential buyers.
  - Description: Sellers can engage in real-time chat conversations with buyers to discuss product details, negotiate prices, or provide assistance.

#### Methods for Buyer:

- **Add to Favorite**: Allows the buyer to save products to their favorites list.
  - Description: Buyers can mark products they are interested in as favorites for easy access and future reference.
- **Review Product**: Enables the buyer to leave feedback and reviews for purchased products.
  - Description: Buyers can provide ratings and reviews based on their experience with a product, helping other users make informed purchasing decisions.
- **Chat with Seller**: Allows the buyer to communicate with the seller of a product.
  - Description: Buyers can initiate chat conversations with sellers to ask questions, request additional information, or discuss product details.

#### Methods for Admin:

- **Accept Product**: Allows the admin to approve product listings submitted by sellers.
  - Description: Admins can review and approve new product listings to ensure they meet the marketplace's standards and guidelines.
- **Reject Product**: Allows the admin to reject product listings that do not meet the marketplace's criteria.
  - Description: Admins can reject product listings that violate marketplace policies or fail to meet quality standards, providing reasons for rejection.
- **Admin Panel**: Provides access to administrative functionalities and settings.
  - Description: Admins can access an administrative dashboard to manage user accounts, monitor transactions, and configure site settings.







