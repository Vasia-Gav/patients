Docs
--------
The API is implemented using Symfony 3.4
 
 Requirements
 --------------
 PostgreSQL 
 PHP 7.1
 Apache/NginX
 
 If you are using Apache make sure your root directory is project_root/web 
 .htaccess will handle the rest
 
 If you are using NginX,
 remember that entry point file is called app.php or app_dev.php depending on environment.
 

Deployment
--------------
git clone git@github.com:Vasia-Gav/patients.git
composer install
cp app/config/parameters.yml.dist  app/config/parameters.yml (from project root)
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load


Examples
----------
List of all patients: patients.dev/api/patients
Group by name: patients.dev/api/patients?groups[name]=Ittri
Search by string: patients.dev/api/patients?query=*otto*