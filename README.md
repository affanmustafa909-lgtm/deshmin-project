# Deshmin E-Commerce Project


## Project Overview
**Deshmin Project** is a **Daraz-style E-Commerce web application** with a **frontend store interface** and an **admin dashboard backend**.  

- **Frontend:** Main store page where users can view products  
- **Admin Dashboard:** Only accessible to admin, used to **add, update, delete, and manage products**  

This project was built to **practice full-stack PHP development** and understand **frontend-backend integration** with a MySQL database.

---

## Features

### 1. User Authentication
- User Registration
- Login for existing users
- Secure admin dashboard access

### 2. Frontend Store
- Main page displays all products
- Responsive Daraz-style interface
- Clean design for user browsing

### 3. Admin Dashboard (Product Management)
- Add new products
- Update existing products
- Delete products
- View and manage all products
- Admin-only access

### 4. Database
- Relational database for users, products, and orders
- All tables exported and included in `database/` folder

---

## Folder Structure

```text
deshmin-project/
│
├── backend/          <-- Admin Dashboard PHP files (CRUD operations)
├── frontend/         <-- Main page / store interface
├── database/         <-- Exported SQL files for tables


Database Information

Database Name (phpMyAdmin): dash_min
create database in this name dash_min and import database/ folder as SQL files
Tables: All tables exported and added in database/ folder as SQL files
