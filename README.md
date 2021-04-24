# Installation Instruction

```
1. Clone The Repository
2. Run composer install
3. create database
4. copy .env.example to .env
5. Update database name & Database Credentails in .env file
6. run php artisan migrate
8. run php artisan db:seed
```

To Run Test:
```
php artisan test or ./vendor/bin/phpunit
```

# Routes

## Get User Info by Querystring
User id pass as a querystring and If User Id is Valid return  User Info And Comments to View else Show User not found with id:

**URL** : `/?id=1`

**Method** : `GET`

**Password required** : NO

**URL** http://laravelphptest.test/?id=1


## Get User Info By Routeparams
User id pass as a route parameter and and If user Id is valid return  user info and comments to view else show user not found with id:

**URL** : `/users/{id}`

**Method** : `GET`

**Password required** : NO

**URL** http://laravelphptest.test/users/1


## Create a Comment By Http Post Request

Create a comment of an user by http post request. Request data Can be Form Data or Json. If user id  is not valid Or 
comment not sent or password not match or not sent with request then system Throw an error;

**URL** : `/users/comments/`

**Method** : `POST`

**Password required** : Yes

**Data**

data format user id, comment, and password . All Fields Are Required

```json
{
    "id": "[integer]",
    "comments": "[text]",
    "password": "[string]",
}
```
**example**

```json
{
    "id": 1,
    "comments": "Comment 1",
    "password": "LChXAtEquJxmjByV",
}
```

## Create a Comment By console command
Create a comment of an user by console command. User id and comment is sent as a command parameter. password is not requires to create comment.

**COMMAND** : `php artisan comment:create id comment`

**Password required** : NO

**Data**

data format user id and comment.

```json
{
    "id": "[integer]",
    "comments": "[text]"
}
```

**example** php artisan comment:create 1 "Comment 1"