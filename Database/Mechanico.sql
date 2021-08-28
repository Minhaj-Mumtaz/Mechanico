create database mechanico

use mechanico


----------CREATE TABLE

create table admin(
adminId int not null,
adminName varchar(25),
adminPass varchar(20)
)

create table Mechanic(
id int not null,
Name varchar(25) not null,
TitleOfJob varchar(50),
Boss int,
Salary money,
HireDate date,
)

create table Customer(
NIC_ID int not null,
Name varchar(25)not null
)

create table Automobile(
PlateNumber varchar(6) not null,
Name varchar(50),
CusId int
)

create table job(
id int not null,
Work varchar(50),
CostOfWork money,
DaysRequired int
)

create table Garage(
Car_Arrival_Date date not null,
AutomobileID varchar(6),
JobId int,
MechanicId int,
PartID int,
LocID int
)

create table vendor(
id int not null,
Name varchar(25),
PhoneNumber varchar(12),
LocId int
)

create table Location(
id int not null,
Province varchar(25),
City varchar(25),
)

create table PartsShop(
id int not null,
Name varchar(50),
CostOfProduct money,
InStock int,
VendorId int
)

---------Alter Table


----------PRIMARY KEY


alter table admin
add constraint ad_pk
primary key (adminId);

alter table Mechanic
add constraint Mech_pk
primary key (id);

alter table Customer
add constraint Cus_pk
primary key (NIC_id);

alter table Automobile
add constraint Aut_pk
primary key (PlateNumber);

alter table job
add constraint jobpk
primary key (id)

alter table Vendor
add constraint vepk
primary key (id)

alter table Location
add constraint locpk
primary key (id)

alter table PartsShop
add constraint ptspk
primary key (id)

---------FOREIGN KEY

alter table Mechanic
add constraint bossfk
foreign key (boss)
references Mechanic (id)

alter table Automobile
add constraint cusfk
foreign key (CusId)
references Customer (NIC_id);

alter table Automobile
add Price money

alter table Garage
add constraint aufk
foreign key (AutomobileID)
references Automobile (PlateNumber);

alter table Garage
add constraint jofk
foreign key (JobID)
references Job (id);

alter table Garage
add constraint Mcfk
foreign key (MechanicID)
references Mechanic (id);

alter table Garage
add constraint ptfk
foreign key (PartID)
references PartsShop (id);

alter table Garage
add constraint lcfk
foreign key (LocID)
references Location (id);

alter table Vendor
add constraint vnfk
foreign key (LocID)
references Location (id);

alter table PartsShop
add constraint psfk
foreign key (VendorID)
references Vendor (id);


---------Insertion
insert into admin (adminId,adminName,adminPass) values
(989,'Naruto','joker1')

insert into Mechanic (id,name,titleofjob,boss,salary,hiredate) values
(432,'Sam','Suspensioin Expert',null,80000,'2019-02-23'),
(522,'Ali','Suspensioin Intern',432,10000,'2021-04-13'),
(431,'Max','Engine Expert',null,100000,'2018-01-12'),
(523,'Batman','Engine Intern',431,15000,'2021-01-23');

insert into Customer (NIC_ID,Name) values
(122455,'Venom'),
(123566, 'Joker')

insert into Automobile (PlateNumber,Name,CusId,Price) values
('KGB599','Phantom',122455,200000),
('KEL143','Corolla',123566,300000),
('FOG786','Camry-2020',null,500000),
('JKL433','Civic-2021',null,1300000),
('ASD123','Mercedes Benz',null,2300000)

insert into job (id,Work,CostOfWork,DaysRequired) values
(23,'Engine Cleaning',2000,4),
(24,'Engine Repair',9000,8),
(25,'Body Wash',300,2),
(26,'Suspension Cleaning',1000,3),
(27,'Suspension Repair',7000,5)

insert into Location (id,Province,City) values
(6731,'Sindh','Karachi'),
(6732,'Punjab','Lahore'),
(6733,'Punjab','Multan')

insert into vendor (id,Name,PhoneNumber,LocId) values
(1,'Honda','03222221111',6731),
(2,'Suzuki','03125521166',6732),
(3,'Toyota','03421121331',6731),
(4,'Yokohama','03244421221',6733)

insert into PartsShop (id,Name,CostOfProduct,InStock,VendorId) values
(7821,'Spark Plug',50,100,1),
(7822,'Lamps',220,30,1),
(7823,'ABS Breaks',9000,40,1),
(7824,'Carbon Fibre Steering',3000,32,2)


insert into Garage (Car_Arrival_Date,AutomobileID,JobId,MechanicId,PartID,LocID) values
('2020-03-09','KGB599',23,523,null,6731),
('2020-03-09','KGB599',23,522,null,6731),
('2020-03-09','KGB599',27,432,null,6731),
('2020-05-21','KEL143',24,523,7821,6731)


----------Triggers
create trigger EditMechanic
on Mechanic
after update
as
begin
select * from inserted
select * from deleted
end


create trigger EditParts
on PartsShop
after update
as
begin
select * from inserted
select * from deleted
end


----------Procedures

create procedure DecreaseQuantity
@ida int,@quan int
as 
begin
update PartsShop
set InStock = InStock-@quan
where id = @ida
end


create procedure LoginEasy
@idd int, @namee varchar(25)
as
begin
select * from Customer
where NIC_ID = @idd and Name = @namee
end



----------Views

create view GarageView
as
select g.AutomobileID as CarID, g.Car_Arrival_Date, a.Name as CarName ,m.Name, j.Work,p.Name as PartsInstalled,l.City,j.CostOfWork,p.CostOfProduct as costOfParts from Garage g
left outer join Mechanic m
on g.MechanicId=m.id
left outer join job j
on g.JobId=j.id
left outer join PartsShop p
on g.PartID=p.id
left outer join Location l
on g.LocID=l.id
left outer join Automobile a
on g.AutomobileID = a.PlateNumber

select * from CusAuto

create View CusAuto
as
select a.CusId,a.Name as CarName,a.PlateNumber,c.Name as CustomerName,c.NIC_ID from Automobile a
inner join Customer c
on c.NIC_ID=a.CusId


select * from GarageView g
inner join CusAuto c
on c.PlateNumber=g.CarID
where c.NIC_ID=122455
