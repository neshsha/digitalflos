Instructions

1. Download project from Github
2. Extract zip file, open terminal and navigate to extracted folder
3. Run <b>composer update</b>
4. Open project in some code editor and change name of the file <b>.env.example</b> to <b>.env</b> 
5. Open phpMyadmin, create new database <b>digitalflos</b> with collation <b>utf8mb4_unicode_ci</b>
6. Get back to the terminal and run command <b>php artisan key:generate</b>
7. Run <b>php artisan migrate</b>
8. Run <b>composer dump-autoload</b>
9. Run <b>php artisan db:seed --class=UserSeeder</b>
10. Run <b>php artisan serve</b>
11. Open Your browser and project will be available on the next URL: <b>http://127.0.0.1:8000/</b>

Hopefully You will like it :)

Best regards
