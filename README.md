# School ERP

A containerized School ERP system built with **Laravel**, **PostgreSQL**, and **Docker**, designed to manage core academic and administrative workflows such as academic years, classes, students, and related entities. The project now includes **fully configured Docker support**, **complete database migrations**, and **seeders for all tables** to enable fast and consistent local setup.

---

## 🚀 Features

* Modular School ERP backend architecture
* Laravel-based REST-ready backend
* Fully Dockerized development environment via Laravel Sail
* Database migrations for all tables
* Seeders for all core entities (ready-to-use demo data)
* Environment consistency across systems
* Easy onboarding for new developers

---

## 🧱 Tech Stack

* **Backend:** Laravel (PHP)
* **Database:** PostgreSQL
* **Containerization:** Docker via Laravel Sail
* **ORM:** Eloquent
* **Dependency Management:** Composer

---

## 📦 Project Setup (Dockerized)

### Prerequisites

Make sure you have the following installed:

* Docker
* Docker Compose

---

### 1️⃣ Clone the Repository

```bash
git clone <your-repo-url>
cd school_erp
```

---

### 2️⃣ Environment Configuration

Copy the example environment file:

```bash
cp .env.example .env
```

Update the following values if required:

```env
DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=school_erp
DB_USERNAME=sail
DB_PASSWORD=password
```

---

### 3️⃣ Build and Start Containers (Laravel Sail)

This project uses **Laravel Sail** as the Docker interface.

```bash
./vendor/bin/sail up -d
```

If Sail is not installed yet:

```bash
composer require laravel/sail --dev
php artisan sail:install
```

---

### 4️⃣ Install Dependencies

```bash
./vendor/bin/sail composer install
```

---

### 5️⃣ Generate Application Key

```bash
./vendor/bin/sail artisan key:generate
```

---

### 6️⃣ Run Migrations & Seeders

All migrations and seeders are fully implemented.

```bash
./vendor/bin/sail artisan migrate --seed
```

This will:

* Create all required tables
* Populate them with initial data

---

## 🗃️ Database Structure

The project includes migrations and seeders for:

* Academic Years
* Classes
* Students
* Sections
* Subjects
* Relationships between academic entities

All schema changes are version-controlled via migrations.

---

## 🧪 Useful Commands

````bash
# Start containers
./vendor/bin/sail up -d

# Stop containers
./vendor/bin/sail down

# Run artisan commands
./vendor/bin/sail artisan <command>

# Access psql
./vendor/bin/sail psql
```bash
# Stop containers
docker compose down

# Rebuild containers
docker compose up -d --build

# Run artisan commands
docker compose exec app php artisan <command>
````

---

## 🧠 Development Notes

* Docker ensures environment parity across machines
* Seeders allow instant testing without manual data entry
* Migrations make schema changes safe and trackable
* Designed to scale into a full-featured ERP system

---



## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

---

## 📄 License

This project is open-source and available under the MIT License.

---

## 👤 Author

**Richu Thankachan**
Full Stack Developer | Software Engineer

---
