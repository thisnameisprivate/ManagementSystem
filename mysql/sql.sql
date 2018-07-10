

/* 主表信息测试版本 */
create table comment(
    id int key not null auto_increment,
    part_id int not null default 0,
    name varchar(20) not null,
    age int(3) not null,
    sex varchar(6) not null,
    disease_id varchar(200) not null default 0 comment '患病类型',
    depart int(10) not null default 0 comment '科室',
    is_local tinyint(1) not null default 1 comment '是否本地病人',
    area varchar(32) not null comment '病人来源地区',
    tel varchar(20) not null,
    qq varchar(20) not null,
    zhuanjia_num varchar(10) not null,
    content mediumtext not null,
    jiedai varchar(20) not null,
    jiedai_content mediumtext not null,
    order_date_changes int(4) not null default 0 comment '预约时间修改次数',
    order_date_log mediumtext not null,
    media_from varchar(20) not null,
    engine varchar(32) not null,
    engine_key varchar(32) not null,
    from_site varchar(40) not null,
    from_account int(10) not null default 0 comment '所属账户',
    memo mediumtext not null,
    status int(2) not null default 0,
    fee double(9,2) not null comment '治疗费用',
    come_date int(10) not null default 0,
    doctor varchar(32) not null comment '接待医生',
    xiaofei int(2) not null default 0 comment '是否消费',
    xiangmu varchar(250) not null comment '治疗项目',
    huifang mediumtext not null comment '回访记录',
    rechecktime int(10) not null default 0 comment '复查时间',
    addtime int(10) not null default 0,
    author varchar(32) not null,
    edit_log mediumtext not null comment '修改记录',
    mtly varchar(32) default null
);


/* 无限极分类测试表 */

create table classification (
    id int key not null auto_increment,
    pid int not null,
    hospital varchar(15) not null
);

/* 无限极分类数据添加测试 */
insert into classification (pid, hospital) values (0, "首页");
insert into classification (pid, hospital) values (1, "广元协和医院男科");
insert into classification (pid, hospital) values (1, "广元协和医院妇科");
insert into classification (pid, hospital) values (1, "广元协和医院不孕不育科");
insert into classification (pid, hospital) values (1, "广元协和医院其他");
insert into classification (pid, hospital) values (1, "广元协和医院计划生育科");
insert into classification (pid, hospital) values (1, "广元协和医院肛肠科");
insert into classification (pid, hospital) values (1, "广元协和医院微创外科");
insert into classification (pid, hospital) values (1, "广元协和医院微乳腺科");
insert into classification (pid, hospital) values (2, "预约病人搜索");
insert into classification (pid, hospital) values (2, "重复病人查询");
insert into classification (pid, hospital) values (2, "客服明细报表");
insert into classification (pid, hospital) values (2, "月趋势报表");
insert into classification (pid, hospital) values (2, "自定义图像报表");
insert into classification (pid, hospital) values (2, "导出病人数据");
insert into classification (pid, hospital) values (2, "数据横向对比");


/* 所有病种测试表 */
create table alldiseases (
    id int not null key auto_increment,
    pid int not null,
    diseases varchar(30) not null
);


/* 所有病种数据添加测试 */

/* 广元协和医院男科信息添加 */
insert into alldiseases (pid, diseases) values ('0', '7月活动');
insert into alldiseases (pid, diseases) values ('0', '男科检查');
insert into alldiseases (pid, diseases) values ('0', '其他');
insert into alldiseases (pid, diseases) values ('0', '阴虱、疥疮');
insert into alldiseases (pid, diseases) values ('0', '男科性病');
insert into alldiseases (pid, diseases) values ('0', '尿道炎');
insert into alldiseases (pid, diseases) values ('0', '精液异常');
insert into alldiseases (pid, diseases) values ('0', '射精障碍');
insert into alldiseases (pid, diseases) values ('0', '阳痿');
insert into alldiseases (pid, diseases) values ('0', '早泄');
insert into alldiseases (pid, diseases) values ('0', '前列腺炎');
insert into alldiseases (pid, diseases) values ('0', '包皮包茎');
insert into alldiseases (pid, diseases) values ('0', '包皮龟头炎');


/* 广元协和医院妇科信息添加 */
insert into alldiseases (pid, diseases) values ('1', '7月活动');
insert into alldiseases (pid, diseases) values ('1', '妇科检查');
insert into alldiseases (pid, diseases) values ('1', '妇科整形');
insert into alldiseases (pid, diseases) values ('1', '子宫肌瘤');
insert into alldiseases (pid, diseases) values ('1', '子宫息肉');
insert into alldiseases (pid, diseases) values ('1', '附件囊肿');
insert into alldiseases (pid, diseases) values ('1', '引产');
insert into alldiseases (pid, diseases) values ('1', '月经不调');
insert into alldiseases (pid, diseases) values ('1', '尿路感染');
insert into alldiseases (pid, diseases) values ('1', '宫颈溃烂');
insert into alldiseases (pid, diseases) values ('1', '盆腔炎');
insert into alldiseases (pid, diseases) values ('1', '阴道炎');
insert into alldiseases (pid, diseases) values ('1', '人流');



/* 广元协和医院不孕不育信息添加 */
insert into alldiseases (pid, diseases) values ('2', '男性不育');
insert into alldiseases (pid, diseases) values ('2', '女性不孕');


/* 广元协和医院其他信息添加 */
insert into alldiseases (pid, diseases) values ('3', '7月活动');
insert into alldiseases (pid, diseases) values ('3', '普通体检');
insert into alldiseases (pid, diseases) values ('3', '结石科');
insert into alldiseases (pid, diseases) values ('3', '胃肠科');
insert into alldiseases (pid, diseases) values ('3', '疼痛科');
insert into alldiseases (pid, diseases) values ('3', '中医科');
insert into alldiseases (pid, diseases) values ('3', '内科');
insert into alldiseases (pid, diseases) values ('3', '其他');


/* 广元协和医院计划生育信息添加 */
insert into alldiseases (pid, diseases) values ('4', '人流');
insert into alldiseases (pid, diseases) values ('4', '引产');


/* 广元协和医院妇科信息添加 */
insert into alldiseases (pid, diseases) values ('5', '痔疮');
insert into alldiseases (pid, diseases) values ('5', '肛肠检查');


/* 广元协和医院微创外科信息添加 */
insert into alldiseases (pid, diseases) values ('6', '腋臭');
insert into alldiseases (pid, diseases) values ('6', '微创手术');
insert into alldiseases (pid, diseases) values ('6', '其他');



/* 广元协和医院乳腺科信息添加 */
insert into alldiseases (pid, diseases) values ('1', '乳腺增生');
insert into alldiseases (pid, diseases) values ('1', '其他');


/* 各个科室信息添加表 */
create table rxk (
    id int not null key auto_increment,
    name varchar(15) not null,
    old int not null,
    phone bigint not null,
    qq bigint not null,
    diseases varchar(30) not null,
    fromAddress varchar(15) not null,
    switch varchar(10) not null,
    sex varchar(15) not null,
    desc1 varchar(300) not null,
    expert varchar(10) not null,
    oldDate date not null,
    desc2 varchar(300) not null,
    status varchar(15) not null,
    newDate date not null
);



/* 创建来源信息表 */
create table fromaddress (
    id int key auto_increment,
    pid int not null,
    fromaddress varchar(20) not null unique
);


insert into fromaddress (pid,fromaddress) values (0, "网络");
insert into fromaddress (pid,fromaddress) values (1, "电话");
insert into fromaddress (pid,fromaddress) values (2, "QQ");
insert into fromaddress (pid,fromaddress) values (3, "营销QQ");
insert into fromaddress (pid,fromaddress) values (4, "Wechat");
insert into fromaddress (pid,fromaddress) values (5, "公众号");
insert into fromaddress (pid,fromaddress) values (6, "陌陌");
insert into fromaddress (pid,fromaddress) values (7, "直播");
insert into fromaddress (pid,fromaddress) values (8, "黔医通");


/* 创建状态信息表 */
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
