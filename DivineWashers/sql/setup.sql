DROP DATABASE IF EXISTS divinewashers;

CREATE DATABASE divinewashers;

USE divinewashers;

CREATE TABLE Costumer (
    clienteID INT AUTO_INCREMENT PRIMARY KEY,
    clienteFirstName VARCHAR(255),
    clienteLastName VARCHAR(255),
    clienteEmail VARCHAR(255),
    password VARCHAR(255),
    address VARCHAR(255),
    street VARCHAR(255),
    city VARCHAR(255),
    state VARCHAR(255),
    zipCode VARCHAR(255),
    phoneNum VARCHAR(255),
    paymentMethod VARCHAR(255)
);


CREATE TABLE Administrator (
    admiID INT AUTO_INCREMENT PRIMARY KEY,
    admiFirstName VARCHAR(255),
    admiLastName VARCHAR(255),
    admiEmail VARCHAR(255),
    admiPassword VARCHAR(255)
);


CREATE TABLE Order (
    orderID INT AUTO_INCREMENT PRIMARY KEY,
    orderNum VARCHAR(255),
    oderDate VARCHAR(255),
    action VARCHAR(255),
    shipDate VARCHAR(255),
    price INT
);


CREATE TABLE Product (
    productID INT AUTO_INCREMENT PRIMARY KEY,
    prodName VARCHAR(255),
    prodDesc VARCHAR(255),
    prodCategory VARCHAR(255),
    prodType VARCHAR(255),
    prodImage,
    prodPrice INT,
    prodQuantity INT
);