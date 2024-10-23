CREATE TABLE employee (
    staff_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (50),
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    department VARCHAR (50),
    position TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE product (
    stock_id INT AUTO_INCREMENT PRIMARY KEY,
    item_type VARCHAR (50),
    item_name TEXT,
    staff_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);