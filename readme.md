Car Rental System

-------------------------------------
Description
-------------------------------------
A full-stack **Car Rental Web Application** built with **PHP, MySQL, Bootstrap, jQuery**, and **PHPMailer**.
Customers can browse cars, check prices, and make bookings; admins can manage vehicles, customers, and reservations.

This project was developed as a practical web application to demonstrate skills in **backend development, authentication, database design, and UI integrations** using a Bootstrap template.

-------------------------------------
Features
-------------------------------------
Customer side
  - View available cars with images, details, and daily price
  - See individual car details page (`car-single.php`)
  - Register and log in as a customer
  - Secure login system with session handling
  - Book or reserve cars from the listing or details page
  - Contact form to send messages to the site owner
  - Forget password flow:
      - Request reset
      - Email-based OTP verification (`forgetpassword.php` & `regotpverify.php`)
      - Update password (`updatepassword.php`)
  - Make payment securely,

Admin side
  - Note: Admin pages are inside the `Admin/` folder
  - Admin login dashboard
  - Manage car inventory:
      - Add/edit/delete cars
      - Manage car details like plate, model, brand, price per day, etc.
      - Manage the car for maintenance.
  - View and manage reservations/bookings
  - View registered customers
  - View and respond to contact form submissions
  - Basic reporting/overview of system activity

Authentication & Security (Basic)
  - PHP session-based authentication for both Admin & Customer
  - Email-based verification using **PHPMailer**
  - Separate login flows (`login.php`, `register.php`, `logout.php`)

-------------------------------------
Technology used
-------------------------------------
Frontend
  - HTML5
  - CSS3
  - Bootstrap4
  - jQuery
  - JavaScript

Backend
  - PHP (Procedural)
  - MySQL database

Libraries/tools
  - [PHPMailer](https://github.com/PHPMailer/PHPMailer) for sending emails (OTP/password reset/contact)
  - Bootstrap template based on **Carbook** ([colorlib template](https://colorlib.com/))
  - [Strip API](https://stripe.com/) (Payment gateway)
 
-------------------------------------
Getting Started
-------------------------------------
**Prerequisites** <br>
  - XAMPP
  - PHP 7+ (or compatible)
  - MySQL/MariaDB/phpMyAdmin
  - Composer (Optional, only if you want to reinstall PHPMailer via Composer)

**Clone the Repository** <br>
  - command: git clone https://github.com/ShivamManojPatel/Car-Rental-System.git && cd Car-Rental-System

  - Move the project into your web server root:
    - For XAMPP (Windows): C:\xampp\htdocs\Car-Rental-System
    - For XAMPP (MacOS): /Applications/XAMPP/xamppfiles/htdocs/

**Database Setup** <br>
  01. Start Apache and MySQL from XAMPP.
  02. Open phpMyAdmin at:
    - http://localhost/phpmyadmin
  03. Create a new database, for example:
    - CREATE DATABASE car_rental;
  04. Import the SQL file from the Database File folder:
    - Go to the new database in phpMyAdmin
    - Click on import
    - Select .sql file inside Database File/
    - Click Go

  This will create the necessary tables (Users, Cars, Booking, etc.)

**Configure Database Connection** <br>
Open datacon.php and update:
  $server = "localhost";
  $username = "root";
  $password = ""; // Set MySQL password if you have one
  $ dbname = "car_rental"; // Use the same name you created in phpMyAdmin

Save the file.

**Configure Email (PHPMailer)** <br>
If you're using OTP or password reset features via email:
  - Open the relevant files (e.g., regotpverify.php, forgotpassword.php, or PHPMailer config files)
  - Configure:
    - SMTP host (e.g., smtp.gmail.com)
    - SMTP Port
    - Username (email)
    - App password (if using Gmail)
    - From Address/name

Make sure less-secure apps or app passwords are configured correctly with your email provider.

**Run the Application** <br>
Open your browser and go to:
  - http://localhost/Car-Rental-System/index.php

From there, you can:
  - Browse cars
  - Register as a customer
  - Log in and test booking flows
  - Log in as Admin (after creating admin credentials in the DB or via a seed)

**Admin Credentials** <br>
Depending on how you set up the database:
  - Check the imported SQL file for any default admin user.
  - If there's no default admin:
    - Insert an admin row manually into the users table via phpMyAdmin.
    - Example: insert into customer(CUS_FNAME, CUS_LNAME, CUS_EMAIL, CUS_PASSWORD, CUS_PHONE, CUS_LICENSE_NUM, USER_TYPE)values('John', 'Doe', 'Admin_CarRental@gmail.com', 'Admin123', '555-555-5555', '123-xyz', 'Admin')
    - Here, CUS_EMAIL, CUS_PASSWORD, and USER_TYPE are important. This will help to log in as admin. And the Password should be hashed using the PHP password_hash() function

-------------------------------------
Minor feature
-------------------------------------
- Role-based access control (Different login flow for customer and admin. But, same login page).
- Secure integration payment gateway using Stripe.
- Booking status based on stage of booking for better understanding (Pending, confirmed, cancelled, completed).
- Filters for sorting cars for a better surfing experience (by price range, brand, transmission type, etc).
- Logging in before renting or making a reservation for security and audit.

-------------------------------------
Possible Enhancement
-------------------------------------
- Refactor into an MVC structure or use a framework like Laravel later.

-------------------------------------
Acknowledgement
-------------------------------------
- Frontend UI based on the Carbook Bootstrap template from [Colorlib](https://colorlib.com/).
- PHPMailer library for handling email features.
- Bootstrap, jQuery, Font Awesome, and related vendors inside vendor/ folder.

-------------------------------------
Author
-------------------------------------
**Shivam Patel, Krushi Patel & Smit Meghapara** <br>
Pace University | Seidenberg School of Computer Science and Information Systems

