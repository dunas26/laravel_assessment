# How to execute the EatDB laravel assessment project

This is a step by step on how to execute this project.


We offer two ways to do so
- Using PHP ~ 7.4
- Using Docker and Docker Compose (recommended)

## Using PHP ~ 7.4

**Note:** This project requires PHP version 7. Any other version is untested.
Please use php version 7.4 if needed.

### Project configuration

Before executing the project, we need to setup a database with credentials matching our ENV file.

In this case, a MySQL instance.
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=eatdb
DB_USERNAME=eatclient
DB_PASSWORD=1234
```

Once that is done, we run the migrations like so

```
php artisan migrate
```

Then we seed the database with fake testing data.

```
php artisan db:seed
```

Finally, to execute this project using php run
```
cd eatdb/
php artisan serve
```

This will set up our application in our [localhost:8000](http://localhost:8000) environment.

## Using Docker and Docker Compose (recommended)

To execute this project using docker and docker compose you first need to install docker from the [ official website ](https://docs.docker.com/get-docker/).


For this project, I used Docker 20.10.22 build 3a2c30b.

Once you have docker on your system, you need to clone this project using git to do so, from a terminal or from a Git GUI Client.

## Cloning the project

To clone this project simply execute this git command.
```
git clone https://github.com/dunas26/laravel_assessment.git
```

This will download the project with the following project structure.

```
├── docker-compose.yml
├── eatdb
│   ├── (project files)
├── exercise_2
│   └── (exercise 2 commented file)
└── README.md
```

## Building with Docker Compose

Go into the project folder and execute the following docker compose command
```
docker compose up --build
```

With this command, docker will start building our test environment along with our database configuration.

If you need to restart the docker process from scratch, I recommend you using
```
docker compose down -v
```

This will get rid of all the volume information as well. This is crucial to reset all the database setup data that might be causing troubles.

## Running the migrations

Once the docker compose command has finished setting up the development environment for our application. We proceed by running the laravel project migrations with the following command.

```
docker exec eatdb-web-1 php artisan migrate
```

## Seeding the database with testing data

Once that is done, we populate the testing data using the following command as well.

```
docker exec eatdb-web-1 php artisan db:seed
```

Now, we are ready to test the application by going to our [localhost:8000](http://localhost:8000) environment.

Thank you very much
