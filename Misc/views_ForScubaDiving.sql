<<admin user>>

name of the view: employeeInfo


CREATE VIEW employeeInfo AS
     SELECT 
		d.employeeID,d.position,d.Fname,d.Lname,d.salary,d.phonenumber,d.email,d.dateofbirth,
		c.postcode, c.street, c. housenumber, c.city,c.country
    FROM
        employee d, address c
		where 
        d.employeeID = c.addressID;
		
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
left join logins on clients.clientID = logins.loginID
left join address on clients.clientID = address.addressID
order by clientID;

-------------------------------------------------------------------------------------------------------------------------------------------------
name of the view : stock_Product_View

create view stock_Product_View as
select stocks.stockID, stocks.quantity,products.productID,products.productName, 
products.cost, products.productType,products.imageLink,products.description
from stocks
left join products on stocks.stockID = products.productID

-------------------------------------------------------------------------------------------------------------------------------------------------
name of the view : items_ordered_orders
select  items_ordered.itemID, items_ordered.quantity,items_ordered.itemCost,
 orders.orderID, orders.totalCost,orders.orderDate,orders.address,orders.restock
 from items_ordered
 left join orders on items_ordered.itemID = orders.orderID;

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
name of the view :adminDetailsFull   (proper name displaying )


create view adminDetailsFull as
 	select employee.employeeID , employee.position, employee.Fname as 'First Name', employee.Lname as 'Last Name',
     employee.salary, employee.phonenumber as 'Phone Number',employee.email,employee.dateofbirth as 'Date of Birth',
    address.postcode, address.street, address.housenumber as 'House number', address.city as 'City' , address.country as 'Country',
 	 logins.loginID as 'My ID', logins.username, logins.passwords
 	from employee 
 	left join address on employee.employeeID = address.addressID
	left join logins on address.addressID = logins.loginID
	 where username = 'admin';
======================================================================================================================================================




























