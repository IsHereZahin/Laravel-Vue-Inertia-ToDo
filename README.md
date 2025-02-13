# ToDo Application

A task management application built with **Laravel** and **Vue.js** that helps you organize and track your daily tasks efficiently.

## Features

- **Authentication**: Register, log in.
- **Dashboard**: View today’s tasks.
- **Task Management**: Create, read, update, and delete all tasks.
- **Sign Out**: Securely log out.

## Prerequisites

Before you begin, ensure you have the following installed:

- PHP >= 8.2
- Composer
- Node.js >= 20.x
- MySQL (or a compatible database)

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository**

       git clone https://github.com/IsHereZahin/ToDo.git
       cd ToDo
2. **Install Dependencies**

       # Install PHP dependencies
        composer install
        
        # Install Node.js dependencies
        npm install
3. **Environment Setup**

        # Create environment file
        cp .env.example .env
        
        # Generate application key
        php artisan key:generate
4. **Database Configuration**
Update your .env file with your database credentials:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=todo_app
        DB_USERNAME=root
        DB_PASSWORD=your_password
5. **Database Migration**

        php artisan migrate
6. **Build Assets**

        For development
        npm run dev
        
        # For production
        npm run build
7. **Start the Application**

       php artisan serve

Visit <http://localhost:8000> in your browser.

Feel free to contribute or report issues!<br>
You can copy and paste this content into your `README.md` file on GitHub. Let me know if you need further assistance!
