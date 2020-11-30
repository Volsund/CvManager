

# CvManager

## Project preview
<img src="https://media.giphy.com/media/wUDW5DJl8GD9frkUiC/giphy.gif" width="800">

## Description

CV manager for creating and editing Cvs.

User can view, create, edit and delete CVs from database. Home page has listed all CVs currently in database. 

## Project setup

Copy .env.example file to .env on the root folder.

Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

```
npm install

composer install

php artisan key:generate

php artisan migrate

php artisan serve
```

## ToDo Improvements
- More sections should be added to CV (achievements, etc..)
- Controller should be refactored to minimize duplicate code in edit/create.
- Adding tests.


