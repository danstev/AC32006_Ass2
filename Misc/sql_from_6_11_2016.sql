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
 --   insert into employee (employeeID, position, Fname, Lname, salary, phonenumber, email, dateofbirth, addressID, branchID ) 
 --  values 	-- ('2','Customer Support','Fedor','Fedorov','22000','07878596530','sgibson1@nba.com','1976-08-14','1','1'),
	  	 	-- ('3','Customer Support','Shirley','Gibson','22600','01315349674','nyoung2@bloglines.com','1981-10-27','1','1'),
           --    ('4','Customer Support','Nicholas','Young','22700','01317263857','jgordon3@hud.gov','1967-11-29','1','1'),
           --    ('5','Customer Support','Jeffrey','Gordon','22300','01312100800','jreid4@patch.com','1979-12-27','2','2'),
           --  ('6','Customer Support','Jeremy','Reid','22060','07970376422','cfields5@networksolutions.com','1999-06-13','2','2'),
         --  ('7','Customer Support','Christine','Fields','22900','02348596530','msullivan6@twitter.com','1995-06-21','3','3'),
        --    ('8','Customer Support','Mildred','Sullivan','24000','01378596530','rhall7@photobucket.com','1981-01-23','3','3'),
            
 -- 	('9', 'IT','Roger', 'Hall','33000', '55892116434', 'rhall7@photobucket.com','1981-01-23','1','1'),
--   ('10', 'IT', 'Mark', 'Palmer','33000', '55896846434', 'mpalmer8@1688.com', '1996-02-29','1','1'),
 -- 	('11','IT', 'Martha', 'Woods','33000', '55456116434', 'mwoods9@51.la','1967-03-11', '1', '1'),
 -- 	('12','IT', 'Keith', 'Collins','33000', '01392116434', 'kcollinsa@wiley.com', '1990-06-20','1' ,'1'),
 -- 	('13', 'IT','Frances', 'Gonzalez','33000','15392116434', 'fgonzalezb@smugmug.com','1979-04-21','1','1');
 
--  ('14','IT', 'Lillian', 'Carroll','33000', '01392116434', 'lcarrollc@archive.org', '1977-02-11','2','2'),
--  ('15', 'IT','Gary', 'Harrison','33000', '01392118654', 'gharrisond@ted.com', '1968-02-26','2','2'),
--   ('16','IT', 'Anne', 'Johnston','33000', '01392178954', 'ajohnstone@51.la','1985-07-24','2','2'),
--  ('17','IT', 'Shawn', 'Foster', '33000','01392116789', 'sfosterf@usa.gov','1993-09-02','2','2'),
-- ('18','IT', 'Terry', 'Garrett','33000', '01392121454', 'tgarrettg@t.co','1984-03-27','2','2'),
-- ('19','IT', 'Linda', 'Richardson','33000','01398906434', 'lrichardsonh@ted.com','1995-04-07','3','3'),
-- ('20','IT', 'Sharon', 'Boyd','33000','01392119765', 'sboydi@slideshare.net','1990-03-26','3','3'),
-- ('21','IT', 'Adam', 'Carter','33000','01392119876', 'acarterj@phoca.cz','1980-07-08','3','3'),
-- ('22','IT', 'Lisa', 'Stevens','33000', '01392765434', 'lstevensk@fotki.com','1994-02-17','3','3'),
-- ('23','IT', 'Brandon', 'Davis','33000', '01398746434', 'bdavisl@theglobeandmail.com','1990-07-02','3','3');

-- ('24','Accountant','Linda', 'Allen','45000', '01398785632', 'lallenn@lulu.com', '1988-05-22','1','1');

-- 	('25','Manager', 'Harry', 'Robinson','55000', '07874567530', 'hrobinsono@businessinsider.com', '1967-03-04','1','1'),
-- 	('26','Manager', 'Doris', 'Rogers','55000', '12958596530', 'drogersp@simplemachines.org','1991-03-09','1','1'),
-- 	('27','Manager', 'Roger', 'Kim','55000', '08728596530', 'rkimq@theatlantic.com','1999-10-27','2','2'),
-- 	('28','Manager', 'Katherine', 'Knight','55000', '01288596530', 'kknightr@netscape.com','1990-03-03','2','2'),
-- 	('29','Manager', 'Philip', 'Ray', '55000','07898476530', 'prays@sbwire.com','1966-04-12','3','3'),
-- 	('30', 'Manager','Joshua', 'Martinez','55000', '07878897630', 'jmartinezt@comcast.net','1982-12-22','3','3');
-- 	('31', 'Administation','Kevin', 'Arnold','60000', '08967397630', 'karnold2d@newyorker.com','1988-03-31','1','1');

-- select * from address;

-- select * from employee;

-- (done)insert into address (addressID, postcode, street, housenumber, city, country) values ('4','DD3 5TY', 'Colorado', '06', 'Dundee', 'Scotland');
-- 	insert into address (addressID, postcode, street, housenumber, city, country) 
 --    values 	-- ('5', 'FTR 7RT', 'Pennsylvania', '82', 'London', 'England');
		 	-- ('6', 'THR YUR', 'Coolidge', '4841', 'Dundee', 'Scotland');
		-- 	('7', 'RT5 IT6', 'Reinke', '78623','Dundee', 'Scotland'),
		 -- 	('8', 'DD3 78A', 'Paget', '3', 'London', 'England'),
		 -- 	('9', 'TR3 UYT', 'Carpenter', '56', 'London', 'England'),
		 -- 	('10', 'RT3 TY5', 'Southridge', '7', 'London', 'England'),
          --    ('11', 'TR1 TR6', 'Ruskin', '7', 'London', 'England');
		--  	('12', 'SE3 YT6', 'Michigan', '223', 'London', 'England'),
		--  	('13', 'ED4 5TH', 'Mesta', '998', 'London', 'England'),
		--  	('14','UY6 8YT', 'Atwood', '859', 'London', 'England'),
		--  	('15','JU7 IU8', 'Doe Crossing','45', 'London', 'England'),
		--  	('16','HG6 IU6', '1st', '7208', 'London', 'England'),
		 -- 	('17', 'YH6 7TY', '5th', '379', 'Glasgow', 'Scotland'),
		 -- 	('18','HB6 OI8', 'Clemons', '10', 'Glasgow', 'Scotland'),
		-- 	('19', 'KJ7 BG7', 'Doe Crossing', '40715','Glasgow', 'Scotland'),
		--  	('20', 'UI9 YH5', 'Meadow Valley', '665','Glasgow', 'Scotland'),
		 --  	('21', 'DD4 78B', 'Rockefeller', '3545', 'Dundee', 'Scotland'),
		-- 	('22', 'RT5 67Y', 'Sherman', '75',  'Dundee', 'Scotland');
		-- 	('23','RT5 87Y', 'Summer Ridge', '9', 'Dundee', 'Scotland'),
		 -- 	('24',' D4G 7HB', 'Memorial', '468',  'Dundee', 'Scotland'),
		 --  	('25', 'GL4 67T', 'Independence', '8', 'Glasgow', 'Scotland'),
		--  	('26', 'GL3 67P', 'Eagle Crest', '24',  'Glasgow', 'Scotland'),
		 -- 	('27','DD1 1GT', 'Lien', '31369',  'Dundee', 'Scotland'),
		 -- 	('28','G12 67Y', 'Kingsford', '44',  'Glasgow', 'Scotland'),
		 -- 	('29', 'HG6 UI8', 'Eastwood', '736',  'Dundee', 'Scotland'),
		 -- 	('30','GL1 5RT', 'Golden Leaf', '73', 'Glasgow', 'Scotland'),
		 -- 	('31', 'TY1 76G', 'American', '30966',  'Dundee', 'Scotland'),
		 -- 	('32', 'TY6 89T', 'Kensington', '26859',  'Dundee', 'Scotland'),
		 -- 	('33', 'T6Y UI8' , 'Arrowood', '0',  'Dundee', 'Scotland'),
		 -- 	('34', 'FR5 T67', 'Bandi    
   








