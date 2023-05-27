-- Active: 1685081291382@@127.0.0.1@3306@store
CREATE TABLE users(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    username VARCHAR(255),
    password VARCHAR(255) COMMENT 'hashed password',
    role int COMMENT '0=admin, 1=normal'
) COMMENT 'store users';
