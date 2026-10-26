# PHP OOP CRUD Pagination

A professional **PHP Object-Oriented CRUD application** built with **PHP OOP, MySQL, HTML, CSS and JavaScript**.

This project demonstrates how to build a structured CRUD system with database connectivity, student management, pagination, search functionality and a responsive user interface.

---

## 🚀 Features

- Create student records
- Read and display student records
- Update student information
- Delete student records
- MySQL database integration
- PHP Object-Oriented Programming
- Pagination
- Search functionality
- Form validation
- Responsive user interface
- JavaScript interactions
- Professional CSS design
- Demo student data included
- Clean and simple project structure

---

## 🛠️ Technologies Used

### Backend

- PHP
- PHP OOP
- MySQL

### Frontend

- HTML5
- CSS3
- JavaScript

### Development Tools

- XAMPP
- phpMyAdmin
- VS Code
- Git
- GitHub

---

## 📁 Project Structure

```text
php-oop-crud-pagination/
│
├── assets/
│   ├── css/
│   │   └── style.css
│   │
│   └── js/
│       └── app.js
│
├── config.php
├── Database.php
│
├── database_with_20_demo_students.sql
│
├── delete.php
├── form.php
├── index.php
├── save_data.php
├── show_data.php
│
└── README.md
```

---

## 🔄 Application Flow

```text
User
 │
 ▼
index.php
 │
 ▼
show_data.php
 │
 ▼
Database.php
 │
 ▼
MySQL Database
 │
 ▼
Student Records
```

For adding or updating data:

```text
form.php
   │
   ▼
save_data.php
   │
   ▼
Database.php
   │
   ▼
MySQL
```

For deleting data:

```text
index.php
   │
   ▼
delete.php
   │
   ▼
Database.php
   │
   ▼
MySQL
```

---

## 💻 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/php-oop-crud-pagination.git
```

Move into the project directory:

```bash
cd php-oop-crud-pagination
```

---

### 2. Install XAMPP

Install **XAMPP** and start:

- Apache
- MySQL

Place the project inside:

```text
C:\xampp\htdocs\
```

Example:

```text
C:\xampp\htdocs\php-oop-crud-pagination
```

---

## 🗄️ Database Setup

### 1. Open phpMyAdmin

```text
http://localhost/phpmyadmin
```

### 2. Create a Database

Create the database according to the configuration in:

```text
config.php
```

### 3. Import SQL File

Import:

```text
database_with_20_demo_students.sql
```

This SQL file contains the required database structure along with **20 demo student records**.

---

## ⚙️ Database Configuration

Open:

```text
config.php
```

Configure your MySQL credentials according to your local XAMPP setup.

Typical configuration:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "your_database_name";
```

Make sure the database name matches the database you created in phpMyAdmin.

---

## 🌐 Run the Project

After starting Apache and MySQL, open:

```text
http://localhost/php-oop-crud-pagination/
```

The application will display the student management interface.

---

## 📄 Main Files

### `index.php`

Main entry point of the application.

It displays the student records and provides access to the CRUD operations.

### `form.php`

Used for:

- Adding students
- Editing student information

### `save_data.php`

Processes form submissions and saves or updates student information in the database.

### `show_data.php`

Handles retrieving and displaying student data.

### `delete.php`

Handles student record deletion.

### `Database.php`

Contains the database connection and database-related functionality using PHP OOP.

### `config.php`

Contains database/application configuration settings.

### `assets/css/style.css`

Contains the application's styling and responsive UI design.

### `assets/js/app.js`

Contains frontend JavaScript functionality.

---

## 📊 CRUD Operations

| Operation | File |
|---|---|
| Create | `form.php` → `save_data.php` |
| Read | `index.php` / `show_data.php` |
| Update | `form.php` → `save_data.php` |
| Delete | `delete.php` |

---

## 📑 Pagination

The project includes pagination for displaying student records in manageable pages.

Instead of loading all records at once, the application can display a limited number of records per page.

Example:

```text
Page 1 → Students 1–10
Page 2 → Students 11–20
Page 3 → Students 21–30
```

This approach helps make the interface cleaner and more scalable as the number of records increases.

---

## 🔍 Search

The application supports student record searching, allowing users to find specific records more easily.

Search functionality can be extended with additional filters such as:

- Student name
- Email
- Department
- Phone number
- ID

---

## 🔐 Security

For a production-ready application, the following security practices are recommended:

- Prepared SQL statements
- Input validation
- Output escaping
- CSRF protection
- Authentication and authorization
- Secure database credentials
- Server-side validation

---

## 🧪 Testing

Test the following operations after installation:

### Create

Add a new student and verify that the record appears in the database.

### Read

Verify that student records are displayed correctly.

### Update

Edit an existing student and confirm that the updated information is saved.

### Delete

Delete a student and verify that the record is removed.

### Pagination

Navigate between pages and verify that the correct records are displayed.

### Search

Search for an existing student and verify the result.

---

## 🎯 Project Purpose

This project was created to demonstrate practical knowledge of:

- PHP Object-Oriented Programming
- MySQL database integration
- CRUD operations
- Database connectivity
- Pagination
- Search functionality
- HTML/CSS frontend development
- JavaScript
- Basic application architecture

It can also be used as a foundation for larger PHP management systems.

---

## 🔮 Future Improvements

Possible future enhancements:

- REST API integration
- Admin authentication
- User roles and permissions
- Advanced search and filtering
- AJAX CRUD operations
- Server-side validation
- CSRF protection
- Image upload
- Export to PDF
- Export to Excel
- Dashboard and statistics
- Advanced pagination
- API authentication

---

## 👨‍💻 Author

**Soumo**

Full-Stack Web Developer

### Skills

```text
HTML
CSS
JavaScript
PHP
PHP OOP
MySQL
REST API
Git
GitHub
```

---

## 📄 License

This project was developed for learning, portfolio and development purposes.
