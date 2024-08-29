# User Management System

This project is a simple User Management System built with PHP and MySQL, designed to allow user registration, login, profile picture upload, and the ability to view a list of all registered users. The system is developed following clean code practices and organized using a modular structure.

## Features

- **User Registration**: New users can register by providing a username, email, and password.
- **User Login**: Registered users can log in using their email and password.
- **Profile Picture Upload**: After logging in, users can upload a profile picture to personalize their account.
- **User Dashboard**: Logged-in users can view their dashboard with a welcome message and their profile picture.
- **View Registered Users**: Admins or authorized users can view a list of all registered users.

## Technologies Used

- **PHP**: Server-side scripting language used for the backend.
- **MySQL**: Relational database management system used to store user data.
- **HTML/CSS**: Frontend technologies used for structuring and styling the web pages.
- **Material Design**: Simple, responsive CSS styles inspired by Material Design.

## Prerequisites

- **XAMPP** (or any similar PHP development environment) installed on your local machine.
- **Composer** (optional) for dependency management.
- **Git** (optional) for version control.

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/user-management-system.git
   ```
2. **Start XAMPP** and ensure Apache and MySQL are running.

3. **Create the Database**:
   - Open phpMyAdmin (http://localhost/phpmyadmin) and create a new database named `user_management`.
   - Import the `user_management.sql` file provided in the `database` directory.

4. **Configure Database Connection**:
   - Open `includes/db_connect.php` and adjust the `$servername`, `$username`, `$password`, and `$dbname` variables if necessary.

5. **Upload the Project Files**:
   - Copy the project folder into the `htdocs` directory of your XAMPP installation.
   - Open your web browser and navigate to `http://localhost/user-management-system/public`.

## Project Structure

```
project_root/
│
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   └── img/
│
├── includes/
│   ├── config.php
│   ├── header.php
│   ├── footer.php
│   └── db_connect.php
│
├── public/
│   ├── index.php
│   ├── register.php
│   ├── login.php
│   ├── dashboard.php
│   ├── upload_photo.php
│   ├── users.php
│   └── logout.php
│
├── src/
│   ├── User.php
│   └── Auth.php
│
└── uploads/
    └── default.png
```

### Detailed Descriptions

- **`assets/`**: Contains CSS, JavaScript, and image files used throughout the project.
- **`includes/`**: Contains configuration files and reusable components like headers and footers.
- **`public/`**: Contains all the publicly accessible pages like login, registration, dashboard, etc.
- **`src/`**: Contains PHP classes for handling user data and authentication.
- **`uploads/`**: Stores user-uploaded profile pictures.

## How to Use

1. **Register a New User**:
   - Navigate to `http://localhost/user-management-system/public/register.php`.
   - Fill in the registration form and submit.

2. **Log in**:
   - Navigate to `http://localhost/user-management-system/public/login.php`.
   - Enter the email and password used during registration.

3. **Upload a Profile Picture**:
   - After logging in, you’ll be redirected to the dashboard.
   - Click on the "Upload New Profile Picture" link to upload a picture.

4. **View Registered Users**:
   - Navigate to `http://localhost/user-management-system/public/users.php` to see a list of all registered users.

## License

This project is licensed under the MIT License.

## Contributing

If you wish to contribute to this project, please fork the repository and submit a pull request. We appreciate your contributions!

---

This `README.md` provides a comprehensive overview of the system, guiding users through the setup and usage process. If you need any changes or additional sections, feel free to ask!