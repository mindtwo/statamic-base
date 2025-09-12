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
- **Commands**: Useful Artisan commands for development
- **Base Components**: Reusable PHP classes and utilities

### Frontend Stack
- **Tailwind CSS 4** with @tailwindcss/forms and @tailwindcss/typography
- **Alpine.js 3** for interactive components  
- **Vite 7** for modern asset building
- **Complete form system** with validation and responsive design

### Content Management
- **Eloquent Driver**: Database storage for better performance
- **Multilingual Setup**: German/English with proper SEO
- **Content Structure**: Pre-configured collections and blueprints
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

### Eloquent Storage
- Collections entries, forms, assets, globals, navigation trees, taxonomies → Database
- Users, blueprints, configurations → Files

### Multilingual
- German (`de`) as primary language
- English (`en`) as secondary language
- Language switcher with hreflang SEO tags

### Development Tools
- Claude Code configuration (`.claude`, `CLAUDE.md`)
- Junie setup (`.junie`)
- Laravel Boost integration
- Envoy deployment scripts

## Usage

After installation:

```bash
# Setup environment
cp .env.example .env
# Configure database settings

# Run migrations
php artisan migrate

# Install frontend dependencies
npm install

# Development
npm run dev

# Production
npm run build
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