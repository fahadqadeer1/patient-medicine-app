# Patient Medicine App

A Laravel web application for managing patients, medicines, and their intake schedules.

## Requirements

- PHP 8.1+
- Composer
- Laravel 10+
- MySQL
- Node.js & npm

## Setup Instructions

```bash
git clone https://github.com/your-username/patient-medicine-app.git
cd patient-medicine-app
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan serve



🔗 Available Routes in the Patient Medicine App

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



🔐 Access Control
Most routes are protected with Laravel authentication middleware.

Users must be logged in to access any of the data.

Breeze is used for auth scaffolding (login, register, logout, etc.).

📋 Sample Auth URLs
Route	Purpose
/login	Login page
/register	Register page
/logout	Logout (handled via POST form)