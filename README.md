# SafeNet Pro — Social Media Campaign Hub

> **Status: Complete.** A working dynamic web application built as coursework in 2024.

A PHP/MySQL web application for "SafeNet Pro" (SMC Ltd.), a social media safety awareness campaign aimed at teenagers and parents — covering public-facing educational content alongside an admin panel for managing that content.

## Features

**Public-facing**
- Home, Information, Legislation/Guidelines, and Contact pages
- Educational content on online safety, parental guidance, and support resources
- Social media profile links and a livestreaming/newsletter section
- Login for registered members

**Admin**
- Manage educational content (add, edit, delete)
- Manage newsletters, social media profiles, and web services listings
- View and manage members and user inquiries

## Tech stack

- **PHP** — server-side logic, page templates
- **MySQLi** — database connectivity (`connection.php`)
- **HTML/CSS** — page structure and styling (`styles.css`)
- **MySQL** — relational backend, database name `dw_assignment` (schema not included in this repo — see Notes)

## Project structure

```
safenet-pro/
├── index.php                 # Home page
├── login.php / login-success.php / logout.php
├── information.php / guidelines.php / contact.php / newsletters.php
├── membership.php / membershipEdit.php / membershipDelete.php
├── eduContents*.php          # Admin: educational content CRUD
├── newsLetters*.php          # Admin: newsletter CRUD
├── snsProfile*.php           # Admin: social media profile CRUD
├── webservices*.php          # Admin: web services CRUD
├── connection.php            # Database connection
├── styles.css
└── images/
```

## Setup

1. **Database**
   - This repo doesn't include a schema export — the original assignment database (`dw_assignment`) wasn't archived alongside the code. Based on the queries in the PHP files, it uses at least these tables: `user`, `user_account`, `user_inquiries`, `educational_contents`, `newsletters`, `socialmedia_profiles`, `web_services`. You'd need to recreate these manually (or from the original submission, if you still have a DB export) to run this locally.
   - `connection.php` expects a local MySQL/MariaDB server (e.g. via XAMPP/MAMP) with no password on `root` and a database named `dw_assignment`.

2. **Run**
   - Place the folder in your local server's web root (e.g. `htdocs/` for XAMPP).
   - Start Apache and MySQL, then visit `http://localhost/safenet-pro/index.php`.

## Notes

This was built as coursework and is illustrative rather than production-grade. `connection.php` uses a blank root password, which is standard for local XAMPP/MAMP development but should never be used as-is anywhere publicly accessible. No database schema is bundled here, so the app won't run out of the box without recreating the tables referenced above.

## Author

April Soe Naing — [aprilsoenaing.786@gmail.com](mailto:aprilsoenaing.786@gmail.com)
