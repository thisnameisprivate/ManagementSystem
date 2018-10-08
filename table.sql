#创建用户表
create table user (
id int key auto_increment,
username varchar(20) unique not null,
password char(32) not null
);
insert into user (username, password) values ('admin', md5(123456));
#创建回访详情表
create table nkvisit (
id int key auto_increment,
status integer not null default 0,
phone varchar(20) not null,
clientPhone varchar(20) not null,
name varchar(20) not null,
options varchar(20) not null,
visitStatus varchar(25) not null,
money integer not null default 0,
);
insert into nkvisit (status, phone, clientPhone, name, options, visitStatus, money) values (0, '18293122333', '0839-35608771', '董鑫', '男科', '等待回访', 888);
#创建科室表格
create table hospital (
id int key auto_increment,
hospital varchar(25) unique not null,
tableName varchar(25) unique not null,
addtime timestamp default current_timestamp
);
insert into hospital (hospital, tableName) values ('广元协和医院男科', 'nkvisit');
insert into hospital (hospital, tableName) values ('广元协和医院妇科', 'fkvisit');
insert into hospital (hospital, tableName) values ('广元协和医院不孕不育', 'bybyvisit');
insert into hospital (hospital, tableName) values ('广元协和医院其他', 'othervisit');
insert into hospital (hospital, tableName) values ('广元协和医院内科', 'neikevisit');
insert into hospital (hospital, tableName) values ('广元协和医院微创外科', 'wcwkvisit');
insert into hospital (hospital, tableName) values ('广元协和医院乳腺科', 'rxkvisit');
insert into hospital (hospital, tableName) values ('广元协和医院疼痛科', 'ttkvisit');
insert into hospital (hospital, tableName) values ('广元协和医院肝病科', 'gbkvisit');
insert into hospital (hospital, tableName) values ('广元协和医院肛肠科', 'gckvisit');

#创建来院状态表
create table status (
    id int key auto_increment,
    pid int not null,
    status varchar(20) not null unique
);

insert into status (pid,status) values (0, "等待");
insert into status (pid,status) values (1, "已到");
insert into status (pid,status) values (2, "未到");
insert into status (pid,status) values (3, "预约未定");
insert into status (pid,status) values (4, "全流失");
insert into status (pid,status) values (5, "半流失");
insert into status (pid,status) values (6, "已诊治");
#创建回访状态表
create table visitstatus (
    id int key auto_increment,
    visitstatus varchar(20) not null unique
);
insert into visitstatus (visitstatus) values ('等待回访');
insert into visitstatus (visitstatus) values ('已回访');
#创建客服表
create table custservice (
    id int key auto_increment,
    custservice varchar(20) not null unique,
    addtime timestamp default CURRENT_TIMESTAMP
);
insert into custservice (custservice) values ('董鑫');
insert into custservice (custservice) values ('崔丹');
/* 所有病种测试表 */
create table alldiseases (
    id int not null key auto_increment,
    pid int not null,
    diseases varchar(30) not null,
    tableName varchar(20) default null,
    currTime timestamp default current_timestamp
);


/* 所有病种数据添加测试 */

/* 广元协和医院男科信息添加 */
insert into alldiseases (pid, diseases, tableName) values ('1', '7月活动', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '男科检查', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '其他', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '阴虱、疥疮', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '男科性病', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '尿道炎', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '精液异常', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '射精障碍', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '阳痿', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '早泄', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '前列腺炎', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '包皮包茎', 'nkvisit');
insert into alldiseases (pid, diseases, tableName) values ('1', '包皮龟头炎', 'nkvisit');


/* 广元协和医院妇科信息添加 */
insert into alldiseases (pid, diseases, tableName) values ('2', '7月活动', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '妇科检查', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '妇科整形', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '子宫肌瘤', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '子宫息肉', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '附件囊肿', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '引产', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '月经不调', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '尿路感染', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '宫颈溃烂', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '盆腔炎', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '阴道炎', 'fkvisit');
insert into alldiseases (pid, diseases, tableName) values ('2', '人流', 'fkvisit');



/* 广元协和医院不孕不育信息添加 */
insert into alldiseases (pid, diseases, tableName) values ('3', '男性不育', 'bybyvisit');
insert into alldiseases (pid, diseases, tableName) values ('3', '女性不孕', 'bybyvisit');


/* 广元协和医院其他信息添加 */
insert into alldiseases (pid, diseases, tableName) values ('4', '7月活动', 'othervisit');
insert into alldiseases (pid, diseases, tableName) values ('4', '普通体检', 'othervisit');
insert into alldiseases (pid, diseases, tableName) values ('4', '结石科', 'othervisit');
insert into alldiseases (pid, diseases, tableName) values ('4', '胃肠科', 'othervisit');
insert into alldiseases (pid, diseases, tableName) values ('4', '疼痛科', 'othervisit');
insert into alldiseases (pid, diseases, tableName) values ('4', '中医科', 'othervisit');
insert into alldiseases (pid, diseases, tableName) values ('4', '内科', 'othervisit');
insert into alldiseases (pid, diseases, tableName) values ('4', '其他', 'othervisit');


/* 广元协和医院计划生育信息添加 */
insert into alldiseases (pid, diseases, tableName) values ('5', '人流', 'rlvisit');
insert into alldiseases (pid, diseases, tableName) values ('5', '引产', 'rlvisit');


/* 广元协和医院妇科信息添加 */
insert into alldiseases (pid, diseases, tableName) values ('6', '痔疮', 'gckvisit');
insert into alldiseases (pid, diseases, tableName) values ('6', '肛肠检查', 'gckvisit');


/* 广元协和医院微创外科信息添加 */
insert into alldiseases (pid, diseases, tableName) values ('7', '腋臭', 'wcwkvisit');
insert into alldiseases (pid, diseases, tableName) values ('7', '微创手术', 'wcwkvisit');
insert into alldiseases (pid, diseases, tableName) values ('7', '其他', 'wcwkvisit');



/* 广元协和医院乳腺科信息添加 */
insert into alldiseases (pid, diseases, tableName) values ('8', '乳腺增生', 'rxkvisit');
insert into alldiseases (pid, diseases, tableName) values ('8', '其他', 'rxkvisit');