##与项目有关(FK 在非innodb不可用)

#人员 person
create table person(id int primary key not null auto_increment,name varchar(10) not null,duties text);

#项目来源 source
create table source(name text not null);

#科研项目 project
create table project(`projectid` int primary key not null auto_increment,name text not null,`source` text not null,`level` text
	,`principal` int not null,`start` text not null,`end` text not null,`money` float not null
	,`currency` varchar(10) not null default "RMB",`contract` text not null,credit text not null,`type` text not null,
	foreign key(principal) references person(id));

#获奖情况 award
create table award(projectid int not null,id int not null,`order` int not null, time text not null, 
	foreign key(id) REFERENCES person(id));

#鉴定验收 validation
create table validation(projectid int not null,time text not null,institute text not null,others text,
	foreign key(projectid) references project(projectid));

#经费到款 funds
create table funds(projectid int not null,payoff float not null,remain float not null,others text);

#年份到款表 detail
create table detail(projectid int not null,year int not null,currency varchar(10) not null default "RMB",figure float not null);
	