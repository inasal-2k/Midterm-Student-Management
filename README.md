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

1. **Clone the repository:**

```bash
git clone https://github.com/inasal-2k/Midterm-Student-Management.git
cd Midterm-Student-Management
```

2. **Install dependencies:**

```bash
composer install
```

3. **Configure the environment:**

```bash
cp .env.example .env
php artisan key:generate
```

On Windows:

```powershell
copy .env.example .env
php artisan key:generate
```

4. **Create the database and import:**

Create a MySQL database named `midterm`, then import the provided SQL dump:

```bash
mysql -u root -e "CREATE DATABASE midterm;"
mysql -u root midterm < midterm.sql
```

Alternatively, you can run migrations and seeders instead of importing the SQL dump:

```bash
php artisan migrate --seed
```

5. **Update `.env` database settings:**

Set the following in your `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=midterm
DB_USERNAME=root
DB_PASSWORD=
```

6. **Start the application:**

```bash
php artisan serve
```

7. **Open in browser:**

Go to `http://127.0.0.1:8000/students`

> **Important:** Always use `php artisan serve` to run the application. Do not use a generic PHP server extension pointing at a Laravel file — the framework needs its front controller to load correctly.


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
