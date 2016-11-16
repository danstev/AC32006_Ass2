<<admin user>>

name of the view: employeeInfo


CREATE VIEW employeeInfo AS
     SELECT 
		d.employeeID,d.position,d.Fname,d.Lname,d.salary,d.phonenumber,d.email,d.dateofbirth,
		c.postcode, c.street, c. housenumber, c.city,c.country
    FROM
        employee d, address c
		where 
        d.addressID = c.addressID;
		
-------------------------------------------------------------------------------------------------------------------------------------------------
name of the view: br_ware_office

CREATE VIEW br_ware_office AS
SELECT 
branches.branchID,branches.Branch_name,branches.fl_staff,branches.managers, warehouse.warehouseID,warehouse.phoneNumber as 'warehouse phonenumber',
head_office.officeID,head_office.phonenumber as 'head office phone', head_office.email
FROM branches 
left join warehouse on branches.branchID = warehouse.branchID
left join head_office on branches.branchID = head_office.branchID
order by branchID;

-------------------------------------------------------------------------------------------------------------------------------------------------
name of the view : clientInfo

CREATE VIEW clientInfo AS
SELECT 
clients.clientID, clients.Fname, clients.Lname, clients.phonenumber, clients.email , clients.dateofbirth,
logins.loginID,logins.username, logins.passwords,
address.postcode,address.street, address.housenumber, address.city, address.country
FROM clients 
left join logins on clients.clientID = logins.clientID
left join address on clients.addressID = address.addressID
order by clientID;

-------------------------------------------------------------------------------------------------------------------------------------------------
name of the view : stock_Product_View   -- this view possible to use with branch manager is well

create view stock_Product_View as
select stocks.stockID, stocks.quantity,products.productID,products.productName, 
products.cost as 'Price' , products.productType as 'Type' ,products.imageLink,products.description
from stocks
left join products on stocks.productID = products.productID

-------------------------------------------------------------------------------------------------------------------------------------------------
name of the view : items_ordered_orders

create view items_ordered_orders as
select  items_ordered.itemID, items_ordered.quantity,items_ordered.itemCost,
 orders.orderID, orders.totalCost,orders.orderDate,orders.address,orders.restock
 from items_ordered
 left join orders on items_ordered.orderID = orders.orderID;

-------------------------------------------------------------------------------------------------------------------------------------------------
name of the view : checkSupplier

create view checkSupplier as select supplierID, nameOfSupplier, email, phoneNumber from supplier;
-----------------------------------------------------------------------------------------------------------------------------------------------
name of the view :adminDetails 
create view adminDetails as select address.postcode, address.street, address.housenumber, address.city, address.country,
logins.loginID, logins.username, logins.passwordsfrom address 
left join logins on address.addressID = logins.loginID 
where username = 'admin';

---------------------------------------------------------------------------------------------------------------------------------------------
name of the view :adminDetailsFull   (proper name displaying )  // possible to use for a branch manager


select employee.employeeID , employee.position, employee.Fname as 'First Name', employee.Lname as 'Last Name',
     employee.salary, employee.phonenumber as 'Phone Number',employee.email,employee.dateofbirth as 'Date of Birth',
    address.postcode, address.street, address.housenumber as 'House number', address.city as 'City' , address.country as 'Country',
 	 logins.loginID as 'My ID', logins.username, logins.passwords
 	from employee 
 	left join address on employee.addressID = address.addressID
	left join logins on employee.employeeID = logins.employeeID
	 where username = 'admin';
======================================================================================================================================================
<<BranchManager>> VIEWS

name of the view : Branch_addr_View


CREATE VIEW Branch_addr_View AS
SELECT 
branches.branchID as 'Branch ID', branches.Branch_name as 'Name Of The Branch', branches.fl_staff as 'Branch Staff',
branches.managers as 'Managers' , address.addressID, address.postcode, address.street, address.housenumber, address.city,
address.country
FROM branches 
left join address on branches.addressID = address.addressID
 order by branchID;

---------------------------------------------------------------------------------------------------------------------------------------------
name of the view : emp_login_branch   // changed this view, was wrong.. Now its displaying all info ebout employee who is curretly working and has logins in the system

	CREATE VIEW emp_login_branch AS
	select logins.loginID, logins.username, logins.passwords ,
    employee.employeeID , employee.position, employee.Fname as 'First Name', employee.Lname as 'Last Name',
    employee.salary, employee.phonenumber as 'Phone Number',employee.email,employee.dateofbirth as 'Date of Birth'
	from logins  
 	left join employee on logins.employeeID = employee.employeeID
    WHERE employee.employeeID IS NOT NULL
    order by logins.loginID;
--------------------------------------------------------------
name of the view : order_paym_detail_ordered // displaying info about how many orders was ordered and what card details was used 

create view order_paym_detail_ordered as
select  items_ordered.itemID, items_ordered.quantity, items_ordered.itemCost,
 orders.orderID, orders.totalCost, orders.orderDate, orders.address,
 payments_details.paymentId, payments_details.accName, payments_details.cardNumber, payments_details.expDate
 from items_ordered
 left join orders on items_ordered.orderID = orders.orderID
 left join payments_details on orders.orderID = payments_details.paymentId
 where payments_details.paymentId IS NOT NULL;

























