-- This is the products file
DROP TABLE items;
DROP TABLE brands;

CREATE TABLE brands (
    brand TEXT PRIMARY KEY,
    description TEXT
);

CREATE TABLE items (
    sku INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    name TEXT,
    brand TEXT,
    type TEXT,
    cost REAL,
    description TEXT,
    FOREIGN KEY (brand) REFERENCES brands(brand)
);

INSERT INTO brands (brand, description)
    VALUES ("Apple", "Supercharged by M1 and M2 chips, the MacBook Pro & Air series are user-friendly and powerful.");
INSERT INTO brands (brand, description)
    VALUES ("Dell", "Laptop computers and 2-in-1 PCs for home & business that can be customized to your liking.");
INSERT INTO brands (brand, description)
    VALUES ("Lenovo", "The best PCs, with superb keyboards, solid productivity, high performance and battery life.");
INSERT INTO brands (brand, description)
    VALUES ("HP", "Provides fast, powerful, easily operable computers for consumers to unleash their creativity on projects.");
INSERT INTO brands (brand, description)
    VALUES ("Samsung", "Stylish computers offering ample battery life with plenty of power for everyday use.");
INSERT INTO brands (brand, description)
    VALUES ("Asus", "The best laptops for unrivalled mobility and high-quality gaming, featuring excellent displays.");

INSERT INTO items (name, brand, type, cost, description)
    VALUES ("XPS 13", "Dell", "Laptop", 1200.99, "A high-end computer. The all-new XPS 13 laptop is meticulously constructed with machined aluminum and a carbon fiber palm rest, and features a stunning 16:10 4-sided InfinityEdge display. ");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Legion 7", "Lenovo", "Laptop", 1500.99, "A gaming computer. Experience gaming like never before on the Legion 7 gaming laptop powered by AMD Ryzen 7 5800 H-Series processors. Play and stream the latest AAA titles at peak performance on the Legion 7 with NVIDIA GeForce RTX 3070 GPUs deliver the ultimate performance for gamers and creators.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Zenbook 13", "Asus", "Laptop", 1400.99, "An ultrabook computer. The beautiful new ZenBook 13 OLED brings you visuals like you’ve never experienced before. It’s also more portable than ever, weighing only 2.51lb with a 13.9 mm-thin profile. Built to deliver powerful performance and true-to-life visuals, ZenBook 13 OLED is your perfect choice for an effortless on-the-go lifestyle.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Thinkpad X1", "Lenovo", "Laptop", 1800.99, "A reliable Thinkpad computer. With the Latest 10th Generation Intel Core i7-10510U Processor (1.80 GHz, up to 4.90 GHz with Turbo Boost, 4 Cores, 8 Threads, 8 MB Cache), the ThinkPad X1 Carbon Gen 8 is faster than ever no matter the task. The ultimate in lightweight productivity, the ThinkPad X1 Carbon (Gen 8) combines a best-in-class keyboard with a stunning screen and strong endurance.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Latitude 5520", "Dell", "Laptop", 1700.99, "A business computer. Take business on the go with the 15.6 inch Latitude 5520 Laptop from Dell. Power through your workload with a 2.6 GHz 11th Gen Intel Core i5 4-core vPro processor and 16GB of RAM. Keep important files close at hand, thanks to a 256GB SSD.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("TUF F17", "Asus", "Laptop", 1600.99, "A powerful gaming computer. ASUS TUF Gaming F17 is a powerful Windows 11 gaming laptop that combines gaming performance with up to a narrow bezel IPS-type panel and an extended lifespan, thanks to its patented Anti-Dust Cooling (ADC) system. Equipped with NVIDIA GeForce graphics, multi-core AMD Ryzen 5000 series processor, and solid-state storage, the F17 is able to play the latest games and multitask with ease.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Elite Dragonfly", "HP", "Laptop", 1600.99, "A 2-in-1 business computer. Mobile business professionals no longer have to choose between portability and performance, thanks to the HP 13.3 inch Elite Dragonfly G2 Multi-Touch 2-in-1 Laptop. Its iridescent Dragonfly Blue magnesium body weighs just 2.18 pounds, making it easy to travel with.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("Galaxy ChromeBook", "Samsung", "Laptop", 800.99, "A high-end ChromeBook. A high-definition 4K AMOLED display provides incredible clarity. With 100% Adobe RGB and 100% DCI-P3 support, you can edit videos to a professional standard. View in a rich range of colors, with true-to-life colors and black hues. Its ultra-slim 3.9mm bezel let you immerse yourself in visual splendor. It features a solid full-aluminum body with a thickness of 9,9 mm.");
INSERT INTO items (name, brand, type, cost, description)
    VALUES ("M1 MacBook Pro", "Apple", "Laptop", 1500.00, "A luxurious MacBook. The system features the Apple M1 Pro 8-Core Chip, which provides the power and performance needed to handle your professional workflows. The 14.2 inch Liquid Retina XDR display features a 3024 x 1964 resolution, 1,000 nits of sustained brightness, 1,600 nits of peak brightness, P3 color gamut support, and more.");


