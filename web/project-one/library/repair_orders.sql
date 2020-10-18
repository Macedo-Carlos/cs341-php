CREATE TABLE customers (
	id SERIAL NOT NULL PRIMARY KEY,
	customerName VARCHAR(50) NOT NULL,
	customerLastName VARCHAR(50) NOT NULL,
    customerPhone VARCHAR(20) NOT NULL
);

CREATE TABLE services (
	id SERIAL NOT NULL PRIMARY KEY,
	serviceName VARCHAR(50) NOT NULL,
	serviceDescription TEXT NULL,
    servicePrice DECIMAL(10,2) NOT NULL
);

CREATE TABLE models (
	id SERIAL NOT NULL PRIMARY KEY,
	modelName VARCHAR(50) NOT NULL,
	modelDescription TEXT NULL,
    modelImage TEXT
);

/*CREATE TYPE roStatus AS ENUM ('1', '2', '3', '4');

CREATE TYPE roType AS ENUM ('1', '2');*/

CREATE TABLE repairOrders (
	id SERIAL NOT NULL PRIMARY KEY,
    roNumber INT NOT NULL,
    roDate DATE NOT NULL,
	customer_id INTEGER NOT NULL REFERENCES customers (id),
	model_id INTEGER NOT NULL REFERENCES models (id),
    roModelSN VARCHAR(20) NOT NULL,
    roProblem TEXT NOT NULL,
    roDiagnosisNotes TEXT NULL,
    service_id INTEGER NULL REFERENCES services (id),
	current_roStatus roStatus,
    current_roTye roType
);

