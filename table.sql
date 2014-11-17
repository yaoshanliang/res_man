#项目数据

##与管理平台有关

###1.管理员
create table Admin(
	name text not null,
	password text not null,
	mode int not null
	);

###2.验证码
create table captcha (
 captcha_id bigint(13) unsigned not null auto_increment,
 captcha_time int(10) unsigned not null,
 ip_address varchar(16) default '0' not null,
 word varchar(20) not null,
 primary key `captcha_id` (`captcha_id`),
 key `word` (`word`)
);



##与项目有关

###3.人员 person

create table person(
	id int primary key not null auto_increment,
	name varchar(10) not null,
	duties text,
	phonenumber text,
	email text,
	position text
	);

###4.项目来源 source
create table source(
	name text not null,
	`number` int not null primary key auto_increment
	);

###5.科研项目 project
create table project(
	`projectid` int primary key not null auto_increment,
	name text not null,`source` int not null,
	`type` text not null,
	`principal` int not null,
	`start` text not null,
	`end` text not null,
	`money` float not null,
	`currency` varchar(10) not null default "RMB",
	`contract` text not null,
	credit text not null,
	foreign key(principal) references person(id),
	foreign key(source) references source(`number`)
	);

###6.获奖情况 award
create table award(
	`number` int not null primary key auto_increment,
	achievement text not null,
	time text not null,
	name text not null,
	level text not null
	);

###7.鉴定验收 validation
create table validation(
	`number` int not null primary key auto_increment,
	achievement text not null,
	time text not null,
	institute text not null
	);

###8.经费到款 funds
create table funds(
	projectid int not null,
	payoff float not null,
	year varchar(5) not null,
	others text
	);

##专利／著作权相关

###9.软件著作权 copyright 
create table copyright(
	number int not null primary key auto_increment,
	name text not null,
	register text not null,
	person int not null,
	institute text not null,
	time text not null,
	file text
);

###10.专利情况 patent
create table patent(
	number int not null primary key auto_increment,
	name text not null,
	register text not null,
	person int not null,
	institute text not null,
	time text not null,
	file text
);

###11.专利人员名单 patentlist
create table patentlist(
	id int not null,
	identifier int not null,
	`order` int not null,
	foreign key (id) references person(id)
);

###12.著作权人员名单 copyrightlist
create table copyrightlist(
	id int not null,
	identifier int not null,
	`order` int not null,
	foreign key (id) references person(id)
);


##个人情况

###13.出版专著 work
create table work(
	number int not null primary key auto_increment,
	name text not null,
	publisher text not null,
	publishdate text not null,
	personlist text not null
);

###14.学术团体（组织）兼职情况 part
create table part(
	number int not null primary key auto_increment,
	name text not null,
	duty text not null,
	start text not null,
	end text not null,
	id int not null,
	foreign key(id) references person(id)
);

###15.国内外进修及学习情况 learn
create table learn(
	number int not null primary key auto_increment,
	institute text not null,
	content text not null,
	start text not null,
	end text not null,
	person int not null,
	foreign key(person) references person(id)
);


##机构情况

###16.国际合作情况 cooperation
create table cooperation(
	id int not null primary key auto_increment,
	category text not null,
	list text not null,
	`number` int not null,
	place text not null,
	purpose text not null,
	url text not null,
	news char(1) not null,
	picture char(1) not null,
	year text not null
);

###17.项目成员名单 projectlist
create table projectlist(
	projectid int not null,
	id int not null,
	`order` int not null,
	foreign key(id) REFERENCES person(id)
	);

##名单或清单
###18.获奖人员名单 awardlist
create table awardlist(
	id int not null,
	identifier int not null,
	`order` int not null,
	foreign key (id) references person(id)
);

###19.验收人员名单 validationlist
create table validationlist(
	id int not null,
	identifier int not null,
	`order` int not null,
	foreign key (id) references person(id)
);

###20.获奖项目清单
create table awardprojectlist(
	projectid int not null,
	identifier int not null,
	foreign key(projectid) references project(`projectid`)
);

###21.验收项目清单
create table validationprojectlist(
	projectid int not null,
	identifier int not null,
	foreign key(projectid) references project(`projectid`)
);