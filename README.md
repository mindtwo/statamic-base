[![mindtwo GmbH](https://www.mindtwo.de/downloads/doodles/github/repository-header.png)](https://www.mindtwo.de/)

# mindtwo Statamic Base

Complete Statamic starter kit with dashboard widgets, modern frontend stack, and enterprise configuration.

## Installation

```bash
statamic new my-project
cd my-project
php please starter-kit:install mindtwo/statamic-base
```

## What's Included

### Backend Features
- **Dashboard Widgets**: Customized dashboard with helpful widgets

### Frontend Stack
- **Tailwind CSS 4** with [@tailwindcss/forms](https://github.com/tailwindlabs/tailwindcss-forms) and [@tailwindcss/typography](https://github.com/tailwindlabs/tailwindcss-typography)
- **Alpine.js 3** for interactive components  
- **Vite 7** for modern asset building

### Content Management
- **Eloquent Driver**: Database storage for better workflows, performance and more stable deployments
- **Multilingual Setup**: German/English with proper SEO
- **Content Structure**: Pre-configured collections and blueprints
- **Global fields setup**: Centralized field management
- **Navigation**: Dynamic menus and navigation trees
- **Forms**: Ready-to-use contact forms with optional CAPTCHA (Cloudflare Turnstile) support

## Dependencies

### Automatically Installed
- `statamic/cms` - Statamic CMS core
- `spatie/laravel-data` - Data Transfer Objects
- `laravel/envoy` - Deployment automation
- `laravel/boost` - Development tools
- `mindtwo/statamic-base` - This package (widgets & utilities)
- `statamic/eloquent-driver` - Database storage (automatic if database mode desired)

### Optional
- `aryehraber/statamic-captcha` - Form protection ([documentation](https://github.com/aryehraber/statamic-captcha))
- `sentry/sentry-laravel` - Error tracking (prompted during install)

## Configuration

The starter kit includes:

### Database-First Architecture

This starter kit is prepared to use Statamic's **[Eloquent Driver](https://github.com/statamic/eloquent-driver)** for database storage instead of the traditional flat-file approach. While database usage is optional, it provides better performance, easier backups, and improved scalability for production environments when enabled.

**Stored in Database:**
- Collection entries (pages, articles, etc.)
- Form submissions
- Asset metadata
- Global content
- Navigation trees
- Taxonomy terms
- User accounts and roles

**Stored as Files:**
- Content blueprints and fieldsets
- Site configuration files
- Templates and views

### Multilingual
- German (`de`) as primary language
- English (`en`) as secondary language
- Language switcher with hreflang SEO tags

### Development + AI Tools
- Laravel Boost integration 
- Laravel Envoy deployment scripts

## Setup Instructions

### 1. Database Configuration (Optional but Recommended)

This starter kit supports **[Eloquent Driver](https://github.com/statamic/eloquent-driver)** for database storage instead of flat files. For optimal performance, configure your database:

```bash
# Copy environment file
cp .env.example .env
```

Edit `.env` with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Optional: Captcha (Turnstile)
CAPTCHA_SITEKEY=your_turnstile_sitekey
CAPTCHA_SECRET=your_turnstile_secret
```

### 2. Database Storage (Optional but Recommended)

The starter kit is **ready to use with flat files** out of the box. For improved performance and scalability, we recommend using database storage:

```bash
# Install Eloquent driver for database storage
composer require statamic/eloquent-driver

# Run Statamic migrations
php artisan migrate

# Import content configured for database storage
php artisan statamic:eloquent:import-assets
php artisan statamic:eloquent:import-blueprints
php artisan statamic:eloquent:import-collection-trees
php artisan statamic:eloquent:import-entries
php artisan statamic:eloquent:import-forms
php artisan statamic:eloquent:import-form-submissions
php artisan statamic:eloquent:import-global-sets
php artisan statamic:eloquent:import-navigation-trees
php artisan statamic:eloquent:import-taxonomies
php artisan statamic:eloquent:import-terms
php artisan statamic:eloquent:import-tokens
```

> **Note**: These commands import only content that is configured to use the Eloquent driver in `config/statamic/eloquent-driver.php`. Collections, navigations, and other items configured for file storage remain as files.

### 2.1. User Database Storage (Optional)

To store users in the database instead of files, the necessary configuration files (User model, auth config, users config) are already included. Follow the [Statamic guide for storing users in a database](https://statamic.dev/tips/storing-users-in-a-database) for details.

```bash
# Run additional migration for user storage
php artisan migrate

# The configuration files will be processed with the import command above
```

### 3. Frontend Setup

```bash
# Install dependencies
npm install

# Development with hot reload
npm run dev

# Production build
npm run build
```

### 4. Admin User

```bash
# Create your first admin user
php artisan statamic:user:create
```

## License

MIT License. Created by [mindtwo GmbH](https://www.mindtwo.de/).
