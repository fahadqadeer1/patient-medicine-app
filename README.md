# Patient Medicine App

A Laravel web application for managing patients, medicines, and their intake schedules.

## Requirements

- PHP 8.1+
- Composer
- Laravel 10+
- MySQL
- Node.js & npm

## Project Summary
Built with Laravel and Laravel Breeze for authentication.

Manages patients, medicines, and intake schedules.

Implements role-based access using a custom type column in the users table.

Clean UI using Tailwind CSS with dynamic menus based on user role.



## Setup Instructions

```bash
git clone https://github.com/your-username/patient-medicine-app.git
cd patient-medicine-app
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run dev
php artisan serve

```

## 🔑 Roles & Access Control
User Role	Access Permissions
doctor / nurse	Manage patients and their medicine intakes
store_manager	Manage medicines only
All authenticated users	Access profile and dashboard


## 📌 Features
#### Patient Management

    Create, edit, delete patients
    View lists filtered by gender and type (e.g., female adults, male infants)

#### Medicine Management
    Add and edit medicines with intake options of once, twice, or three times daily, using checkboxes for 8 AM, 2 PM, and 8 PM time slots.

#### Intake Records

    Log medicine intake (restricted to doctor / nurse)

#### User Authentication

    Register, login, logout, and manage profile

#### Role-Based Navigation

    Menu items shown/hidden based on the user’s role

#### Secure Routes

    Middleware restricts access to authorized roles only


## 🔗 Available Routes in the Patient Medicine App

| **Route** | **Purpose** |
|-----------|-------------|
| `/dashboard` | Authenticated user dashboard |
| `/patients` | View all patients |
| `/patients/create` | Create a new patient |
| `/patients/{id}/edit` | Edit an existing patient |
| `/patients/female-adults-8pm` | List of female adult patients and their medications for intake at **8 PM** |
| `/patients/male-infants-8am` | List of male infant patients and their medications for intake at **8 AM** |
| `/medicines` | View all medicines |
| `/medicines/create` | Add a new medicine (with multiple intake times) |
| `/medicines/{id}/edit` | Edit existing medicine |
| `/intakes` | View all medicine intake records |
| `/intakes/create` | Log a new intake |
| `/profile/edit` | Edit your user profile |
| `/logout` | Logout the current user (via POST) |


## Apis Routes
| API Endpoint | Returns |
|--------------|---------|
| `GET /api/patients/female-adults-8pm` | All female adult patients with meds at 8 PM |
| `GET /api/patients/male-infants-8am` | All male infant patients with meds at 8 AM |


## 🔐 Access Control
Most routes are protected with Laravel authentication middleware.

Users must be logged in to access any of the data.

Breeze is used for auth scaffolding (login, register, logout, etc.).

## 📋 Sample Auth URLs
Route	Purpose
/login	Login page
/register	Register page
/logout	Logout (handled via POST form)