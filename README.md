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
- **Tailwind CSS 4** with @tailwindcss/forms and @tailwindcss/typography
- **Alpine.js 3** for interactive components  
- **Vite 7** for modern asset building
- **Complete form system** with validation and responsive design

### Content Management
- **Eloquent Driver**: Database storage for better performance
- **Multilingual Setup**: German/English with proper SEO
- **Content Structure**: Pre-configured collections and blueprints
- **Navigation**: Dynamic menus and navigation trees
- **Forms**: Ready-to-use contact forms with CAPTCHA (Cloudflare Turnstile) support
- **Form Components**: Text, textarea, select, checkboxes, radio, toggle, files

## Dependencies

### Automatically Installed
- `statamic/cms` - Statamic CMS core
- `statamic/eloquent-driver` - Database storage
- `aryehraber/statamic-captcha` - Form protection
- `spatie/laravel-data` - Data Transfer Objects
- `laravel/envoy` - Deployment automation
- `laravel/boost` - Development tools
- `mindtwo/statamic-base` - This package (widgets & utilities)

### Optional
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
- Claude Code configuration (`.claude`, `CLAUDE.md`)
- Junie setup (`.junie`)
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

# Statamic Configuration
STATAMIC_LICENSE_KEY=your_license_key
STATAMIC_STACHE_WATCHER=true
STATAMIC_STATIC_CACHING_STRATEGY=null

# Optional: Captcha (Turnstile)
CAPTCHA_SITEKEY=your_turnstile_sitekey
CAPTCHA_SECRET=your_turnstile_secret
```

### 2. Database Migration (When Using Eloquent Driver)

```bash
# Run Statamic migrations for Eloquent driver
php artisan migrate

# Import starter content to database
php artisan statamic:eloquent:import-all
```

### 2.1. User Database Storage (Optional)

To store users in the database instead of files, follow the [Statamic guide for storing users in a database](https://statamic.dev/tips/storing-users-in-a-database). The necessary configuration files are already included in the `export/` directory.

```bash
# Additional migration for user storage
php artisan migrate

# Import user configuration
# Files in export/ directory will be automatically processed
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

## Project Structure

```
app/
├── DataTransferObjects/    # Spatie Data objects
└── View/Components/        # Blade components
content/                   # Collections & content
lang/                     # Translations (de/en)
resources/
├── blueprints/           # Content structure
├── fieldsets/            # Field configurations
├── views/                # Templates
├── css/                  # Stylesheets
└── js/                   # JavaScript
public/fonts/             # Typography assets
config/
├── captcha.php          # Captcha configuration
└── statamic/eloquent-driver.php  # Database config
```

## License

MIT License. Created by [mindtwo GmbH](https://www.mindtwo.de/).
