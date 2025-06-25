
# 🎟️ Event Registration and Ticketing System (ERTS)

A Laravel-based web system that allows users to browse events, register, receive confirmation emails with QR codes, and log in via SOAP web service. 

---

## 🚀 Features

- Browse events by category (Sport, Seminar, Entertainment)
- Event detail view and online registration form
- SOAP-based login authentication
- Confirmation email with QR code using Mailtrap
- Simulated payment methods (FPX, TNG)
- Admin panel (optional for future expansion)

---

## 📦 Requirements

- PHP >= 8.0
- Composer
- Laravel 10+
- MySQL
- Mailtrap account (for email testing)

---

## 🛠️ Installation Steps

### 1. Clone the Repository

```bash
git clone <your-repo-url>
cd ERTS
```

### 2. Install Dependencies

```bash
composer install
npm install && npm run dev  # optional, if using frontend scaffolding
```

### 3. Create and Configure `.env`

```bash
cp .env.example .env
```

Open `.env` and configure:

```env
APP_NAME="ERTS"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=erts_db
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=no-reply@hypehub.com
MAIL_FROM_NAME="HypeHub"
```

> 🔐 Replace `MAIL_USERNAME` and `MAIL_PASSWORD` with your actual [Mailtrap](https://mailtrap.io/) credentials.

### 4. Generate App Key

```bash
php artisan key:generate
```

### 5. Migrate and Seed Database

```bash
php artisan migrate --seed
```

---

## 🔄 SOAP Login Setup

### 1. Create Standalone SOAP Server

Create a folder `soap-server` outside your Laravel project. Inside it, create `soap-auth.php`:

```php
<?php
ini_set("soap.wsdl_cache_enabled", "0");

class SoapAuthService
{
    public function Login($params)
    {
        $username = $params['username'];
        $password = $params['password'];

        if ($username === 'admin' && $password === '123456') {
            return ['LoginResult' => true];
        } else {
            return ['LoginResult' => false];
        }
    }
}

$server = new SoapServer(null, [
    'uri' => 'http://localhost/soap-auth.php'
]);

$server->setClass('SoapAuthService');
$server->handle();
```

### 2. Run the SOAP Server (in separate terminal)

```bash
cd soap-server
php -S localhost:8888
```

Leave this running in one terminal window.

---

## ▶️ Running the Laravel Project

In your Laravel project folder:

```bash
php artisan serve
```

Open the system at:  
[http://localhost:8000](http://localhost:8000)

Use these credentials to log in via SOAP:

```
Username: user
Password: 123456
```

---

## 💌 Testing Email with Mailtrap

After registration:
- Mail will be sent to Mailtrap inbox
- Email contains: confirmation, event details, and QR code

Go to your Mailtrap inbox to preview the email.

---

## ✅ Notes

- Login via SOAP is handled using PHP `SoapClient`
- Registration form fields: name, email, phone (all required)
- Email contains an embedded QR code with event detail
- Categories: Sport, Seminar, Entertainment

---

## 🧼 Clean Up

To reset the database:

```bash
php artisan migrate:fresh --seed
```

To regenerate the QR code package:

```bash
composer require simplesoftwareio/simple-qrcode
```

---

## 📄 License

This is a student project prototype for academic purposes.
