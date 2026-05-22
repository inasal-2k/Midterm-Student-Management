# Midterm Project - Student Management System

A simple Laravel-based Student Management System built for the midterm assignment. Performs full CRUD operations on student records.

## Features

- List all registered students with Name, Email, Age, Phone, and Status
- Add a new student with validation and unique email enforcement
- Edit existing student records
- Delete students with a confirmation prompt
- Search and filter students by name, email, or status
- Dashboard with summary statistics (Total, Active, Pending)

## Setup Instructions

1. Clone the project into your local environment.
2. Install dependencies:
   ```bash
   composer install
   ```
3. Copy the environment file:
   ```bash
   cp .env.example .env
   ```
   On Windows:
   ```powershell
   copy .env.example .env
   ```
4. Generate the application key:
   ```bash
   php artisan key:generate
   ```
5. Create a MySQL database (e.g., `midterm`) in phpMyAdmin or your MySQL client.
6. Configure the `.env` database settings (see checklist below).
7. Run the database migration:
   ```bash
   php artisan migrate
   ```
8. (Optional) Seed sample student data:
   ```bash
   php artisan db:seed
   ```
9. Start the application:
   ```bash
   php artisan serve
   ```
10. Open the app in your browser at `http://127.0.0.1:8000/students`.

> **Important:** Always use `php artisan serve` to run the application. Do not use a generic PHP server extension pointing at a Laravel file — the framework needs its front controller to load correctly.

## Environment Configuration Checklist

Update the following values in `.env` to match your local database:

- `DB_CONNECTION` — usually `mysql`
- `DB_HOST` — usually `127.0.0.1`
- `DB_PORT` — usually `3306`
- `DB_DATABASE` — the database name you created (e.g., `midterm`)
- `DB_USERNAME` — your MySQL username (e.g., `root`)
- `DB_PASSWORD` — your MySQL password

## Project Structure

- `app/Models/Student.php` — Eloquent model with fillable fields
- `app/Http/Controllers/StudentController.php` — Resource controller with full CRUD
- `database/migrations/*_create_students_table.php` — Students table schema
- `database/seeders/DatabaseSeeder.php` — Sample student records
- `resources/views/layouts/app.blade.php` — Master layout template
- `resources/views/students/index.blade.php` — Dashboard / student list
- `resources/views/students/create.blade.php` — Add student form
- `resources/views/students/edit.blade.php` — Edit student form
- `routes/web.php` — Resourceful routing

## Notes

Built with Laravel and Bootstrap 5.
