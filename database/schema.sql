CREATE DATABASE logistics_manager CHARACTER SET utf8mb4;
USE logistics_manager;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    address VARCHAR(200) NOT NULL
);

CREATE TABLE carriers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE freights (
    id INT AUTO_INCREMENT PRIMARY KEY,
    carrier_id INT NOT NULL,
    origin_id INT NOT NULL,
    destination_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (carrier_id) REFERENCES carriers (id),
    FOREIGN KEY (origin_id) REFERENCES addresses (id),
    FOREIGN KEY (destination_id) REFERENCES addresses (id)
);

CREATE TABLE freight_products (
    freight_id INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (freight_id) REFERENCES freights (id),
    FOREIGN KEY (product_id) REFERENCES products (id)
);
