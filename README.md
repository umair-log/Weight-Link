# 🚛 Weight Link - Transport Management System

A Laravel-based transport invoicing and management system with modules for:
- Users (Admin & Clients)
- Customers
- Orders
- Items
- Invoices

## 🛠 Setup Instructions

### Clone the Project
```bash
git clone https://your-repo-url.git
cd your-project-folder 
```

## Install Dependencies
```bash
composer install
```

## Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

## Import Database
Open phpMyAdmin or MySQL

Import the file: Weight_Link.sql

## Configure .env Database Section
env
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
Serve the App
```bash
php artisan serve
```

## 👤 Admin Login
Email: admin@gmail.com
Password: 12345678

## ✅ Default Modules
-Manage Users (Admin only)
-Customers CRUD
-Orders CRUD
-Items CRUD
-Invoices with relation to Items