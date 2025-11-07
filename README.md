# Employee Registration & Management System (EmployeeregisterDB)

## Features
Here is where your **Features** section starts.

### Public
- Employee Registration
- Employee Login
- Employee Search
- Session Management

### User Dashboard
- Edit Profile
- Attendance Tracking
- Attendance History
- Detailed Profile Management
- Item Calculator

## Tech stack

* **Backend:** PHP (plain PHP, procedural style in original)
* **Database:** MySQL / MariaDB
* **Frontend:** HTML, CSS, JavaScript, jQuery
* **Styling:** Bootstrap

---

## File structure (summary)

```
.
├── DB/
│   └── Task1.sql           # (provided, incomplete)
├── Includes/
│   ├── db.php              # DB connection
│   ├── function.php        # Registration logic
│   ├── login.php           # Login logic
│   └── ...
├── user/
│   ├── Includes/
│   │   ├── function.php    # Profile update logic
│   │   ├── insert.php      # Education/experience details logic
│   │   └── ...
│   ├── index.php
│   ├── edit.php
│   ├── attendance.php
│   ├── view.php
│   ├── details.php
│   ├── Iteam.php
│   └── signout.php
├── css/
├── js/
├── index.php
├── login.php
└── autocomplete.php
```

---

## Prerequisites

* Local web server: **XAMPP**, **WAMP**, **MAMP** or similar (Apache + PHP + MySQL)
* PHP 7.4+ recommended
* MySQL or MariaDB
* `php-mysqli` enabled (or PDO if you adapt code)

---

## Installation & Run (local)

1. Start your Apache & MySQL (e.g., via XAMPP Control Panel).
2. Copy the project folder into your web server root:

   * XAMPP: `C:\xampp\htdocs\EmployeeregisterDB`
   * MAMP: `/Applications/MAMP/htdocs/EmployeeregisterDB`
3. Open `http://localhost/EmployeeregisterDB/` in your browser.
4. Create the database and required tables (see **Database Setup** below).
5. Register a new user or log in with an existing user.

---
## Security Warning

This project was built for educational purposes and contains critical security vulnerabilities. It is NOT safe for production use.

**SQL Injection:** The code directly inserts user input into database queries, making it highly vulnerable to SQL injection attacks.

**Insecure Password Hashing:** Passwords are hashed using the outdated crypt() function with a hardcoded, static salt. This is extremely insecure and can be easily cracked.

**Recommendation:** To secure this application, all database queries must be rewritten using prepared statements (with mysqli or PDO), and password hashing must be reimplemented using password_hash() and password_verify().
