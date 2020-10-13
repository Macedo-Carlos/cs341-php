CREATE TABLE customers (
	id SERIAL NOT NULL PRIMARY KEY,
	customerName VARCHAR(50) NOT NULL,
    customerLastName VARCHAR(50) NOT NULL,
    customerAddress VARCHAR(50) NULL,
    customerCity VARCHAR(50) NULL,
    customerState VARCHAR(50) NULL,
    customerZip VARCHAR(50) NULL,
    customerPhone VARCHAR(50) NULL,
    customerEmail VARCHAR(50) NULL,
    customerNotes TEXT NULL
);

CREATE TABLE parts (
	id SERIAL NOT NULL PRIMARY KEY,
	partNumber VARCHAR(50) NOT NULL,
    partDescription VARCHAR(50) NOT NULL,
    partCost MONEY NULL,
    partPrice MONEY NULL
);

CREATE TABLE services (
	id SERIAL NOT NULL PRIMARY KEY,
	serviceNumber VARCHAR(50) NOT NULL,
    serviceDescription VARCHAR(50) NOT NULL,
    servicePrice MONEY NULL
);

CREATE TABLE employees (
	id SERIAL NOT NULL PRIMARY KEY,
	employeeName VARCHAR(50) NOT NULL,
    employeeLastName VARCHAR(50) NOT NULL,
	employeePassword VARCHAR(50) NOT NULL,
    employeeRole VARCHAR(50) NOT NULL
);

CREATE TABLE repairOrders (
	id SERIAL NOT NULL PRIMARY KEY,
	customerId INTEGER NOT NULL REFERENCES customers (id),
    repairNumber VARCHAR(50) NULL,
    repairItem VARCHAR(50) NULL,
    repairItemSn VARCHAR(50) NULL,
    repairIssue TEXT NULL,
    repairDiagnosisNotes TEXT NULL,
    repairType VARCHAR(50) NULL,
    repairStatus VARCHAR(50) NULL,
    repairPartsSo VARCHAR(50) NULL,
    repairSoOrWc VARCHAR(50) NULL,
    repairPartsUsed INTEGER NULL REFERENCES parts (id),
    repairLabor INTEGER NULL REFERENCES services (id),
    repairEmployeeAsigned INTEGER NOT NULL REFERENCES employees (id)
);

/* Table for scripture app */

CREATE TABLE scriptures (
	id SERIAL NOT NULL PRIMARY KEY,
	book VARCHAR(50) NOT NULL,
    chapter SMALLINT NOT NULL,
    verseFrom SMALLINT NULL,
    content VARCHAR NULL
);

INSERT INTO scriptures(book,chapter,verseFrom,content)
VALUES('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');