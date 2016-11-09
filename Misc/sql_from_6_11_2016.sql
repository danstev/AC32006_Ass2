-- ALTER TABLE clients
--  add column addressID int(11),
 -- ADD FOREIGN KEY (addressID)
 --  REFERENCES address(addressID);

--  ALTER TABLE employee
 -- add column addressID int(11),
-- ADD FOREIGN KEY (addressID)
--  REFERENCES address(addressID); 
 
--  ALTER TABLE orders
 --  add column clientID int(11),
 -- ADD FOREIGN KEY (clientID)
 --  REFERENCES clients(clientID);
 
-- 	 ALTER TABLE payments_details
-- 	add column clientID int(11),
-- 	ADD FOREIGN KEY (clientID)
 -- 	REFERENCES clients(clientID);
    
 --   ALTER TABLE financial_transactions
-- 	add column orderID int(11),
-- 	ADD FOREIGN KEY (orderID)
-- 	REFERENCES orders(orderID);

-- ALTER TABLE help_tickets
-- 	add column orderID int(11),
-- ADD FOREIGN KEY (orderID)
-- REFERENCES orders(orderID);

-- select * from logins;

 -- CREATE TABLE help_tickets(ticketID int primary key, solved bit, complaint varchar(250), date_opened datetime, date_closed datetime); 


 -- ALTER TABLE courier
-- add column orderID int(11),
--  ADD FOREIGN KEY (orderID)
-- REFERENCES orders(orderID);

-- ALTER TABLE items_ordered
-- add column orderID int(11),
-- ADD FOREIGN KEY (orderID)
-- REFERENCES orders(orderID);

 -- ALTER TABLE warehouse
 -- add column branchID int(11),
 --  ADD FOREIGN KEY (branchID)
 -- REFERENCES branches(branchID);
 
--  ALTER TABLE financial_transactions
 -- add column clientID int(11),
--  ADD FOREIGN KEY (clientID)
--  REFERENCES clients(clientID);
 
-- ALTER TABLE orders
--  add column warehouseID int(11),
-- ADD FOREIGN KEY (warehouseID) 
-- REFERENCES warehouse(warehouseID);
 
-- ALTER TABLE items_ordered
--  add column productID int(11),
--  ADD FOREIGN KEY (productID)
--  REFERENCES products(productID);

 -- ALTER TABLE branches
--   add column addressID int(11),
 -- ADD FOREIGN KEY (addressID)
 -- REFERENCES address(addressID);

 -- ALTER TABLE head_office
 -- add column branchID int(11),
 -- ADD FOREIGN KEY (branchID)
 -- REFERENCES branches(branchID);
 
 -- ALTER TABLE stocks
-- add column productID int(11),
--  ADD FOREIGN KEY (productID)
-- REFERENCES products(productID);

 -- create table stocks (stockID integer primary key, quantity int(11));
 
-- ALTER TABLE stocks
-- add column warehouseID int(11),
-- ADD FOREIGN KEY (warehouseID)
-- REFERENCES warehouse(warehouseID);

-- ALTER TABLE employee
--  add column branchID int(11),
--   ADD FOREIGN KEY (branchID)
--  REFERENCES branches(branchID); 
 -- select * from clients;

 -- CREATE TABLE logins(loginID int primary key, username varchar(50),passwords varchar (250)); 
 
-- ALTER TABLE logins
 -- add column clientID int(11),
 --  ADD FOREIGN KEY (clientID)
 --  REFERENCES clients(clientID); 
   
--   ALTER TABLE logins
 -- add column clientID int(11),
 --  ADD FOREIGN KEY (employeeID)
 --  REFERENCES employee(employeeID); 
   
 -- ALTER TABLE products
 -- add column description text;
 --  ADD FOREIGN KEY (supplierID)
 --  REFERENCES supplier(supplierID); 
-- select * from clients;
-- select * from clients;

--  SELECT * from clients;

-- show tables;

-- select * from clients;
-- SELECT column1 FROM table1 WHERE EXISTS ( SELECT column1 FROM table2 WHERE table1.column1 = table2.column1 );

-- INSERT INTO employee VALUES ('1','Admin','Igors','Bogdanovs','44000','07867546781','ibogdanov@hotmail.com','1983-06-03','1','1');
-- INSERT INTO address VALUES ('','DD1 2DF','Blabla','2','Dundee','Scotland');
-- INSERT INTO branches VALUES ('','0','1');

--  insert into address (addressID, postcode, street, housenumber, city, country) values ('3','DD3 7HG','Bumba street','2','Dundee','Scotland');

-- select * from address;
 
-- select * from branches;
-- insert into branches (branchID, fl_staff, managers,addressID) values ('1','100','10','1');

-- SELECT a.postcode,a.street,a.housenumber,a.city,a.country ,b.fl_staff, b.managers
-- FROM address a, branches b
-- WHERE 
--  a.addressID = b.branchID ;

-- ALTER TABLE branches
-- ADD COLUMN Branch_Name VARCHAR(15) AFTER branchID;

-- UPDATE branches 
-- SET 
--    Branch_Name = 'Scuba Dundee.LTD'
-- WHERE
--    branchID = 1;

-- UPDATE address 
-- SET 
 --    postcode = 'GL1 TR6',
 --    street = 'blablabla street',
 --    housenumber = '56' ,
 --    city = 'Glasgow'
--  WHERE
--    addressID = 2;
   
 --   UPDATE address 
-- SET 
  --  postcode = 'DD3 7HG',
   -- street = 'Bumba street',
  --  housenumber = '2' ,
 --   city = 'Dundee'
-- WHERE
--   addressID = 1;
   
 --   UPDATE address 
-- SET 
 --   postcode = 'LO2 ND3',
  --  street = 'London street',
  --  housenumber = '34' ,
  --  city = 'London'
-- WHERE
 --  addressID = 3;

-- insert into branches (branchID, fl_staff, managers,addressID) values ('2','50','5','2');

 -- insert into branches (branchID, fl_staff, managers,addressID) values ('3','300','30','3');

-- mysql> SELECT address.*, branches.* FROM address, branches WHERE t1.addressID = t2.branchID;

--  http://www.dofactory.com/sql/join



--  SELECT a.addressID, a.postcode,a.street,a.housenumber,a.city,a.country , b.branchID , b.fl_staff, b.managers
--  FROM address a, branches b
--  WHERE 
 --  a.addressID = b.branchID ;
 
 -- insert into employee (employeeID, position, Fname, Lname, salary, phonenumber, email, addressID, branchID ) 
 --  values ('1','CEO','Scuba','Chef','100000','07867896530','scuba@gmail.com','1','1');

 -- insert into employee (employeeID, position, Fname, Lname, salary, phonenumber, email, dateofbirth, addressID, branchID ) 
 --  values 	('2','Customer Support','Fedor','Fedorov','22000','07878596530','sgibson1@nba.com','1976-08-14','1','1'),
	--  	 	('3','Customer Support','Shirley','Gibson','22600','01315349674','nyoung2@bloglines.com','1981-10-27','1','1'),
       --       ('4','Customer Support','Nicholas','Young','22700','01317263857','jgordon3@hud.gov','1967-11-29','1','1'),
       --       ('5','Customer Support','Jeffrey','Gordon','22300','01312100800','jreid4@patch.com','1979-12-27','2','2'),
       --      ('6','Customer Support','Jeremy','Reid','22060','07970376422','cfields5@networksolutions.com','1999-06-13','2','2'),
       --     ('7','Customer Support','Christine','Fields','22900','02348596530','msullivan6@twitter.com','1995-06-21','3','3'),
        --    ('8','Customer Support','Mildred','Sullivan','24000','01378596530','rhall7@photobucket.com','1981-01-23','3','3');
       
-- select * from employee;
            
   








