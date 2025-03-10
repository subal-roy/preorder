# Preorder Form Package for Laravel

A Laravel package for handling a pre-order form with product selection, validation, and email notifications. The package provides a reusable, decoupled pre-order form system with the following features:

- Pre-order form with fields: Name, Email, Product, and conditional Phone number field for `@xyz.com` emails.
- Support for rate-limiting pre-order submissions to prevent spam (10 submissions per minute).
- Pre-order submission data stored in a PostgreSQL database.
- Admin dashboard view for listing all pre-orders search, and delete functionality.
- Email notifications to users and admins when a pre-order is submitted.
- Soft delete functionality
- Simple, clean user interface using Blade and Tailwind CSS.

## Features

- **Pre-order Form**: Fields for Name, Email, Product, and Phone (if email ends with `@xyz.com`).
- **Validation & Sanitization**: Ensures that only valid and sanitized data is stored.
- **Rate Limiting**: Prevents users from submitting more than 10 pre-orders per minute.
- **Admin Panel**: Admins can view, search, and delete pre-orders.
- **Email Notifications**: Confirmation email sent to the user first, then to the admin.

## Installation

Follow the steps below to install the package into your Laravel project.

### 1. Install via Composer

Run the following command to install the package from Packagist:

```bash
composer require subalroy/preorder
```

### 2. Install Frontend Dependencies

This package relies on Vue.js, Axios, Vite and Tailwind CSS for the frontend.

### 3. Publish Assets

To publish the package's views, assets, and migrations, run the following commands:

```bash
php artisan vendor:publish --provider="SubalRoy\Preorder\PreorderServiceProvider" --tag="views"
php artisan vendor:publish --provider="SubalRoy\Preorder\PreorderServiceProvider" --tag="js"
php artisan vendor:publish --provider="SubalRoy\Preorder\PreorderServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="SubalRoy\Preorder\PreorderServiceProvider" --tag="models"
```

### 4. Migrate the Database

Run the migration command to create the pre-orders table:

```bash
php artisan migrate
```

### 5. Configure Email Settings

Make sure you have email configurations set up in your .env file to send emails for notifications.

```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="your_email@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Usage

## Pre-order Form
To display the pre-order form, visit /preorder in your browser. The form allows users to select a product, enter their name and email, and submit their information.

## Admin Panel
Admins can access the list of pre-orders by visiting /preorders. The list includes functionality for searching, paginating, and deleting pre-orders.

## Delete Pre-orders
Admins can delete pre-orders. The deletion will be soft.

### Middleware

You can add the admin middleware to restrict access to certain routes (e.g., /preorders).

Example:

```bash
Route::get('preorders', [PreorderController::class, 'index'])->middleware('admin')->name('preorders.index');
```

### License
This package is open-source and available under the MIT License. See the LICENSE file for more information.



