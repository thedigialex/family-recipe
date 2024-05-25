# Family Recipe Management

## Overview

Family Recipe Management is a Laravel-based web application that allows users to share and manage family recipes. Users can sign up, create or join families, and add recipes that family members can view, edit, and share.

## Features

- **User Authentication**: Secure user registration and login using Laravel Breeze.
- **Family Management**: Users can create new families or request to join existing ones. Family heads can approve or deny membership requests.
- **Recipe Management**: Users can add, edit, and view recipes. Recipes include a title, image, serving size, cook time, ingredients, and instructions.
- **Interactive Recipe Cards**: Stylish recipe cards with a flip effect to display details on hover, implemented using Tailwind CSS.

## Installation

### Prerequisites

- PHP 7.4+
- Composer
- Node.js & npm
- MySQL

### Steps

1. **Clone the repository**:
    ```sh
    git clone https://github.com/thedigialex/family-recipe-management.git
    cd family-recipe-management
    ```

2. **Install dependencies**:
    ```sh
    composer install
    npm install
    npm run dev
    ```

3. **Setup environment**:
    - Copy `.env.example` to `.env`
    - Update `.env` with your database and mail configuration
    - Generate application key:
      ```sh
      php artisan key:generate
      ```

4. **Run migrations**:
    ```sh
    php artisan migrate
    ```

5. **Serve the application**:
    ```sh
    php artisan serve
    ```

6. **Compile assets**:
    ```sh
    npm run dev
    ```

## Usage

### User Sign-up and Login

- Users can register and log in to the application.
- After logging in, users can create a new family or request to join an existing one.

### Family Management

- Family heads can approve or deny requests to join the family.
- Users can view all family members.

### Recipe Management

- Users can add new recipes to their family’s recipe book.
- Each recipe includes a title, image, serving size, cook time, ingredients, and instructions.
- Recipes are displayed in interactive cards with a flip effect on hover.
- Detailed view of each recipe includes image, title, serving size, cook time, ingredients, steps, and description.

## Contributing

We welcome contributions! Please read the [contributing guidelines](CONTRIBUTING.md) for more details.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE.md) file for details.
