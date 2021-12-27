# Processing large set of data using Queue in Lumen

### Problem Statment

- Fetch the data from the following URL - &quot;http://data.gov.in/sites/default/files/all_india_pin_code.csv&quot; and save it in MySql.
- Create a migration file to create the table.
- Create an GET API for to fetch data from DB with pagination. Display the data in a simple UI.
- Use Laravel Lumen framework for creating the said APIs.


### Demo Video:
https://res.cloudinary.com/armashfankar/video/upload/v1640595339/Armash/screencast-nimbus-capture-2021.12.27-14_04_45.webm

### Prerequisites

Here's a basic setup:

* Apache2
* PHP 7 - All the code has been tested against PHP 7.4
* Lumen (8.3.4) (Laravel Components ^8.0)
* Mysql (5.x), running locally
* Composer 2.x

### Other Dependencies

In order to process such large data (150000+) we might need to increase the memory limit of PHP:

* Increase "memory_limit" of PHP from 128M to 512M
* Please edit php.ini file and increase "memory_limit".
* Path: 
    ```shell script
    vim /etc/php/7.4/apache2/php.ini
    ```
* Restart Apache2
    ```shell script
    sudo service apache2 restart
    ```


### Execution

1. Clone the repository:
    ```shell script
    git clone https://github.com/armashfankar/processing-large-data-using-lumen

    ```

2. Install the requirements for the repository using the `composer`:
   ```shell script
    cd processing-large-data-using-lumen/
    composer install
    
    ```

3. Copy `.env.example` to create `.env` file:
    ```shell script
    cp .env.example .env
    
    ```

4. Configure Database & Queue Drive in `.env` file:
    
    1. Database
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=all_india_pincode
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    
    2. Queue
    ```    
    QUEUE_CONNECTION=database
    ```

5. Create MySQL Database:
     ```shell script
    mysql -u root -p
    create database all_india_pincode;
    
    ```

6. Migrate database:
    ```shell script
    php artisan migrate
    ```   

7. Run Lumen in terminal:
    ```shell script
    php -S localhost:8000 -t public
    ``` 

8. Run Queue in another terminal: 
    ```shell script
    php artisan queue:work --queue=default,insertQueue --timeout=0
    ```
    ###### Note: --timeout=0 is an optional parameter. In case queue is getting killed after 60 seconds then
    ###### pass "--timeout=0" to disable timeout limit.



9. Open browser:
    http://localhost:8000

### Work Flow / Steps:

* After opening "http://localhost:8000" you can see a button on top "Load Pincode Data".
* Please click on that button.
* After clicking the button it will send a post request where the "DownloadPincodeDataJob" will be called and get scheduled in the queue.
* You can see it in the terminal in which queue is running.
* This will take significant amount of time to process and insert all csv records in the "jobs" table
* Once all data is inserted in the jobs table, InsertAddressJob will start executing inserting records in the "addressess" table.
* Once queue processing is completed you can refresh the page (http://localhost:8000) and see all the records in the table.