# Material Inventory Management System

## Overview

This project is a simple **Material Inventory Management** built using Laravel.
It allows users to manage materials and track inward and outward quantities while maintaining the current balance of each material.

## Tech Stack

* PHP - v8.2
* Laravel - 12
* PostgreSQL / MySQL 
* Bootstrap 
* JQuery 

## Features

* Category CRUD (Create, Read, Update, Delete)
* Material CRUD with opening balance
* Add inward / outward quantity for materials
* Automatic current balance calculation
* Edit material details
* Soft delete for materials
* Simple web-based user interface

## Architecture

The project follows **Repository Pattern** to keep the code clean and maintainable.

Controller
↓
Repository Interface
↓
Repository Implementation
↓
Model / Database

## Author

Prathamesh Chavan
