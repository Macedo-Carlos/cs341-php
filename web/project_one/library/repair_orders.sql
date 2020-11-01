CREATE TABLE customers (
	id SERIAL NOT NULL PRIMARY KEY,
	customerName VARCHAR(50) NOT NULL,
	customerLastName VARCHAR(50) NOT NULL,
    customerPhone VARCHAR(20) NOT NULL,
	customerAddress VARCHAR(500) NULL
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

/* Check ENUM possible values for rostatus
SELECT enum_range(NULL::rostatus);*/

/* Change possible values for rostatus 
ALTER TYPE rostatus ADD VALUE '0' BEFORE '1';*/

/* Enter customer information */
INSERT INTO customers(customername, customerlastname, customerphone, customeraddress)
VALUES ('Jim', 'Rague', '801-319-6547', '1254 W 1500 S, Ogden, UT 84401');

INSERT INTO customers(customername, customerlastname, customerphone, customeraddress)
VALUES ('Michael', 'Bismol', '801-520-6547', '1447 W 11400 S, South Jordan, UT 84095');

INSERT INTO customers(customername, customerlastname, customerphone, customeraddress)
VALUES ('Jerry', 'Rasmusen', '801-372-7514', '3551 S 5600 W, West Valley City, UT 84104');

INSERT INTO customers(customername, customerlastname, customerphone, customeraddress)
VALUES ('David', 'Bailey', '801-577-9846', '1446 S 7800 S, West Jordan, UT 84081');

/* Search for full name 
SELECT * FROM (SELECT id, customername, customerlastname,customerphone, customername || ' ' || customerlastname AS full_name FROM customers) t WHERE full_name ILIKE '%Mich%';

SELECT id, customername, customerlastname, customerphone, customeraddress, customername || ' ' || customerlastname AS full_name FROM customers;*/

/* Example of how to delete record*/
DELETE FROM customers WHERE id = 7;

/* Create Models */
INSERT INTO models(modelname, modeldescription, modelimage)
VALUES ('Fortrex', 'This motor has 112 lb of thrust, 48" shaft, foot pedal steer, auto pilot and bluetooth. This motor requires 36 V input (three battheries) and bow mount.', 'images/models/fortrex.jpg');

INSERT INTO models(modelname, modeldescription, modelimage)
VALUES ('Ulterra', 'This motor has 80 lb of thrust, 72" shaft, electric steer, self deploy, auto pilot and bluetooth. This motor requires 24 V input (two battheries) and bow mount.', 'images/models/ulterra.jpg');

/* Make corrections */

UPDATE models SET modeldescription = 'This motor has 80 lb of thrust, 72" shaft, electric steer, self deploy, auto pilot and bluetooth. This motor requires 24 V input (two battheries) and bow mount.' WHERE id = 5;

UPDATE models SET modeldescription = 'This motor has 112 lb of thrust, 48" shaft, foot pedal steer, auto pilot and bluetooth. This motor requires 36 V input (three battheries) and bow mount.' WHERE id = 4;

/* Create the services */

INSERT INTO services(servicename, servicedescription, serviceprice)
VALUES ('Water Damage Repair', 'Remove propeller, remove bottom housing front and rear cap, remove armature, dry all the parts and then test them, replace damaged parts, close the bottom assembly.', 125.00);

INSERT INTO services(servicename, servicedescription, serviceprice)
VALUES ('Steering Housing Replacement', 'Remove the control head, the motor/tube assembly, and the steering housing. Install a new steering housing. Then replace the motor tube assembly and the control head.', 180.00);

INSERT INTO services(servicename, servicedescription, serviceprice)
VALUES ('Armature Replacement', 'Remove propeller, remove bottom housing front and rear cap, remove armature, remove the brushes. Install the new brushes and armature. Then close the bottom assembly.', 125.00);

INSERT INTO services(servicename, servicedescription, serviceprice)
VALUES ('Main Control Board Replacement', 'Set the motor in deploy position. Remove the main control board cover. Disconnect the battery cable, steering housing, sonar, autopilot, and bottom housing cables. Remove the old main control board and install the new one. Connect the battery cable, steering housing, sonar, autopilot, and bottom housing cables to the new main control board. Then replace the main control board cover.', 145.00);

INSERT INTO services(servicename, servicedescription, serviceprice)
VALUES ('Control Head Replacement', 'Unscrew the bottom fasteners, and the retaining bolt. Disconnect the autopilot and bottom housing cables. Remove the control head and install the new one. Connect the autopilot and bottom housing cables. Replace the retaining bolt and bottom fasteners.', 45.00);