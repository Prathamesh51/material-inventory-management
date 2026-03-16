# Inventory Management System - Setup Guide

This guide explains how to set up the Laravel 12 Inventory Management project on your machine after cloning.

---

## Prerequisites

- PHP >= 8.2
- Composer
- MySQL / PostgreSQL

## Steps to Set Up

1. **Clone the repository**

```bash
git clone https://github.com/Prathamesh51/material-inventory-management.git
cd inventory-management


#2. Install PHP dependencies
composer install

#3 Create .env file
setup env as per database

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_db
DB_USERNAME=root
DB_PASSWORD=yourpassword


#5. Generate application key
php artisan key:generate

#6 Run database migrations
php artisan migrate

#7 check seeder for dummy data insertion ( optional )
php artisan db:seed --class=InventorySeeder   

#8 Serve the application
php artisan serve

#9 start point
http://127.0.0.1:8000/categories