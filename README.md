Users/CreateUser -> Have to create an account
sessions/session -> To login 

A session is created after logged in -> use token in a logged-in stage

Have to be logged in to be able to use Users/updateUser & Users/deleteUser ***
Have to be logged in to be able to use Producs/createProducts & updateProducts & Products/deleteProducts ****
Have to be logged in to be able to use Carts/addItemCart & Carts/showAllCartItems & Carts/deleteItemCart ****


INCLUDING sessionhelper to see if token expired or not, always updating the timw when it´s 30 min left on 

******ErrorCodes******

201 - Created
409 - Conflicts
202 - accepted
200 -  OK
404 - Not found
405 - method not found



DROP DATABASE IF EXISTS Ecommerce; CREATE DATABASE Ecommerce; DROP TABLE IF EXISTS cart; DROP DATABASE IF EXISTS products; DROP DATABASE IF EXISTS users; CREATE TABLE users(user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, user_name VARCHAR(50) NOT NULL, user_password VARCHAR(50) NOT NULL, user_email VARCHAR(100)) ENGINE = INNODB; CREATE TABLE products(product_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, product_name VARCHAR(50) NOT NULL, product_desc VARCHAR(500) NOT NULL, price INT) ENGINE = INNODB; CREATE TABLE cart(cart_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, product_id INT NOT NULL, CONSTRAINT FKproductsId FOREIGN KEY(product_id) REFERENCES products(product_id)) ENGINE = INNODB;











