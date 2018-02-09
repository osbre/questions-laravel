## QUESTER ##

The quiz is a project built on the laravel. This is a game with questions in which you need to choose the right answer. There is also an admin panel for moderation. To participate in this quest, the user must register or log in.

# Installation

Clone the repository-
```
git clone https://github.com/Ostap34JS/Quizzes-laravel-php.git
```

Then cd into the folder with this command-
```
cd todo-laravel
```

Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `quests` and then do a database migration using this command-
```
php artisan migrate
```

Then change permission of storage folder using thins command-
```
(sudo) chmod 777 -R storage
```

At last generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.


Good use! :)
