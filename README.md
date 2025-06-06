# ✅ TaskList – Laravel Task Management Application

**TaskList** is a full-featured task management web application built with the Laravel framework. It leverages Docker Compose for streamlined setup and MySQL for data persistence. The application allows users to create, view, edit, and delete tasks through an intuitive web interface.

## 🚀 Features

- **Task CRUD Operations**: Create, read, update, and delete tasks seamlessly.
- **User-Friendly Interface**: Intuitive UI for efficient task management.
- **Dockerized Environment**: Simplified setup using Docker Compose.
- **MySQL Integration**: Robust data storage with MySQL.
- **Scalable Architecture**: Built with Laravel's MVC pattern for scalability and maintainability.

## 🛠️ Technologies Used

- **Backend**: [Laravel](https://laravel.com/)
- **Frontend**: Blade Templates
- **Database**: MySQL
- **Containerization**: Docker & Docker Compose
- **Package Management**: Composer & npm
- **Build Tool**: Vite

## 📦 Installation

### Prerequisites

- [Docker](https://www.docker.com/get-started) & [Docker Compose](https://docs.docker.com/compose/install/)
- [Composer](https://getcomposer.org/)

### Steps

1. **Clone the Repository**

   ```bash
   git clone https://github.com/Andreeoak/TaskList.git
   cd TaskList
   composer install
   docker compose up
   php artisan migrate --seed
   php artisan serve
