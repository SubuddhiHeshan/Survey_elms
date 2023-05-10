drop database if exists survey_leave;
create database survey_leave;
use survey_leave;

# creation of tables

create table login (
empNo int not null,
username varchar(20) not null,
password varchar(100) not null,
lockStatus char(5) default 1,
userRole char(5) not null,
logFailAttemps int default 0,
updateBy varchar(45) null,
updateDate timestamp null,
primary key(empNo , username)  
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table userRole (
roleId int not null auto_increment primary key,
roleType varchar(20) not null,
createBy varchar(20) default null,
createDate timestamp,
roleStatus char(5) default 1,
disc varchar(100) default null
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table office (
ofzId int not null primary key,
ofzName varchar(150) not null,
address1 varchar(20) default null,
address2 varchar(20) default null,
ofzStatus INT(1) default 1,
createby varchar(50) default null,
createDate timestamp
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table department (
deptId int not null auto_increment primary key,
deptName varchar(100) not null,
ofzid int not null,
deptStatus INT(1) default 1,
createBy varchar(50) default null,
createDate timestamp,
foreign key(ofzid) references office(ofzid)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table designation (
dId int not null auto_increment primary key,
dName varchar (100) not null,
createBy varchar(50) default null,
createDate timestamp
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table user (
uid int not null auto_increment primary key,
empNo int not null unique,
fName varchar(50) not null,
mName varchar(50),
lName varchar(50) default null,
gender varchar(45) default null,
address1 varchar(200) not null,
address2 varchar(200) null,
dId int,
ofzId int,
deptId int,
createBy varchar(50) not null,
createDate timestamp,
updateBy varchar(50) null,
updateDate timestamp null,
userStatus char (5) default 1,
tele int(10) default null,
email varchar(50) default null,
userCarder varchar(20) not null,
foreign key(dId) references designation(dId),
foreign key(ofzId) references office(ofzId),
foreign key(deptId) references department(deptId)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table leaves (
levId int not null auto_increment primary key,
levName varchar(50) not null,
levQty double(5,2) not null,
createBy varchar(50) default null,
createDate timestamp,
userCarder varchar(20) not null,
levDisc varchar(100) default null,
leaveStatus char(5) default 1
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table leaveHistory (
id int not null auto_increment primary key,
empNo int,
leaveType varchar (50) not null,
toDate varchar(50) not null,
fromDate varchar(50) not null,
applyDate varchar(50) not null,
applyQty double(5,2),
aprdQty double(5,2),
disc varchar(100) default null,
actnBy varchar(100) default null,
adminRemark varchar(100) default null,
adminRemarkDate varchar(20) default null,
status int(1) not null,
isRead int(1) not null,
rdyPrint int(1) default null,
foreign key(empNo) references user(empNo)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table leaveBalance (
id int not null auto_increment primary key,
levId int,
empNo int,
qty double (5,2)  not null default 0.0,
Jan double (5,2) default null,
Feb double (5,2) default null,
Mar double (5,2) default null,
Aprl double (5,2) default null,
May double (5,2) default null,
June double (5,2) default null,
July double (5,2) default null,
Augu double (5,2) default null,
Sept double (5,2) default null,
Octo double (5,2) default null,
Nov double (5,2) default null,
Dec double (5,2) default null,
year varchar(5) default null,
foreign key(levId) references leaves(levId),
foreign key(empNo) references user(empNo)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table attendance (
empNo int not null primary key,
inTime varchar(10) default null,
outTime varchar(10) default null,
date timestamp,
month varchar(5),
year varchar(5),
atdProg double(3,2)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table workAssign (
workId int not null auto_increment primary key,
workName varchar(100) not null,
assignBy varchar(20) not null,
assignTo varchar(20) not null,
stage int(1) not null,
deadline varchar(20) default null,
assignDisc varchar(100)default null,
assignDate varchar(20) default null,
startDate varchar(20)default null,
doneDate varchar(20) default null,
workRemark varchar(100) default null,
priorityLevel int(1) default null,
worStage int(1) default 0,
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table salBonus (
id int not null auto_increment primary key,
empNo int,
ofzId int,
deptId int,
bonus double(6,2) default null,
addonDate varchar(10),
addBy varchar(10) not null,
approvedBy varchar(10) not null,
atdProg double(3,2),
workStage int(1)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

