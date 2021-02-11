# Laravel Challenge Products Management

The idea behind this project was a challenge to make product system management.  

# Context

## User

- user can be register or log in if he is already a member.
- all actions required to be authentified.

## Product

- user can Create, Delete, Update or Remove(crud) a Product.
- user can search for a product by his name.
- user can filter product by category
- product belongs to the category (relation)


## Category

- user can Create, Delete, Update or Remove(crud) a Category.
- category has many products (relation)


## Features

### CLI
We are able to create product and category by cmd

create product: php artisan product:add name description price image category_id
delete product: php artisan product:delete id

create category: php artisan category:add name parent_category
delete category: php artisan category:delete id

### Web
We are able to (crud) product and category

## Testing
Product creation covered by automated tests

## Technologies
- Laravel
- PHP/MYSQL
