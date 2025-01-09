# Tasks Management App with Laravel 8

This repository contains the **Tasks Management App** project developed during the **"Mastering Laravel 8 Framework"** class. The app is a practical implementation of core Laravel concepts, designed to manage tasks efficiently and securely.

## About the Project

The **Tasks Management App** is a fully functional web application that enables users to create, manage, and organize tasks. It was built to demonstrate the real-world application of Laravel's features and tools, combining essential web development practices into one cohesive project.

### Features:

-   **User Authentication**: Secure login and registration system to protect user data.
-   **Task Management**:
    -   Create, view, update, and delete tasks.
    -   Mark tasks as completed or pending.
    -   Organize tasks by priority or category (future expansion possible).
-   **Role-Based Access Control**: Restrict access to specific functionalities using middleware.
-   **Responsive User Interface**: Designed using Laravel's Blade templating engine for a clean and interactive UI.
-   **Validation and Security**: Ensures data integrity and protects against common web vulnerabilities.

### Technologies Used:

-   **Framework**: Laravel 8
-   **Frontend**: Blade Templating Engine, HTML, CSS
-   **Database**: MySQL (via Eloquent ORM)
-   **Server**: XAMPP or Laragon for local development
-   **Version Control**: Git

### What I Learned:

While building this project, I gained hands-on experience with:

1. Setting up and configuring Laravel for development.
2. Creating routes and controllers to manage application logic.
3. Using Eloquent ORM to interact with the database seamlessly.
4. Building a secure authentication system using Laravel's built-in Auth features.
5. Implementing middleware for role-based access control.
6. Validating user input to ensure data quality and integrity.
7. Designing a user-friendly interface with the Blade templating engine.

## Installation and Setup

Follow these steps to set up the project locally:

1. Clone the repository:
    ```bash
    git clone https://github.com/sulhanfuadi/tasks-management-app.git
    ```
2. Navigate to the project folder:
    ```bash
    cd tasks-management-app
    ```
3. Install dependencies:
    ```bash
    composer install
    npm install
    npm run dev
    ```
4. Configure the `.env` file:

    - Duplicate `.env.example` and rename it to `.env`.
    - Update the database credentials to match your local setup.

5. Run migrations to set up the database:

    ```bash
    php artisan migrate
    ```

6. Start the development server:

    ```bash
    php artisan serve
    ```

7. Open the app in your browser at `http://localhost:8000`.

## Usage

-   **Register/Login** to access the app's features.
-   Use the task dashboard to create, update, and manage tasks.
-   Explore and modify the codebase to experiment with new features or improve existing ones.

## License

This project is licensed under the MIT License. Feel free to use, modify, and distribute the code for both personal and commercial purposes.

## Acknowledgments

Thanks to **CodePolitan** and **Ahmad Hakim** for providing the opportunity to learn and apply Laravel concepts through a structured, hands-on approach.

---

Let me know if there’s anything else you’d like to expand or refine!
