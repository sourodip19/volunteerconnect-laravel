# VolunteerConnect

VolunteerConnect is a modern NGO and volunteer management platform built using Laravel 12, Laravel Breeze, Tailwind CSS, and MySQL.

The platform connects organizations with volunteers through opportunity postings, applications, approval systems, dashboards, certificate issuance, and more.

---

# Features

## Authentication System

- User Registration
- Login & Logout
- Forgot Password
- Password Reset via Email
- Secure Password Hashing

---

# Role-Based Access Control

The platform supports 3 user roles:

## Volunteer
- Browse opportunities
- Apply for opportunities
- Track application status
- View dashboards
- Download certificates

## Organization
- Create opportunities
- Edit/Delete opportunities
- Manage applicants
- Accept/Reject volunteers
- Issue certificates

## Admin
- Dedicated admin dashboard

---

# Opportunity Management

Organizations can:

- Create volunteer opportunities
- Upload opportunity images
- Edit opportunities
- Delete opportunities

Volunteers can:

- Browse all opportunities
- Search/filter opportunities
- View detailed opportunity pages

---

# Application System

Volunteers can:

- Apply for opportunities
- Prevent duplicate applications
- Track status:
  - Pending
  - Accepted
  - Rejected

Organizations can:

- Review applicants
- Accept or reject applications

---

# Certificate System

Organizations can issue certificates to accepted volunteers.

Volunteers can:
- View issued certificates
- See certificate details
- Download PDF certificates

PDF certificates are generated dynamically using Laravel DOMPDF.

---

# Dashboards

## Volunteer Dashboard
- Total applications
- Accepted applications
- Pending applications
- Rejected applications
- Recent applications
- Quick actions

## Organization Dashboard
- Total opportunities
- Total applicants
- Accepted volunteers
- Pending volunteers
- Recent opportunities
- Recent applicants

---

# Search & Filtering

Users can:
- Search by title
- Filter by category
- Filter by location

---

# Tech Stack

## Backend
- Laravel 12
- PHP 8.4

## Frontend
- Blade Templates
- Tailwind CSS
- Laravel Breeze

## Database
- MySQL

## Additional Packages
- barryvdh/laravel-dompdf

---

# Installation

## Clone Repository

```bash
git clone <your-repository-url>
```

---

## Install Dependencies

```bash
composer install
npm install
npm run dev
```

---

## Environment Setup

Copy `.env.example`

```bash
cp .env.example .env
```

Generate app key:

```bash
php artisan key:generate
```

---

# Database Setup

Update `.env` with your database credentials.

Run migrations:

```bash
php artisan migrate
```

---

# Storage Link

```bash
php artisan storage:link
```

---

# Start Server

```bash
php artisan serve
```

---

# Mail Configuration (Gmail SMTP)

Update `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=yourgmail@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=yourgmail@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

---

# Screenshots

(Add screenshots here)

---

# Future Improvements

- Real-time notifications
- Chat system
- Volunteer ratings
- NGO verification system
- Dark mode
- Event attendance tracking
- QR-based certificate verification

---

# Author

Sourodip Dey

---

# License

This project is open-source and available under the MIT License.