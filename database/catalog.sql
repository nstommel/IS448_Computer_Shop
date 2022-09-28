-- This is the products file
DROP TABLE items;

CREATE TABLE items (
    sku INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    name TEXT,
    brand TEXT,
    type TEXT,
    cost REAL,
    description TEXT
);

INSERT INTO items (name, brand, type, cost, description)
    VALUES ("XPS 13", "Dell", "Laptop", 1200.99, "A high-end computer.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Legion 7", "Lenovo", "Laptop", 1500.99, "A gaming computer.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Zenbook 13", "Asus", "Laptop", 1400.99, "An ultrabook computer.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Thinkpad X1", "Lenovo", "Laptop", 1800.99, "A reliable Thinkpad computer.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Latitude 5520", "Dell", "Laptop", 1700.99, "A business computer.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("TUF F17", "Asus", "Laptop", 1600.99, "A powerful gaming computer.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Elite Dragonfly", "HP", "Laptop", 1600.99, "A 2-in-1 business computer.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Galaxy ChromeBook", "Samsung", "Laptop", 800.99, "A high-end ChromeBook.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("M1 MacBook Pro", "Apple", "Laptop", 1500.00, "A luxurious MacBook.");


