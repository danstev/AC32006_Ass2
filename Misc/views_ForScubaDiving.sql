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
