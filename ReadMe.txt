I used php 7.1
and laravel 5.4
https://laravel.com/docs/5.4/passport

clone the repository
move to laravel-api/laravel54 folder
run composer update
set up database paramerters to any mysql database on your server
run migration
run php artisan passport:install
run php artisan migrate --seed
now it suppose to be okay
I let this url out of authentication to test easly
laravel-api/laravel54/public/index.php/api/report
the other urls you have to go to them through frontend apllication

now move to laravel-api/front 
and run npm install
go to the database -  the table (oauth_clients)
and take the secret code from second raw
and update client_secret in front/src/components/authentication/login.vue with it
also update Vue.http.options.root in front/src/main.js with the url to laravel54/public/index.php on your server
run npm install --global vue-cli
run vue init webpack
run npm run dev
now you can take any email from users table from database
and login with password secret
and enjoy testing the code.
and if you get any error contact me please

