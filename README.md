## Steps to run the project

```
git clone "https://github.com/kavya1234556/ems.git"
composer install
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=DepartmentSeeder
php artisan db:seed --class=EmployeeSeeder
npm i
npm run build
php artisan serve
```
