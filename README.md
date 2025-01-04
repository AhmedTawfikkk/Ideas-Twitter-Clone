<p align="center">
  <a href="https://github.com/AhmedTawfikkk/Ideas-twitter-clone.git" target="_blank">
    <img src="public/git-assets/ideas-high-resolution-logo-transparent.png" width="400" alt="Ideas">
  </a>
</p>

# Ideas <span style="color:#38ABF2">(Twitter Clone)</span>

### Simplified Clone of Twitter

This project is a simplified clone of Twitter, built with Laravel. It mimics core features of Twitter, such as tweeting, following users, liking tweets, and more.

---
## Table of Contents

- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)

---

## Features
- **User Authentication**  
  Login and Register
- **Interactive Engagement**  
  Share tweets, Like and reply to tweets
- **Profile Management**  
  Customize your profile with profile picture and more
- **Follow and Unfollow Users**   
  Build your own social circle by following and unfollowing users
---

## Prerequisites

Before running the project locally, make sure you have the following installed:

### 1. **PHP 8.1 or higher**: [Download PHP](https://www.php.net/downloads)
### 2. **Composer**: Dependency manager for PHP [Download Composer](https://getcomposer.org/download/)
### 3. **Database**: MySQL or PostgreSQL recommended
- **MySQL**: [Download MySQL](https://www.mysql.com/downloads/)

- **PostgreSQL**: [Download PostgreSQL](https://www.postgresql.org/download/)
### 4. **Node.js & NPM**: Required for frontend dependency management [Download Node.js](https://nodejs.org/en/download/)
### 5. **Git**: Version control system [Download Git](https://git-scm.com/)

---

## Installation

Follow these steps to set up and run the Twitter clone on your local machine.

### 1. Clone the repository:

```bash
git clone https://github.com/AhmedTawfikkk/Ideas-twitter-clone.git
cd Ideas-twitter-clone
``` 

### 2. Install backend dependencies:

```bash
composer install
```

### 3. Set up the environment file:

```bash
cp .env.example .env
```
### 4. Generate the application key:

```bash
php artisan key:generate
```
### 5. Set up the database:
Create a new MySQL database (or any other supported database) and configure the connection in your **.env** file:

```env
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password```
```
### 6. Run the database migrations:

```bash
php artisan migrate
```
### 7. Run the application:

```bash
php artisan serve
```

 
