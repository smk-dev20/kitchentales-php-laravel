# KitchenTales

**Your Recipe. Your Story**  

KitchenTales is a personal recipe organizer that lets you store family recipes with your own unique twists. Preserve your culinary traditions and easily look up your favorite recipes.

[`https://kitchentales.webserve.xyz/`](https://kitchentales.webserve.xyz/)
---

## Requirements

- Webserver: Apache/Nginx 
- Database: MySQL  
- PHP >= 8.2 
- Composer  
- Node.js & npm  

---

## Local Development Setup

Follow these steps to get the app running locally:

### 1. Clone the repository
Clone into the appropriate folder of your xampp installation
```bash
git clone https://github.com/smk-dev20/kitchentales-php-laravel.git kitchentales
cd kitchentales
```
Ensure that the Apache and MySQL servers have been started

### 2. Set up Environment
#### 1. Copy .env.example to .env
```
cp .env.example .env
```
#### 2. Open .env and configure your database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kitchentales
DB_USERNAME=<username>
DB_PASSWORD=
```
Ensure DB_DATABASE exists in MySQL or create it manually.

#### 3. Install dependencies

- Composer (PHP dependencies)
```
composer install
```
- NPM (frontend dependencies & tailwind CSS)
```
npm install
npm run dev (for development)
npm run build (for production)
```

#### 4. Generate Application Key
The application key secures sessions and encrypted data. Generate it using:
```
php artisan key:generate
```

#### 5. Run Database Migrations
```
php artisan migrate
```
This will create the necessary tables user, sessions, recipes etc in the DB_DATABASE
#### 6. Create storage symlink (for recipe images)
```
php artisan storage:link
```

### 3. Run application
Ensure Apache has been started, your project folder is in the appropriate folder (htdocs for XAMPP) and open URL:
`http://localhost/kitchentales/public`

