# Pharmacy Management System (Middleware & CRUD Integration)

## 📌 Project Overview
This project is an evolution of the **Eloquent Relationships** assignment. It has been transformed into a functional Laravel application featuring a complete UI, CRUD operations, and Role-Based Access Control (RBAC) using Middleware.

**Activity Mapping:**
- **Customers:** Managed via the `Customer` model.
- **Products:** Represented by the `Medicine` model.
- **Orders:** Represented by the `Prescription` model (linked via Many-to-Many with Medicines).

---

## 🛠️ Technical Tasks Accomplished

### 1. Build CRUD + UI
- **Full CRUD:** Implemented for Customers, Medicines (Products), and Prescriptions (Orders).
- **Eloquent Relationships:** 
    - `Customer` hasMany `Prescription` (1:N)
    - `Medicine` belongsTo `Category` (1:N)
    - `Prescription` belongsToMany `Medicine` (N:M) via pivot table.
- **Eager Loading:** Implemented in `PrescriptionController` using `::with(['customer', 'medicines'])` to optimize database queries and prevent N+1 issues.

### 2. Access Rules (Middleware)
- **Authentication:** All entities are protected by the `auth` middleware.
- **Admin Access:** A custom `AdminMiddleware` was created to restrict User Management and sensitive actions.
- **Role System:** 
    - `admin`: Can create, edit, delete all records and manage user roles.
    - `pharmacist`: Can view records but cannot modify inventory or access admin panels.

### 3. UI Behavior
- **Dynamic Buttons:** Edit and Delete buttons are conditionally rendered using `@if(auth()->user()->role === 'admin')`.
- **Navigation:** The "Manage Users" link is only visible to Admin users.
- **Protected Actions:** Restricted actions on the Prescription page show a "Read Only" status for non-admins.

---

## 📊 Database Schema (ERD)
![ERD Diagram](./ERD.png)

---

## 🚀 How to Run

### Step 1: Install Dependencies
```bash
composer install
```

### Step 2: Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### Step 3: Database Migration (SQLite)
This project uses SQLite for portability.
```bash
php artisan migrate
```
(Type yes if asked to create the database.sqlite file)

### Step 4: Start the Server
```bash
php artisan serve
```

---

## 🔐 Test Credentials

| Role       | Email          | Password     |
|------------|----------------|--------------|
| Admin      | admin@test.com | password123  |
| Pharmacist | Register via UI| your_password|


#### Submitted by: Mel G. Magdaraog
#### Submitted to: Mr. Jehu Casimiro