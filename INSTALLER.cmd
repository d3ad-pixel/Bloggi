@echo off
echo Installing Laravel Project...

:: Update Composer
::echo Updating Composer...
cd /d "%~dp0"
call composer update
:: pause >nul
call composer install
:: pause >nul

:: Create database and import the data

set /p username=Enter MySQL username:
:: set /p password=Enter MySQL password:

echo Creating database and importing the data...
mysql -u %username% -p -e "CREATE DATABASE IF NOT EXISTS laravelblog;"
mysql -u %username% -p laravelblog < ../laravelblog.sql

:: Copy .env.example and set application key
echo Copying .env.example and setting application key...
copy .env.example .env
php artisan key:generate

:: Migrate and seed the database
echo Migrating and seeding the database...
php artisan migrate

php artisan serve

echo Laravel Project installation completed.
pause
