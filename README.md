# 🧾 Job Portal API (Laravel)
This is a Job Portal application built with Laravel (v12.19.2+), providing core features for managing job seekers, companies, accounts, and related APIs.
## Features
- 🔐 Authentication (for job seekers and companies)
- 🧑‍💼 Job Seeker management
- 🏢 Company profile and job management
- 📄 Job posting and application
- 💾 Saved jobs / candidates
- 🔎 Search and filter functionality
- 📦 RESTful APIs

--- 
## Getting Started

### ✅ Requirements
- PHP >= 8.1
- Composer
- MySQL
- Laravel >= 11 (new bootstrap/app.php structure)

### ⚙️ Installation
```bash
# Clone the respository
git clone git@github.com:longchi-dev/job-portal.git
cd job-portal

# Install PHP dependencies
composer install

# Copy .env file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 🛠 Configure Environment
Open .env and update your database configuration
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=job_portal
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 🧱 Run Migrations and Seeders
```bash
# Create database tables
php artisan migrate

# Seed with sample data
php artisan db:seed --class=JobPortalSeeder
```

### 🚀 Run the Server
```bash
php artisan serve
```

### 📚 API Endpoints
#### 👤 Job Seekers
| Method | Endpoint              | Description             |
| ------ | --------------------- | ----------------------- |
| GET    | `/api/job-seekers`      | Get all job seekers     |
| GET    | `/api/job-seekers/{id}` | Get specific job seeker |
| POST   | `/api/job-seekers`      | Create job seeker       |
| PUT    | `/api/job-seekers/{id}` | Update job seeker       |
| DELETE | `/api/job-seekers/{id}` | Delete job seeker       |

#### 👤 User Info
| Method | Endpoint                           | Description                                                            |            |
| ------ | ---------------------------------- | ---------------------------------------------------------------------- | ---------- |
| GET    | `/api/users`                       | Get all job seekers with their accounts                                |            |
| GET    | `/api/users/{id}/full-info`        | Get full info (including account) of a job seeker                      |            |
| GET    | `/api/users/{id}/basic-info?type=` | Get basic info (name & avatar) of job seeker or company (\`type=client | company\`) |

#### 🏢 Companies

#### 📄 Jobs

#### 📥 Applications
| Method | Endpoint           | Description           |
|--------|--------------------|-----------------------|
| POST   | `/api/applications`  | Apply to a job        |
| POST   | `/api/invites`       | Company invites user  |

