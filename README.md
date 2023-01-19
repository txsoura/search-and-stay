# search-and-stay

Search and Stay API

### Thing's i haven't done

- I didn't write tests;
- I didn't create a middleware to check user role in create, edit and delete book routes.


### Run the project

In the project, there's a makefile with some commands to help running the project. Use the sequence of commands bellow to run the project in.


##### Run in docker

`make run`

This command will create two docker services, as in docker-compose.yml:

- **mysql**: which will be available in http://localhost:3306

- **laravel.test**: which will be available in https://localhost:8000


##### Run in local

`make serve`

`php artisan serve` to run

The app will be available in  https://localhost:8000

