# SafePaws – Local Setup Guide

This guide will help you set up the **SafePaws Pet Sitting Website** on your local machine using **WAMP** and **MySQL**.

---

## Prerequisites

* **Windows OS**
* **WAMP Server** ([https://www.wampserver.com/](https://www.wampserver.com/)) installed
* Modern browser (Chrome, Edge, Firefox)
* Basic knowledge of PHP and MySQL

---

## 1. Start WAMP Server

1. Launch **WAMP** and start all services (Apache + MySQL).
2. Ensure the WAMP icon in the system tray is **green**, indicating services are running.

---

## 2. Create the Database

1. Open **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Click **Import**, choose the file `sql/safepaws.sql` .
3. Click Import to import SQL tables

---

## 3. Place Project in WAMP’s `www` Directory

1. Copy the entire **SafePaws project folder** to:

```
C:\wamp64\www\safepaws
```

2. Folder structure should look like:

```
safepaws/
 ├─ css/
 ├─ images/
 ├─ index.php
 ├─ about_us.php
 ├─ add_review.php
 ├─ book.php
 ├─ bookings.php
 ├─ check_login.php
 ├─ contact_us.php
 ├─ dashboard.php
 ├─ header.php
 ├─ logout.php
 ├─ save_booking.php
 ├─ save_sitter.php
 ├─ login.php
 ├─ services.php
 ├─ sitters.php
 ├─ register_owner.php
 ├─ register_sitter.php
 ├─ sitter_profile.php
 └─ config.php
```

---

## 4. Configure `config.php`

Create a `config.php` file to connect to MySQL:

```php
<?php
$host = 'localhost';
$db   = 'safepaws';
$user = 'root';         // default WAMP MySQL user
$pass = '';             // default WAMP MySQL password is empty
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit;
}
?>
```

---

## 5. Launch the Website

1. Open a browser and go to:

```
http://localhost/safepaws/index.html
```

2. For PHP pages, use URLs like:

```
http://localhost/safepaws/login.php
http://localhost/safepaws/sitter_profile.php?id=1
```

---

## 6. Notes

* All dynamic pages (`login.php`, `register_sitter.php`, `sitter_profile.php`, `book.php`, etc.) require a **running WAMP server**.
* Ensure the database name and credentials in `config.php` match your phpMyAdmin setup.
* Passwords in the database are hashed using `password_hash()` for security.
* Use `session_start()` for managing user logins.

---

This README provides all steps to get **SafePaws** running locally with WAMP.
