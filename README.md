# **Midtrans - Payment Gateway**

Midtrans is a leading payment gateway in Indonesia that empowers businesses of all sizes to seamlessly accept online payments. Whether you're a startup, SME, or enterprise, Midtrans provides a robust platform and suite of payment solutions to cater to your unique needs.

## Midtrans Laravel Setup

First of all, let's set up our Laravel application.

```bash
laravel new laravel-midtrans
```

Then, install the Midtrans dependency for PHP using Composer:

```bash
composer require midtrans/midtrans-php
```

- Then, you'll need to [create a Midtrans Account](https://docs.midtrans.com/) to access their services. <br>
- Change the environment to sandbox (for development).
- You can change the environment at the top of the sidebar. <br>
- Go to **Settings** > **Access Keys**. You'll find your client credentials there, such as: <br>
  **[merchant_id, client_id, and server_key]**.
- Copy all of those and paste them into the .env file in your Laravel project. <br>

```bash
MIDTRANS_MERCHANT_ID="YOUR_MERCHANT_ID"
MIDTRANS_CLIENT_KEY="YOUR_CLIENT_KEY"
MIDTRANS_SERVER_KEY="YOUR_SERVER_KEY"
```

Then create a new config file named **midtrans.php** in the **App\Config** directory and fill it with this data:

```bash
<?php

return [
    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'client_key'  => env('MIDTRANS_CLIENT_KEY'),
    'server_key'  => env('MIDTRANS_SERVER_KEY'),
];
```

Now add the Midtrans Snap configuration script at the **head (html) section** of your view layout file.

```bash
<script
    type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}">
</script>
```

> Since this is just for development testing, we'll use the sandbox version.

## Database Setup

Well.. for example, here, we'll create a simple course website where a user can purchase the courses they want. So I assume you'll create:
- **User Table** : storing user data
- **Course Table** : storing all of our available courses
- **User Course Table** : storing user's courses (courses that has been purchase by a user)
- **Transaction Table** : storing all user's transaction
<br>

**NOTE:** <br>
**Since we're just going to do a testign here, I suggest u to use the database design I make,**

<img src="erd.png" alt="ERD" width="50%">

## Frontend (view) Setup

Well.. for example, here, we'll create a simple course website where a user can purchase the courses they want. So, I assume you'll create:

- **Login Page**: so that the user has to be logged in before making any purchases.
- **Course List Page**: to display all of our courses.
- **Detail Page**: to display course details when a user chooses a course.
- **Transaction Page**: to display receipts and the payment gateway for the user's transaction.
  > You could use the sample code I wrote in this repository

Open yout first terminal, and run the php server

```bash
php artisan serve
```

Open your second terminal and run the node server

```bash
npm run dev
```

Lastly, open your third terminal and run the laravel queue work

```bash
php artisan queue:work
```

Login with the default user

```bash
username = admin
password = password
```

Well, that's it! You can now chat with your crush. (if you have one) 😏

## Framework & Library

- PHP 8.1
- Laravel 10.x
- Laravel Livewire
- Laravel Echo
- AlpineJS

## Developer

- [Andika Dwi Saputra](https://andikss.github.io)..
