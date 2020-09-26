<p align="center">
 <img src="https://i.ibb.co/5T8HdZM/3321081392-01b3a9fc-ca70-4741-9134-e442d23a1ee8.png" />
</p>

# Artic
 
 > Artic, the perfect place to post your article. 
 
## Overview
It works. Take a look.

<p align="center">
 <img src="https://github.com/mochenski/artic/blob/master/guest.gif?raw=true" width="50%"/>
</p>

<p align="center">
 <img src="https://github.com/mochenski/artic/blob/master/dashboard.gif?raw=true" width="50%"/>
</p>

Just create your profile and post an article.

### Features
1. New, Hot and All articles sections
2. Dashborad to manage articles
3. Login system

## Technologies
Artic was created in order to understand the relation between a Rest API and a frontend webpage. To acheive this, two different frameworks, **Laravel** and **Nuxt.js**, were used.

<p align="center">
<img src="https://miro.medium.com/max/700/1*ApAxz9e9GBaNsIhBXa4w4Q.png" width="30%"/>
</p>

[**Laravel**](https://laravel.com/ "Laravel - The PHP Framework") - The PHP framework used to create Artic's Rest API.

[**Nuxt.js**](https://nuxtjs.org/ "The intuitive Vue Framework") - The Vue framework used to create Artic's webpage.

## Install & Run

### Front-end - You will need node.js

**`front-end/`** 
```bash
$ yarn install # install nuxt.js dependencies
$ yarn run dev
```

### Back-end - You will need composer
**`back-end/`** 
```bash
$ composer install                          # install laravel dependencies
$ php artisan passport:install              # install passport dependencies
$ php artisan passport:client --personal    # create passport keys
$ php artisan migrate:fresh --seed          # migrate database
$ php artisan serve
```
OBS: make sure to configure your databese at **`back-end/.env.example`** and rename to **`back-end/.env`** 

## License
This project is under the MIT license.

## README Inspired by
[Laura Beatris](https://github.com/LauraBeatris)

# Dashboard using Laravel and Nuxt.js

This project was created to study the basics of a Dashboard. I will try to make the code simple and easy to understand.

The idea is to achieve some of the following items.

 - [x] ![Progress](https://progress-bar.dev/100/) Project Setup using Laravel as back-end and Nuxt as front-end 
 - [x] ![Progress](https://progress-bar.dev/100/) Auth using Laravel passport
 - [x] ![Progress](https://progress-bar.dev/100/) Login and SignUp - Nuxt
 - [x] ![Progress](https://progress-bar.dev/100/) Articles backend "CRUD" - Laravel
 - [ ] ![Progress](https://progress-bar.dev/85/) Articles frontend (index, articles, article, dashboard)
 - [ ] ![Progress](https://progress-bar.dev/70/) Blog functionality (Nuxt blog) and (Laravel relationships)

