#项目数据

##与管理平台有关

###1.管理员
create table Admin(
	name text not null,
	password text not null
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
	duties text
	);

###4.项目来源 source
create table source(
	name text not null
	);

###5.科研项目 project
create table project(
	`projectid` int primary key not null auto_increment,
	name text not null,`source` text not null,
	`level` text,
	`principal` int not null,
	`start` text not null,
	`end` text not null,
	`money` float not null,
	`currency` varchar(10) not null default "RMB",
	`contract` text not null,
	credit text not null,
	`type` text not null,
	foreign key(principal) references person(id)
	);

###6.获奖情况 award
create table award(
	projectid int not null,
	id int not null,
	`order` int not null, 
	time text not null, 
	foreign key(id) REFERENCES person(id)
	);

###7.鉴定验收 validation
create table validation(
	projectid int not null,
	time text not null,
	institute text not null,
	others text,
	foreign key(projectid) references project(projectid)
	);

###8.经费到款 funds
create table funds(
	projectid int not null,
	payoff float not null,
	remain float not null,
	others text
	);

###9.年份到款表 detail
create table detail(
	projectid int not null,
	year int not null,
	currency varchar(10) not null default "RMB",
	figure float not null
	);


##专利／著作权相关

###10.软件著作权 copyright 
create table copyright(
	number int not null primary key auto_increment,
	name text not null,
	register text not null,
	person int not null,
	institute text not null,
	time text not null
);

###11.专利情况 patent
create table patent(
	number int not null primary key auto_increment,
	name text not null,
	register text not null,
	person int not null,
	institute text not null,
	time text not null
);

###12.专利人员名单 patentlist
create table patentlist(
	id int not null,
	identifier int not null,
	`order` int not null,
	foreign key (id) references person(id)
);

###13.著作权人员名单 copyrightlist
create table copyrightlist(
	id int not null,
	identifier int not null,
	`order` int not null,
	foreign key (id) references person(id)
);


##个人情况

###14.出版专著 work
create table work(
	name text not null,
	publisher text not null,
	publishdate text not null,
	personlist text not null
);

###15.学术团体（组织）兼职情况 part
create table part(
	name text not null,
	duty text not null,
	start text not null,
	end text not null,
	id int not null,
	foreign key(id) references person(id)
);

###16.国内外进修及学习情况 learn
create table learn(
	institute text not null,
	content text not null,
	start text not null,
	end text not null,
	list text not null
);


##机构情况

###17.国际合作情况 cooperation
create table cooperation(
	category text not null,
	list text not null,
	`number` int not null,
	place text not null,
	purpose text not null,
	url text not null,
	news char(1) not null,
	picture char(1) not null
);
	