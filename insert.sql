create table buyer(
buyer_ID varchar(200) NOT NULL COMMENT '買家ID',
buyer_name varchar(200) NOT NULL COMMENT '買家姓名',
buyer_address varchar(200) NOT NULL COMMENT '買家地址',
password varchar(200) NOT NULL COMMENT '密碼',
primary key(buyer_ID)
);

create table form(
form_ID int(200) NOT NULL COMMENT '訂單編號',
buyer_ID varchar(200) NOT NULL COMMENT '買家ID',
seller_ID varchar(200) NOT NULL COMMENT '賣家ID',
item_ID int(200) NOT NULL COMMENT '物品ID',
buyer_name varchar(200) NOT NULL COMMENT '買家姓名',
seller_name varchar(200) NOT NULL COMMENT '賣家姓名',
item_name varchar(200) NOT NULL COMMENT '物品名稱',
quantity int(200) NOT NULL COMMENT '數量',
price int(200) NOT NULL COMMENT '總金額',
pay varchar(200) NOT NULL COMMENT '付款方式',
card_number varchar(200) NOT NULL COMMENT '信用卡號',
address varchar(200) NOT NULL COMMENT '寄送地址',
primary key(form_ID)
);

create table purchase_record(
ID int(200) NOT NULL COMMENT '登入順序',
buyer_ID varchar(200) NOT NULL COMMENT '買家ID',
seller_ID varchar(200) NOT NULL COMMENT '賣家ID',
item_ID int(200) NOT NULL COMMENT '物品ID',
buyer_name varchar(200) NOT NULL COMMENT '買家姓名',
seller_name varchar(200) NOT NULL COMMENT '賣家姓名',
item_name varchar(200) NOT NULL COMMENT '物品名稱',
quantity int(200) NOT NULL COMMENT '數量',
price int(200) NOT NULL COMMENT '總金額',
primary key(ID)
);

create table seller(
seller_ID varchar(200) primary key NOT NULL COMMENT '賣家ID',
seller_name varchar(200) NOT NULL COMMENT '賣家姓名',
seller_address varchar(200) NOT NULL COMMENT '賣家地址',
bank_code varchar(200) NOT NULL COMMENT '銀行代號',
bank_account varchar(200) NOT NULL COMMENT '銀行帳戶',
password varchar(200) NOT NULL COMMENT '密碼'
);

create table stock(
item_ID int(200) primary key NOT NULL COMMENT '物品ID',
seller_ID varchar(200) primary key NOT NULL COMMENT '賣家ID',
seller_name varchar(200) NOT NULL COMMENT '賣家姓名',
item_name varchar(200) NOT NULL COMMENT '物品名稱',
quantity int(200) NOT NULL COMMENT '數量',
price int(200) NOT NULL COMMENT '單位價錢'
);

insert into buyer(buyer_ID, buyer_name, buyer_address, password)
	values('Mary1000', 'Mary', '台中市西屯區文華路124號', 'mary10000');
insert into buyer(buyer_ID, buyer_name, buyer_address, password)
	values('Ben4000', 'Ben', '台中市西屯區青海路100號', 'ben40000');
insert into buyer(buyer_ID, buyer_name, buyer_address, password)
	values('Tom5000', 'Tom', '台中市西屯區福星路110號', 'tom50000');
insert into buyer(buyer_ID, buyer_name, buyer_address, password)
	values('Kevin6000', 'Kevin', '台中市西屯區福星路150號', 'kevin60000');
insert into buyer(buyer_ID, buyer_name, buyer_address, password)
	values('Jerry7000', 'Jerry', '台中市西屯區河南路二段100號', 'jerry70000');
insert into buyer(buyer_ID, buyer_name, buyer_address, password)
	values('Benny8000', 'Benny', '台中市西屯區文華路200號', 'benny80000');

insert into seller(seller_ID, seller_name, seller_address, bank_code, bank_account, password)
	values('Jack2000', 'Jack', '台中市西屯區文華路100號', '004', '193804758493', 'jack20000');
insert into seller(seller_ID, seller_name, seller_address, bank_code, bank_account, password)
	values('Andy3000', 'Andy', '台中市西屯區文華路120號', '007', '374859374658', 'andy30000');
insert into seller(seller_ID, seller_name, seller_address, bank_code, bank_account, password)
	values('Mark8000', 'Mark', '台中市西屯區文華路130號', '005', '283945267495', 'mark80000');
insert into seller(seller_ID, seller_name, seller_address, bank_code, bank_account, password)
	values('Peter9000', 'Peter', '台中市西屯區青海路100號', '007', '119846875212', 'peter90000');

insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('1', 'Andy3000', 'Andy', '【777電腦系列】 筆記型電腦 迷霧黑', 1000, 23000);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('2', 'Jack2000', 'Jack', '【777電腦系列】 筆記型電腦 冰河藍', 1000, 21400);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('3', 'Andy3000', 'Andy', '【777電腦系列】 筆記型電腦 灰', 1000, 31000);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('4', 'Jack2000', 'Jack', '【777電腦系列】 筆記型電腦 銀', 1000, 63888);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('5', 'Jack2000', 'Jack', '【777電腦系列】 筆記型電腦 白金', 1000, 40000);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('6', 'Andy3000', 'Andy', '【777電腦系列】 筆記型電腦 銀灰', 1000, 30000);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('7', 'Mark8000', 'Mark', '【777衣服系列】 T-shirt TW', 1000, 700);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('8', 'Mark8000', 'Mark', '【777衣服系列】 T-shirt VANS', 1000, 800);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('9', 'Peter9000', 'Peter', '【777衣服系列】 T-shirt adidas', 1000, 890);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('10', 'Andy3000', 'Andy', '【777衣服系列】 T-shirt 肌肉衣', 1000, 399);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('11', 'Peter9000', 'Peter', '【777衣服系列】 T-shirt NBA', 1000, 980);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('12', 'Mark8000', 'Mark', '【777衣服系列】 T-shirt champion', 1000, 550);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('13', 'Jack2000', 'Jack', '【777鞋子系列】 帆布鞋 converse 奶茶色', 1000, 2449);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('14', 'Peter9000', 'Peter', '【777鞋子系列】 高筒帆布鞋 TW 藍', 1000, 880);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('15', 'Mark8000', 'Mark', '【777鞋子系列】 Nike Air Force 1', 1000, 3400);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('16', 'Peter9000', 'Peter', '【777鞋子系列】 adidas 杜拉姆女生慢跑鞋 黑粉', 1000, 1400);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('17', 'Mark8000', 'Mark', '【777鞋子系列】 VANS OLD SKOOL PRO基本款', 1000, 1500);
insert into stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
	values('18', 'Andy3000', 'Andy', '【777鞋子系列】 PUMA 休閒鞋 Turin II', 1000, 2049);

