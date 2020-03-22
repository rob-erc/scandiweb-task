# Scandiweb Junior Developer Test

![](scandiweb-app-test.gif)

Instructions for testing:

Note: Application requires that a mysql database has been set up, and that Composer has been installed.

1. Run this command to install packages required by the project -
```
composer install
```

2. In the database create a table with name - "products".

Table requires columns:
  - id (primary key)
  - sku (varchar)
  - name (varchar)
  - price (double)
  - special_attribute (varchar)
  - attribute_type (varchar)
  - created_at (datetime)
  
3. In file config/database.php change the array values to your mysql info.

4. Run this command to start php`s built in web server
```
php -S localhost:8000
```

5. Now the application is running. You can access the product page by typing 
```
localhost:8000/products
```
in the browser. At first there wont be any products, so you can add some by going to 
```
localhost:8000/new
```
