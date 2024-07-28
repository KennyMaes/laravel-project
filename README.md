# Laravel project
## Running project
Before you begin, make sure to copy the .env.example file and rename it to .env. 

For testing purposes, you can use the default settings, as the database created will match the settings needed to connect this application with the database set up by Docker Compose.

## Commands
Create database: `docker compose`
Setup dummy data: `npm run setup`
Start application: `npm run start`

## General
This is a Laravel project. 
Visitors can view the FAQ and news articles without creating an account. 

However, if you want to add comments to an article, you need to log in or create an account. 

As an admin, you can promote regular users to admin status, as well as create, update, or delete news articles and FAQ categories and questions.


## Dummy Data

By default, when you run the dummy setup command as described above, the following will be created as dummy data:

### Users
#### Regular User:
- **Name:** `user`
- **Username:** `User`
- **Email:** `user@ehb.be`
- **Password:** `User!321`

#### Admin User:
- **Name:** `admin`
- **Username:** `admin`
- **Email:** `admin@ehb.be`
- **Password:** `Password!321`

#### 2 news articles linked to the admin as author

### FAQ
#### Categories
- Media
- Printer

#### Questions and answers
- 2 questions under `Media`
- 1 question under `Printers`
