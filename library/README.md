# Library Management System

This project is a Laravel application that allows user management, where each user can be classified as **Student** or **Teacher**. The application implements CRUD (Create, Read, Update, Delete) functionalities.

## Functionalities

- Add new users with the choice between **Student** and **Teacher**.
- Display a table listing all users with information such as name, email, type (student/teacher), and actions (edit/delete).
- Edit user information, including switching status between student and teacher.
- Delete users with confirmation.
- Clear and responsive interface.

## Requirements

- PHP >= 8.0
- Composer
- MySQL

## Installation

### Step 1: Clone the repository

Clone the project repository to your local environment:

git clone https://github.com/your-username/your-repository.git
cd your-repository

### Step 2: Install Laravel

If you haven't installed Laravel globally yet, install Composer (if necessary) and then install Laravel:

composer global require laravel/installer

### Step 3: Install dependencies

Inside the project directory, run the command to install the PHP and Laravel dependencies:

composer install

### Step 4: Configure the .env file

Duplicate the .env.example file and rename it to .env:

cp .env.example .env
Open the .env file and configure the following environment variables with your database information:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=usuario
DB_PASSWORD=senha

### Step 5: Generate the application key

After configuring the .env file, generate the application key:

php artisan key:generate

### Step 6: Migrate the database tables

Now you can run the migrations to create the tables in the database:

php artisan migrate

### Step 8: Run the local server

Finally, start the local Laravel server:

php artisan serve
The application will be accessible in the browser at the address http://localhost:8000.

### Usage
User Registration
To add a new user, navigate to the user registration page. In the registration form, you can enter details such as name, email, and password, as well as select whether the user will be a Student or Teacher.

### User Listing
The application has a table that lists all registered users, displaying information such as name, email, user type (Student or Teacher), and available actions (edit/delete).

### User Editing
You can edit a user's information, including switching between the Student and Teacher types, by clicking the edit button in the user listing table.

### User Deletion
To delete a user, simply click the delete button. A confirmation prompt will be displayed before proceeding with the deletion.

### Project Structure
Here is an overview of the main parts of the project:

- Models/User.php: This is the main user model. It uses Laravel traits such as HasApiTokens, HasFactory, and Notifiable. The model also contains the logic for relationships, such as the association of multiple loans (if there is loan logic).

- Views: The views are responsible for displaying the screens to the end user. They include the registration form, user listing, and other related pages.

- Controllers: Controllers, such as UserController, manage user actions such as creating, editing, deleting, and viewing data.

- Routes/web.php: Defines the application routes. Here, the routes map specific URLs to methods in the controllers.

- Migrations: Migration files responsible for creating and modifying database tables. This includes the users table and any other necessary tables for additional functionalities, such as loans.

### Explanation:

- **Essential Sections**: The `README.md` starts with a project description, followed by a list of key functionalities and requirements.
- **Installation Instructions**: It includes details on how to install Laravel and set up the local environment.
- **Usage**: This section covers the basic operations such as creating, listing, editing, and deleting users, along with a brief explanation of how the application works.
- **Project Structure**: Provides an overview of the main parts of the project, such as Models, Controllers, Views, etc.