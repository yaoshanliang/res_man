create table awards(id int primary key not null, category text, level text, time Date, Persons text);

create table verfication(id int primary key not null, time Date, organization text, others text);

create table project(Name text,Source int,Admin int,Start text,End text,Money float,MoneyType char(1),
	Contract text,Credit text,,MoneyManage int,Verfication int,Awards int);