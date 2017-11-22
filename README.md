# PHP__Laravel_Vue
A small demostration using Larvael and Vue.js

## Dependencies
- axios: for asynchronous HTTP request.
- moment.js: for manipulating times
- Moment Timezone: for parsing and displaying timezone data
- Summernote: provides WYSIWYG editor for writing blog post
- Vue Router: for creating a single-page application

## Functionalities
- Account management
- Blog

## Run the app
- If you don't have a .env file at the root folder, just copy the .env.example file to .env, and change the database information that match to your database server.
- Older version of MySQL server may encounter error on migrating database, if so, please edit the AppServiceProvider.php located at /app/Providers/AppServiceProvider.php, and add this line to the boot() function:
```public function boot()
{
    Schema::defaultStringLength(191);
}
```
- Then create the table in your MySQL server by typing:
    > php artisan migrate
- At the root folder, install the dependencies by typing:
    > npm install
- then, start the server by typing:
    > php artisan serve
- At your browser, visit this URL:
    > http://127.0.0.1:8000
