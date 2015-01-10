/*Donator Object*/
CREATE TABLE IF NOT EXISTS donator (
        id INTEGER PRIMARY KEY AUTOINCREMENT,

        name TEXT,
        phone TEXT,
        mail TEXT,
        address TEXT,
        description TEXT 
);

/*Bike Object*/
CREATE TABLE IF NOT EXISTS bike (
	id INTEGER PRIMARY KEY AUTOINCREMENT,

	name TEXT,
	number INT,
	donator INT,
	offer_date TEXT,
	pickup_date TEXT,
	description TEXT,
	icon TEXT,
	image TEXT,
	type TEXT,

	FOREIGN KEY(donator) REFERENCES donator(id)
);

/*Helper*/
CREATE TABLE IF NOT EXISTS helper (
        id INTEGER PRIMARY KEY AUTOINCREMENT,

        name TEXT,
        phone TEXT,
        mail TEXT 
);

/*Repair action*/
CREATE TABLE IF NOT EXISTS repair (
	id INTEGER PRIMARY KEY AUTOINCREMENT,

	helper INT,
	description TEXT,
	
	FOREIGN KEY(helper) REFERENCES helper(id)
);

/*Waiter*/
CREATE TABLE IF NOT EXISTS waiter (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	
	name TEXT,
	distributor INT,

	FOREIGN KEY(distributor) REFERENCES distributor(id)
);

/*Distributor*/
CREATE TABLE IF NOT EXISTS distributor (
	id INTEGER PRIMARY KEY AUTOINCREMENT,

	name TEXT,
	address TEXT,
	geoLong REAL,
	geoLat REAL,
	phone TEXT,
	mail TEXT,
	contact TEXT
);

/*Rental*/
CREATE TABLE IF NOT EXISTS rental (
	id INTEGER PRIMARY KEY AUTOINCREMENT,

	type INT, /*in or out*/
	waiter INT,
	bike INT,
	action_date TEXT,

	FOREIGN KEY(waiter) REFERENCES waiter(id),
	FOREIGN KEY(bike) REFERENCES bike(id)
);

/*Problem reporting*/
CREATE TABLE IF NOT EXISTS problem (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	
	type INT, /*int for problem type*/
	waiter INT,
	bike INT,
	appearance_date TEXT,
	solution_date TEXT,

	FOREIGN KEY(waiter) REFERENCES waiter(id),
        FOREIGN KEY(bike) REFERENCES bike(id)
);
