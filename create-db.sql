CREATE DATABASE store DEFAULT CHARACTER SET = 'utf8mb4';

use store;

CREATE TABLE products(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description VARCHAR(255),
    image VARCHAR(255),
    price DECIMAL,
    stock INT UNSIGNED
) COMMENT 'produse';