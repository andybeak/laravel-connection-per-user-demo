# Demo of Laravel database connection per privilege level

This is a sample of a [Laravel](https://laravel.com/) project that uses a separate database connection for users with admin privileges.  

This pattern lets you limit the database privileges that your application has while running as a non-privileged user.

If a hacker is able to subvert your program then they will still be limited by the privileges of the restricted database user that your application uses to connect to the database.

## Example usage

Run the project and visit `http://localhost:8000/login_normal_user`.  This logs you in as a standard user who is not intended to be able to read from the transactions table.

Visit `http://localhost:8000/demo_page` and see that a SQL error is generated.  This happens because the standard user connects to the database with a MySQL user that does not have permission to read the table.

Now visit `http://localhost:8000/login_admin_user` to log in as an administrator user and again visit `http://localhost:8000/demo_page`.  You should see a list of transactions.

  

## Running the project
  
To run the app, use the following commands:

Bring the stack up

    cd docker
    docker-compose up -d
    
Create two users in the database
    
    docker exec -it mysql /bin/bash
    sh /root/set_database_permissions.sh
    exit
    
Run the application migrations and seed the database
    
    docker exec -it php /bin/bash
    composer install
    php artisan migrate
    php artisan db:seed
    exit

Set permissions on the storage directory
    
    sudo chmod 777 ../src/storage -R 
        
        
Note that it may take several minutes for it to build when you run it for the first time.
