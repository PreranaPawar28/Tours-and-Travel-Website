CREATE TABLE registration(
id INT NOT NULL AUTO_INCREMENT,
fullname VARCHAR(20),
username VARCHAR(20),
mobileno VARCHAR(10),
email VARCHAR(30),
password VARCHAR(20),
cpassword VARCHAR(20),
PRIMARY KEY (id)
);

CREATE TABLE adminlogin(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(20),
username VARCHAR(20),
email VARCHAR(30),
password VARCHAR(20),
location VARCHAR(20),
PRIMARY KEY (id)
);

INSERT INTO `adminlogin`(id, name, username, email, password, location) VALUES ('1', 'Prerana', 'Peru', 'peru@gmail.com', 'peru@123', 'dombivli');

CREATE TABLE newsletter(
id INT NOT NULL AUTO_INCREMENT,
email VARCHAR(30),
PRIMARY KEY (id)
);

CREATE TABLE contactus(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(20),
email VARCHAR(30),
mobileno VARCHAR(10),
subject VARCHAR(30),
message VARCHAR(300),
PRIMARY KEY (id)
);

CREATE TABLE packages(
id INT NOT NULL AUTO_INCREMENT,
title VARCHAR(255),
description VARCHAR(500),
facilities VARCHAR(500),
location VARCHAR(30),
adultprice INT(255),
childprice INT(255),
image VARCHAR(255),
image1 VARCHAR(255),
image2 VARCHAR(255),
image3 VARCHAR(255),
image4 VARCHAR(255),
PRIMARY KEY (id)
);

INSERT INTO `packages` (`id`, `title`, `description`, `facilities`, `location`, `adultprice`, `childprice`, `image`, `image1`, `image2`, `image3`, `image4`) VALUES
(1, 'Taj Mahal: The crown of the Palace', 'Widely considered to be one of the most beautiful buildings in the world and certainly one of India’s most famous landmarks, the Taj Mahal is a living testament to the grandiose and the romantic. Lovingly built from white marble by Mughal Emperor Shah Jah', 'Private Air-conditioned Car.\r\nProfessional English Speaking Guide in Agra.\r\nProfessional Driver.Pick-up & Drop Off Assistance.\r\nLive Tour Guide Service.\r\nMineral Water Bottle.All Tolls, Taxes & Parkings.', 'Agra', '2000', '500', 'upload\\taj.jpeg', 'upload\\taj1.jpeg', 'upload\\taj2.jpeg', 'upload\\taj3.jpg', 'upload\\taj4.jpeg'),
(2, 'The Statue of Unity', 'The Statue of Unity is the world\'s tallest statue, with a height of 182 metres (597 feet),  located near Kevadia in the state of Gujarat, India. It depicts Indian statesman and independence activist Vallabhbhai Patel (1875–1950), who was the first deputy ', '2X2 A/C Pushback Coach (As per Group Size)\r\nStatue of Unity Ticket\r\nTicket of - Viewing Gallery & Jungle Safari\r\nBreakfast, Lunch & Dinner (Buffet Menu)\r\nMineral Water bottle 5 Nos. (200ml)\r\nValley of Flowers, Art Gallery\r\nSardar Sarover Dam View Site\r\nSouvenir Shop, Laser Show\r\nGujrati Tour Guide', 'Gujarat', '3500', '1500', 'upload\\unity.jpg', 'upload\\unity1.jpg', 'upload\\unity2.png', 'upload\\unity3.jpg', 'upload\\unity4.jpg'),
(3, 'Golden Temple', 'The Golden temple is located in the holy city of the Sikhs, Amritsar. The Golden temple is famous for its full golden dome, it is one of the most sacred pilgrim spots for Sikhs. The Mandir is built on a 67-ft square of marble and is a two storied structure.', 'To and Fro economy class air ticket (Ex-Mumbai) with current airport taxes.\r\nBaggage Allowance as per the airline policy.\r\nAccommodation in comfortable hotels on twin/triple/Single sharing basis.\r\nAll Meals – Morning tea/coffee, breakfast, lunch, evening tea/coffee with cookies/snacks, dinner and Water Bottle (1 Litre) per person per day', 'Amritsar', '2500', '1000', 'upload\\golden.jpg', 'upload\\golden1.jpg', 'upload\\golden2.jpeg', 'upload\\golden3.jpg', 'upload\\golden4.jpg'),
(4, 'The Red Fort', 'The Red Fort Complex was built as the palace fort of Shahjahanabad – the new capital of the fifth Mughal Emperor of India, Shah Jahan. Named for its massive enclosing walls of red sandstone, it is adjacent to an older fort, the Salimgarh, built by Islam Shah Suri in 1546, with which it forms the Red Fort Complex.', 'Hotel pickup and drop-off, \r\nTransport by air-conditioned private vehicle, \r\nProfessional English-speaking guide', 'Delhi', '2200', '700', 'upload\\fort.jpg', 'upload\\fort1.jpg', 'upload\\fort2.jpg', 'upload\\fort3.jpg', 'upload\\fort4.jpg'),
(5, 'Jal Mahal', 'Jal Mahal (meaning \"Water Palace\") is a palace in the middle of the Man Sagar Lake in Jaipur city, the capital of the state of Rajasthan, India. The palace was originally constructed in 1699; the building and the lake around it were later renovated and enlarged in the 18th century by Maharaja Jai Singh II of Amber.', 'All taxes, fees and handling charges, \r\nFuel surcharge, \r\nAfternoon tea, \r\nBottled water, Driver Allowances ( Food & Accommodation), Hotel / Airport Pickup/drop-off in Jaipur', 'Jaipur', '3500', '1800', 'upload\\jal.jpg', 'upload\\jal1.jpg', 'upload\\jal2.jpg', 'upload\\jal3.jpg', 'upload\\jal4.jpeg'),
(6, 'Goa Pearl of the Orient', 'It is located about 250 miles (400 km) south of Mumbai (Bombay). One of India\'s smallest states, it is bounded by the states of Maharashtra on the north and Karnataka on the east and south and by the Arabian Sea on the west. The capital is Panaji (Panjim), on the north-central coast of the mainland district.', 'Transfers from Airport to Hotel to Airport, \r\nMeals as per hotel plan, \r\nAccommodation on twin sharing basis\r\nHalf day sightseeing - South Goa.', 'Goa', '2500', '2000', 'upload\\goa.jpg', 'upload\\goa1.jpeg', 'upload\\goa2.jpeg', 'upload\\goa3.jpeg', 'upload\\goa4.jpeg'),
(7, 'Mysore: City of Palaces', 'Mysore Palace, also known as Amba Vilas Palace, is a historical palace and a royal residence. It is located in Mysore, Karnataka. It used to be the official residence of the Wadiyar dynasty and the seat of the Kingdom of Mysore.', 'Breakfast, Transfers, Accommodation, Sightseeing at mentioned places, Fuel, Toll, Parking, Driver allowance, All applicable taxes, Service charges, Private cab transfer', 'Mysore', '4000', '2000', 'upload\\palace.jpg', 'upload\\palace1.jpeg', 'upload\\palace2.jpeg', 'upload\\palace3.jpeg', 'upload\\palace4.jpeg'),
(8, 'Kumarakom Lake Resort', 'None less than National Geographic Traveler has claimed Kerala as one of the must-see paradises of the world.\r\nFor administrative reasons, Kerala is divided into fourteen districts, each boasting its own unique bouquet of tourism products. Kumarakom, and Kumarakom Lake Resort, are in the district of Kottayam.', 'Free parking, \r\nWifi, \r\nPool, \r\nFitness Centre with Gym / Workout Room, \r\nFree breakfast, \r\nBicycle tours, \r\nEntertainment staff, \r\nBabysitting, \r\nTransfers from Airport to Hotel to Airport, \r\nMeals as per hotel plan.', 'Kumarakom', '3200', '2000', 'upload\\lake.jpg', 'upload\\lake1.jpg', 'upload\\lake2.jpg', 'upload\\lake3.jpeg', 'upload\\lake4.jpg');

CREATE TABLE feedback(
id INT NOT NULL AUTO_INCREMENT,
title VARCHAR(255),
email VARCHAR(30),
description VARCHAR(500),
PRIMARY KEY (id)
);

CREATE TABLE customer_booking(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(30),
username VARCHAR(30),
email VARCHAR(30),
mobile VARCHAR(10),
packagesname VARCHAR(255),
accommodation VARCHAR(100),
checkin DATE NOT NULL,
adults VARCHAR(10),
childs VARCHAR(10),
price VARCHAR(30),
transaction VARCHAR(30),
transactionSS VARCHAR(300),
status VARCHAR(100),
PRIMARY KEY (id)
);