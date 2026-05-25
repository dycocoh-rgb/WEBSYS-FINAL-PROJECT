# WEBSYS-FINAL-PROJECT
BloodSync: Blood Donation Drive System
A PHP-based web application for managing appointments, and blood drive events. Built as a final project for Web Systems.
---
Features
BloodBank is a server-side web application with one portal:
Admin Panel — Full control over donors, recipients, blood inventory, appointments, events, requests, users, and feedback.
Admin
Dashboard with real-time system stats (total donors, stored units, pending requests, etc.)
Blood type distribution overview
Track and update appointment statuses (auto-creates blood unit on completion)
Manage donation events
---
Project Structure
```
WEBSYS-FINAL-PROJECT-main/
│
├── includes/
│   ├── db.php              # Database connection (MySQLi)
│   ├── auth.php            # Session management & access control
│   ├── header.php          # Shared sidebar + topbar layout
│   └── footer.php          # Closes HTML layout, loads JS
│
├── admin/
│   ├── index.php           # Admin dashboard
│   ├── appointments.php    # Appointment tracking
│   ├── events.php          # Donation event management
│   ├── (admin view)
│
├── sign-in.php             # Login page (entry point)
├── logout.php              # Destroy session & redirect
│
└── assets/
    ├── style.css           # Global stylesheet (190 lines)
    └── script.js           # Client-side interactions (40 lines)
```
---
Database Setup
The application connects to a MySQL database named `blood_bank`. Import your SQL dump into the `blood_bank` database before running the app.
Installation
Steps
Clone or download the project into your server's web root:
```
   /xampp/htdocs/blood-bank/
   ```
Import the database:
Open phpMyAdmin (or your MySQL client)
Create a database named `blood_bank`
Import the provided `.sql` dump file
Configure credentials (if different from defaults):
Open `includes/db.php`
Start your server (Apache + MySQL) and navigate to:
```
   http://localhost/blood-bank/
   ```
---
Authors
Dollentas, Dwight Wayne A.
Dycoco, John Henrick S.
Morales, Mark Louie P.
Siton, Cydrex Nino M.
Taronga, Lawrence Johnkiel G.
