# 🗳️ Online Voting System

A secure, user-friendly **Online Voting System** developed using **PHP and MySQL**, designed to digitize the voting process with accuracy, transparency, and efficiency.
\This project is built as an **academic and demonstration system**,showcasing full-stack web development skills.

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## 📌 Project Overview

The Online Voting System allows voters to cast their votes electronically while ensuring **one person -- one vote**.
\An **Admin Panel** is provided to manage candidates, view voting statistics, and monitor the election process.

The system focuses on: - Simplicity - Data integrity - Secure vote submission - Clean and responsive UI

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## ✨ Key Features

-   🧑‍💻 **Voter Registration & Validation**
-   🔒 **One-Time Voting Restriction**
-   🗳️ **Secure Vote Casting**
-   👨‍💼 **Admin Panel Access**
-   📋 **Candidate Nomination List**
-   📊 **Voting Statistics & Results**
-   🎨 **Responsive & Modern UI (Bootstrap)**

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## 🛠️ Technologies Used

### Frontend

-   HTML5
-   CSS3
-   Bootstrap
-   Google Fonts

### Backend

-   PHP (Core PHP)

### Database

-   MySQL

### Server

-   XAMPP (Apache + MySQL)

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## 📂 Project Structure

```text
online-voting-system/
├── index.html          # Main landing page
├── admin.html          # Admin login page
├── cpanel.php          # Admin control panel
├── nomination.html     # Candidate nomination list
├── vault.html          # Voting interface
├── saveVote.php        # Vote submission logic
├── updatePwd.php       # Admin password update
├── css/                # Stylesheets
├── js/                 # JavaScript files
├── images/             # Images and icons
└── README.md           # Project documentation
```


--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## ▶️ How to Run the Project (Local Setup)

Follow the steps below to run the **Online Voting System** on your local machine.

1. **Install XAMPP**
   - Download and install XAMPP from  
     https://www.apachefriends.org

2. **Start Required Services**
   - Open XAMPP Control Panel
   - Start **Apache**
   - Start **MySQL**

3. **Create Database**
   - Open your browser and go to:
     ```
     http://localhost/phpmyadmin
     ```
   - Create a new database named:
     ```
     db_evoting
     ```
   - Import the required tables into the database (SQL file)

4. **Setup Project Folder**
   - Copy the project folder into:
     ```
     C:\xampp\htdocs\
     ```

5. **Run the Application**
   - Open a browser and visit:
     ```
     http://localhost/online-voting-system/
     ```

---

### ✅ Notes
- Make sure Apache and MySQL are running before accessing the project
- Database credentials can be configured inside PHP files if needed
- This project is intended for academic and demonstration purposes


--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## 🔐 Admin Login (Demo)

-   **Username:** admin
-   **Password:** _admin

⚠️ These credentials should be changed for security purposes.

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## 🧩 How the System Works

-   Voters enter their details and select a candidate
-   The system verifies whether the voter has already voted
-   If valid, the vote is stored securely in the database
-   Duplicate voting is restricted using voter ID validation
-   Admins can monitor nominations and voting data through the control
    panel

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## 🎯 Project Objective

This project was created to: - Understand real-world web application flow - Practice PHP--MySQL integration - Learn form validation and database handling - Build a complete end-to-end system

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## 🚀 Future Improvements

-   Password hashing and encryption
-   OTP or email verification for voters
-   Advanced result analytics and charts
-   Improved UI animations
-   Role-based authentication

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## ⚠️ Disclaimer

This project is developed **for academic and learning purposes only**.
\It is not intended for use in real elections without advanced security and compliance measures.

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## 👩‍💻 Author

**Sahaduna Thahreen**\
Bsc Computer Science Graduate

Passionate about building practical web applications and learning new technologies.

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

⭐ If you find this project helpful, feel free to star the repository!
