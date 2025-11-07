Employee Registration & Management System (EmployeeregisterDB)

This is a PHP and MySQL-based web application designed for basic employee management. It allows employees to register for an account, log in to a personal dashboard, manage their profile details, and mark their daily attendance.

Features

Public Features

Employee Registration: A public form (index.php) allows new users to register an account. The system checks for duplicate usernames, emails, and phone numbers.

Employee Login: A secure login page (login.php) for registered employees.

Session Management: Uses PHP sessions to keep users logged in and protect user-specific pages.

Employee Search: A public search page (autocomplete.php) with an autocomplete feature to find employees by their email address.

User Dashboard Features (in /user directory)

User Dashboard: A central home page (user/index.php) that welcomes the logged-in employee and displays their basic profile information.

Edit Profile: Users can update their personal information (name, course, phone, address) after confirming their password (user/edit.php).

Attendance Marking: Employees can mark their daily attendance as 'fullday', 'halfday', or 'leave'. Check-in and check-out times are recorded if applicable (user/attendance.php).

Attendance History: A complete, table-based view of the user's entire attendance history (user/view.php).

Detailed Profile Management: A comprehensive form (user/details.php) where users can dynamically add, edit, or delete multiple entries for their:

Education History

Work Experience

Item Calculator: A utility (user/Iteam.php) for calculating totals based on item quantity, rate, and discount.

Tech Stack

Backend: PHP

Database: MySQL

Frontend: HTML, CSS, JavaScript, jQuery

Styling: Bootstrap

How to Run the Project

Prerequisites

A local web server environment like XAMPP, WAMP, or MAMP.

Make sure the Apache and MySQL services are running.

1. Database Setup

Open phpMyAdmin (usually at http://localhost/phpmyadmin).

Create a new database and name it Task1.

Select the Task1 database and go to the "Import" tab.

Upload and import the DB/Task1.sql file.

IMPORTANT: The provided Task1.sql file is incomplete. It only creates the Employee and Attendance tables. You must manually create the following tables for the application to work correctly:

Emp_education (for user/details.php)

Emp_exp (for user/details.php)

calculater (for user/Iteam.php)

grandtotal (for user/Iteam.php)

2. Application Setup

Copy the entire project folder (e.g., EmployeeregisterDB) into your web server's root directory.

For XAMPP, this is typically C:/xampp/htdocs/.

Open your web browser and navigate to http://localhost/EmployeeregisterDB/.

You can now register a new user or log in with an existing one.

File Structure

.
├── DB/
│   └── Task1.sql           # (Incomplete) Database schema
├── Includes/
│   ├── db.php              # Main database connection
│   ├── function.php        # Registration logic
│   ├── login.php           # Login logic
│   └── ...
├── user/
│   ├── Includes/
│   │   ├── function.php    # Profile update logic
│   │   ├── insert.php      # Logic for education/experience details
│   │   └── ...
│   ├── index.php           # User dashboard
│   ├── edit.php            # Edit profile page
│   ├── attendance.php      # Mark attendance page
│   ├── view.php            # View attendance history
│   ├── details.php         # Edit education/experience
│   ├── Iteam.php           # Item calculator page
│   └── signout.php         # Logout script
├── css/                    # CSS stylesheets
├── js/                     # JavaScript files
├── index.php               # Public registration page
├── login.php               # Public login page
└── autocomplete.php        # Public search page


⚠️ Security Warning

This project was built for educational purposes and contains critical security vulnerabilities. It is NOT safe for production use.

SQL Injection: The code directly inserts user input into database queries, making it highly vulnerable to SQL injection attacks.

Insecure Password Hashing: Passwords are hashed using the outdated crypt() function with a hardcoded, static salt. This is extremely insecure and can be easily cracked.

Recommendation: To secure this application, all database queries must be rewritten using prepared statements (with mysqli or PDO), and password hashing must be reimplemented using password_hash() and password_verify().
