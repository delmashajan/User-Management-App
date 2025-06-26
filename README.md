# Laravel User Management API

This project is a simple User Management System built using Laravel, demonstrating clean architecture with DAO, BO, and Service Layers, along with form request validation and caching.

---

## ✅ Features

- Create, update, and retrieve user records
- Retrieve all users (with caching)
- Input validation using Form Request classes
- Modular architecture with DAO, BO, and Service layers
- Optimized performance with Laravel caching

---

## 📁 Project Structure

```

app/
├── BO/                 # Business logic
│   └── UserBO.php
├── DAO/                # Data access logic
│   └── UserDAO.php
├── Services/           # Service layer
│   └── UserService.php
├── Http/
│   ├── Controllers/
│   │   └── UserController.php
│   ├── Requests/
│   │   ├── StoreUserRequest.php
│   │   └── UpdateUserRequest.php
├── Models/
│   └── User.php

````

---

## 🛠 Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/delmashajan/User-Management-App.git
   cd user-management-app
````

2. **Install dependencies**

   ```bash
   composer install
````

3. **Create `.env` file**

   ```bash
   cp .env.example .env
````

4. **Set your database configuration** in `.env`

5. **Generate app key**

   ```bash
   php artisan key:generate
````

6. **Run migrations**

   ```bash
   php artisan migrate
   ````

7. **Start the server**

   ```bash
   php artisan serve
   ```

---

## 🔌 API Endpoints

| Method | Endpoint          | Description             |
| ------ | ----------------- | ----------------------- |
| POST   | `/api/users`      | Create a new user       |
| PUT    | `/api/users/{id}` | Update an existing user |
| GET    | `/api/users`      | Retrieve all users      |
| GET    | `/api/users/{id}` | Retrieve a single user  |

---

## 📥 Request Validations

### Create User (`POST /api/users`)

```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123"
}
```

### Update User (`PUT /api/users/{id}`)

```json
{
  "name": "Jane Doe",
  "email": "jane@example.com",
  "password": "newpassword123"
}
```

---

## ⚙️ Caching

* `GET /users/{id}` and `GET /users` are cached for 60 minutes.
* Cache is invalidated on `POST` or `PUT` requests.

---

## 📌 Design Patterns Used

* **DAO**: For all database interactions
* **BO**: For preparing business logic like password encryption
* **Service Layer**: Acts as a bridge between controller and business logic

---


