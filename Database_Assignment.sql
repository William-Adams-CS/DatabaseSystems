DROP DATABASE IF EXISTS `Coral-Cove-Database`;

CREATE DATABASE `Coral-Cove-Database`;

USE `Coral-Cove-Database`;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `CUSTOMERS`;

CREATE TABLE `CUSTOMERS` (
    `CustomerID` INT NOT NULL,
    `FirstName` VARCHAR(50),
    `LastName` VARCHAR(50),
    `Email` VARCHAR(100),
    `Phone` VARCHAR(15),
    `Address` VARCHAR(255),
    `City` VARCHAR(100),
    `PostalCode` VARCHAR(20)
	PRIMARY KEY (`CustomerID`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `CUSTOMERS` WRITE;

INSERT INTO `CUSTOMERS` (`CustomerID`,`FirstName`,`LastName`,`Email`,`Phone`,`Address`,`City`,`PostalCode`)
VALUES
	();
	

UNLOCK TABLES;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `ORDERS`;

CREATE TABLE `ORDERS` (
    `OrderID` INT NOT NULL,
	`CustomerID` INT NOT NULL,
	`StaffID` INT NOT NULL,
    `OrderDate` DATE,
	`TotalAmount` DECIMAL(10,2),
	PRIMARY KEY (`OrderID`),
	FOREIGN KEY (`CustomerID`) REFERENCES `CUSTOMERS` (`CustomerID`),
	FOREIGN KEY (`StaffID`) REFERENCES `STAFF` (`StaffID`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ORDERS` WRITE;

INSERT INTO `ORDERS` (`OrderID`,`CustomerID`,`StaffID`,`OrderDate`,`TotalAmount`)
VALUES
	();
	

UNLOCK TABLES;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `STAFF`;

CREATE TABLE `STAFF` (
    `StaffID` INT NOT NULL,
	`FirstName` VARCHAR(50),
	`LastName` VARCHAR(50),
	`Email` VARCHAR(100),
	`Phone` VARCHAR(15),
	`Address` VARCHAR(255),
	`City` VARCHAR(100),
	`PostalCode` VARCHAR(20),
	`Position` VARCHAR(50) NOT NULL,
	`Salary` DECIMAL(10,2),
	`BranchID` INT,
	PRIMARY KEY (`StaffID`),
	FOREIGN KEY (`BranchID`) REFERENCES `BRANCH` (`BranchID`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `STAFF` WRITE;

INSERT INTO `STAFF` (`StaffID`,`FirstName`,`LastName`,`Email`,`Phone`,`Address`,`City`,`PostalCode`,`Position`,`Salary`,`BranchID`)
VALUES
	();
	

UNLOCK TABLES;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `ORDERITEM`;

CREATE TABLE `ORDERITEM` (
    `OrderItemID` INT NOT NULL,
	`OrderID` INT,
	`ProductID` INT,
	`Quantity` INT,
	`UnitPrice` DECIMAL(10,2),
	PRIMARY KEY (`OrderItemID`),
	FOREIGN KEY (`OrderID`) REFERENCES `ORDERS` (`OrderID`),
	FOREIGN KEY (`ProductID`) REFERENCES `PRODUCT` (`ProductID`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ORDERITEM` WRITE;

INSERT INTO `ORDERITEM` (`OrderItemID`,`OrderID`,`ProductID`,`Quantity`,`UnitPrice`)
VALUES
	();
	

UNLOCK TABLES;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `PRODUCT`;

CREATE TABLE `PRODUCT` (
    `ProductID` INT NOT NULL,
	`ProductName` VARCHAR(100),
	`Category` VARCHAR(50),
	`Price` DECIMAL(10,2),
	PRIMARY KEY (`ProductID`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `PRODUCT` WRITE;

INSERT INTO `PRODUCT` (`ProductID`,`ProductName`,`Category`,`Price`)
VALUES
	();
	

UNLOCK TABLES;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `BRANCH`;

CREATE TABLE `BRANCH` (
    `BranchID` INT NOT NULL,
	`StaffID` INT,
	`BranchName` VARCHAR(100),
	`Location` VARCHAR(255),
	PRIMARY KEY (`BranchID`),
	FOREIGN KEY (`StaffID`) REFERENCES `STAFF` (`ManagerID`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `BRANCH` WRITE;

INSERT INTO `BRANCH` (`BranchID`,`StaffID`,`BranchName`,`Location`)
VALUES
	();
	

UNLOCK TABLES;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `STOCK`;

CREATE TABLE `STOCK` (
    `StockID` INT NOT NULL,
	`ProductID` INT,
	`LocationID` INT,
	`StockQuantity` INT,
	PRIMARY KEY (`StockID`),
	FOREIGN KEY (`ProductID`) REFERENCES `PRODUCT` (`ProductID`),
	FOREIGN KEY (`LocationID`) REFERENCES `BRANCH` (`LocationID`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `STOCK` WRITE;

INSERT INTO `STOCK` (`StockID`,`ProductID`,`LocationID`,`StockQuantity`)
VALUES
	();
	

UNLOCK TABLES;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `SUPPLIER`;

CREATE TABLE `SUPPLIER` (
    `SupplierID` INT NOT NULL,
	`SupplierName` VARCHAR(100),
	`ContactPerson` VARCHAR(100),
	`Email` VARCHAR(100),
	`Phone` VARCHAR(15),
	`Address` VARCHAR(255),
	`City` VARCHAR(100),
	`PostalCode` VARCHAR(20),
	PRIMARY KEY (`SupplierID`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `SUPPLIER` WRITE;

INSERT INTO `SUPPLIER` (`SupplierID`,`SupplierName`,`ContactPerson`,`Email`,`Phone`,`Address`,`City`,`PostalCode`)
VALUES
	();
	

UNLOCK TABLES;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `SUPPLIERITEM`;

CREATE TABLE `SUPPLIERITEM` (
    `SupplierItemID` INT NOT NULL,
	`SupplierID` INT,
	`ProductID` INT,
	`Cost` DECIMAL(10,2),
	PRIMARY KEY (`SupplierItemID`),
	FOREIGN KEY (`SupplierID`) REFERENCES `SUPPLIER` (`SupplierID`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `SUPPLIERITEM` WRITE;

INSERT INTO `SUPPLIERITEM` (`SupplierItemID`,`SupplierID`,`ProductID`,`Cost`,`StockQuantity`)
VALUES
	();
	

UNLOCK TABLES;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `DELIVERY`;

CREATE TABLE `DELIVERY` (
    `DeliveryID` INT NOT NULL,
	`OrderID` INT,
	`DeliveryDate` DATETIME,
	`DeliveryStatus` VARCHAR(50),
	PRIMARY KEY (`SupplierItemID`),
	FOREIGN KEY (`OrderID`) REFERENCES `ORDER` (`CustomerOrderNumber`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `DELIVERY` WRITE;

INSERT INTO `DELIVERY` (`DeliveryID`,`OrderID`,`DeliveryDate`,`DeliveryStatus`)
VALUES
	();
	

UNLOCK TABLES;


-- ------------------------------------------------------------


DROP TABLE IF EXISTS `DELIVERYORDERS`;

CREATE TABLE `DELIVERYORDERS` (
    `DeliveryOrderID` INT NOT NULL,
	`DeliveryID` INT,
	`OrderID` INT,
	PRIMARY KEY (`SupplierItemID`),
	FOREIGN KEY (`DeliveryID`) REFERENCES `DELIVER` (`DeliveryID`),
	FOREIGN KEY (`OrderID`) REFERENCES `ORDERS` (`OrderID`)
)	ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `DELIVERYORDERS` WRITE;

INSERT INTO `DELIVERYORDERS` (`DeliveryOrderID`,`DeliveryID`,`OrderID`)
VALUES
	();
	

UNLOCK TABLES;