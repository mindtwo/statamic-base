# PROJECT NAME

[![mindtwo GmbH](https://www.mindtwo.de/downloads/doodles/github/repository-header.png)](https://www.mindtwo.de/)
## Project Domain Overview

| Local                                | Staging                                            | Production                         |
|:-------------------------------------|:---------------------------------------------------|:-----------------------------------|
| [example.test](http://example.test/) | [example.mindtwo.dev](https://example.mindtwo.dev) | [example.com](https://example.com) |

### Basic Authentication
Basic Authentication is used for all environments. The credentials are as follows:

User: `demo`
Pass: `demo`

## Server Requirements
This project has a few system requirements. Of course, all of these requirements are satisfied by most of the modern hosting providers.

However, you will need to make sure your server or environment meets the following requirements:
- [Server Requirements: Laravel](https://laravel.com/docs/master/deployment#server-requirements)
- Local Development Recommendation: Laravel Herd

### Further application dependency docs

- [Laravel](https://laravel.com/docs)
- [Statamic CMS](https://statamic.dev/docs)
- [Tailwind CSS](https://tailwindcss.com)
- [Alpine.js](https://alpinejs.dev)
- [Vite](https://vitejs.dev)

## Multilingual Setup
This project supports three languages:
- **English (Default)**: Primary language, available at root domain
- **German**: Available at `/de/` path

## How To Install
This project utilizes [Composer](https://getcomposer.org/) & [NPM](https://www.npmjs.com/) to manage its dependencies. So, before using this project, make sure you have Composer & NPM installed on your machine or server.

Clone this repository into your machine or server:

```bash
cd ~/Sites
git clone https://github.com/mindtwo/REPOSITORY_NAME ./REPOSITORY_NAME
```

After that, install the project by typing the following command inside the cloned directory:

```bash
composer install
npm install
```

### 1. Webserver Setup

* Add the above ([Project Domain Overview](#project-domain-overview)) listed domain/domains to your host file.
* The `/public` directory inside the root directory of your project is the entry point for the webserver. The corresponding document root should be pointing to this folder.

### 2. Environment Variables
It is often helpful to have different configuration values based on the environment where the project is running. For example, you may wish to use a different database driver locally than you do on your production server.

To make this a cinch, this project utilizes the [DotEnv](https://github.com/vlucas/phpdotenv) PHP library by Vance Lucas. In a fresh installation, the root directory of your application will contain a `.env.example` file. You should copy the existing file manually to `.env` and enter your environment specific configuration and credentials.

Your .env file should not be committed to your projects's source control, since each developer / server using your application could require a different environment configuration. Furthermore, this would be a security risk in the event an intruder gains access to your source control repository, since any sensitive credentials would get exposed.

```bash
cp .env.example .env
```

**Note:** Any variable in your `.env` file can be overridden by external environment variables such as server-level or system-level environment variables.

### 3. Database
* Create a database on your machine or server and add the credentials to the `.env` file.
* Import the dump if exists or start from scratch.

#### Starting from scratch
If you want to start from scratch, you can create a super user with the following command:

```bash
php please make:user
```

You will be asked for a username, email and password.

### 4. Assets
Compiled assets are not committed to the project's source control. You have to compile the assets once to avoid missing css and js files.

```bash
npm run dev
```

### 5. Application Key
Generate an application encryption key:

```bash
php artisan key:generate
```

### 6. Statamic
Install Statamic and create the initial configuration:

```bash
php artisan statamic:install
```

## Development
For development, you can use Laravel's built-in development server along with Vite for asset compilation:

```bash
# Start all development services (server, queue, logs, vite)
composer run dev

# Or run individually:
php artisan serve
npm run dev
```

## Testing
Run the test suite:

```bash
composer run test
# or
php artisan test
```

## Code Quality
This project uses Laravel Pint for code formatting:

```bash
vendor/bin/pint
```

## Deployment
@TODO: Add deployment instructions for production

The deployment process for this project is automated for the `Staging` environment. Here's how it works:

- **Automatic Deployment to Staging Environment:**
    - Any changes pushed to the `staging` branch are automatically deployed to the `Staging` environment. This ensures that the latest version of the code is always available for testing and development purposes.

This setup streamlines the deployment process, reducing the need for manual intervention and allowing for continuous integration and delivery practices.

## Project Information

**Client:** CLIENT_NAME  
**Developer:** mindtwo GmbH  
**Technology Stack:** Laravel 12, Statamic CMS 5, Tailwind CSS 4, Alpine.js 3  
**Features:** Multilingual (DE/EN/NL), Contact Forms, SEO Optimized, Performance Optimized

[![Back to the top](https://www.mindtwo.de/downloads/doodles/github/repository-footer.png)](#)
