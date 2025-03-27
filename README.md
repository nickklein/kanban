# kanban
Kanban boards to help you plan with projects or life.

## Installation

To add this package to your Laravel project, update your `composer.json` by adding one of the following repository configurations:

### Using Live Repository
```sh
composer config repositories.0 '{"type": "vcs", "url": "https://github.com/nickklein/kanban"}'
```

### Using Local Path
For local development, use:
```sh
composer config repositories.0 '{"type": "path", "url": "../kanban", "options": {"symlink": true}}'
```
or where ever your local project lives

### Install the Package
```sh
composer require nickklein/kanban
```

## Setup
1. php artisan vendor:publish to publish the config files to your laravel install
2. Run the migrations:
   ```sh
   php artisan migrate
   php artisan db:seed
   php artisan run:kanban-seeder
   ```

3. First check the install.sh to make sure it's symlinking to the correct laravel framework directory, then run the installation script to create a symlink for JSX files:
   ```sh
   ./install.sh dev or bash install.sh dev
   ```
   ```sh
   ./install.sh build or bash install.sh build
   ```
This will link the `kanban` JSX files to your core Laravel project. The JSX files make some assumptions about your laravel install, such as that you're using regular JSX, and that you have a the authentication layout react component installed through laravel breeze.
