#  Registration System

## Overview
This project is a web-based competition registration system. It allows users to register for a competition by providing details such as country, college, name, contact number, gender, email, academic year, and domain/department. The system includes a view page to display registered participants with filtering options. The application is built using **Laravel** with **MySQL** as the database.

## Features
- **Registration Form**: Dynamic dropdowns for country (5 options) and college (10 options per country), with validation for all fields.
- **Data Storage**: Submissions are stored in a MySQL database (`registrations` table).
- **View Page**: Displays all registrations with search and filter functionality by gender and year.
- **Validation**: Ensures proper input for name, contact number, email (unique), year, and domain.
- **Responsive Design**: Styled with CSS for a user-friendly interface.

## Prerequisites
- **PHP** (version 8.1 or higher)
- **Composer** (for PHP dependency management)
- **Node.js** and **NPM** (for frontend assets)
- **MySQL** (for database)
- **Git** (for version control)

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/roshangomes/RegistrationForm.git
cd competition