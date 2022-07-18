drop sequence tcb_card_no_seq;
drop sequence dealer_id_seq;

drop trigger dealer_record_trigger;

drop table dealer_area;
drop table items_distributed;
drop table cust_exp;
drop table goods;
drop table family_info;
drop table customer_info;
drop table distribution_area;
drop table package;
drop table dealer_inventory;
drop table dealer_inventory2;
drop table main_inventory;
drop table dealer_info;
drop table admin;
drop table info;
drop table feedback;

create table admin
(
    username varchar2(40) primary key,
    password varchar2(40)
);
insert into admin(username, password) values('admin', 'admin');

create table info
(
    dealer_id varchar2(40) primary key,
    password varchar2(40)
);

--insert into info(username, password) values('admin', 'admin');
insert into info(dealer_id, password) values('123', '123');
insert into info(dealer_id, password) values('122', '122');
insert into info(dealer_id, password) values('121', '121');
insert into info(dealer_id, password) values('120', '120');

create table package(
    -- sl_no varchar2(8),
    item_name varchar2(30),
    pk1 number(4,1),
    pk2 number(4,1),
    pk3 number(4,1),
    unit varchar2(12)
);

create table distribution_area(
    area_code varchar2(20),
    ward_no varchar2(8),
    d_union varchar2(30),
    upazilla varchar2(30),
    district varchar2(20),

    constraint distribution_area_area_code_pk primary key(area_code)
);

create table customer_info(
    nid varchar2(20),
    name varchar2(20) not null,
    occupation varchar2(20) not null,
    spouse varchar2(20),
    mobile_no varchar2(15) not null,
    tcb_card_no varchar2(15) unique,
    gender varchar2(8),
    income number(10,3) not null,
    date_of_birth date,
    no_of_family_members number(5,0),
    age number(4,0),
    holding_no varchar2(8),
    road varchar2(30),
    area_code varchar2(20),
    package_no varchar2(8),
    username varchar2(40),
    last_buy_date date,
    constraint customer_info_nid_pk primary key(nid),
    constraint customer_info_area_code_fk foreign key(area_code) references distribution_area(area_code) on delete cascade,
    constraint customer_info_username_fk foreign key(username) references admin(username) on delete cascade
);

create table family_info(
    member_nid varchar2(20),
    member_name varchar2(20),
    member_occupation varchar2(20),
    member_income number(10,3),
    nid varchar2(20),
    constraint family_info_member_nid_pk primary key(member_nid),
    constraint family_info_nid_fk foreign key(nid) references customer_info(nid) on delete cascade
);


create table goods(
    item_name varchar2(20),
    unit_price number(8,2),
    username varchar2(40),
    constraint goods_item_name_pk primary key(item_name),
    constraint goods_username_fk foreign key(username) references admin(username) on delete cascade
);

create table cust_exp(
    nid varchar2(20),
    item_name varchar2(20),
    totalspent number(10,3),
    buy_date date,
    amount number(3,0),

    constraint cust_exp_nid_fk foreign key(nid) references customer_info(nid) on delete cascade,
    constraint cust_exp_item_name_fk foreign key(item_name) references goods(item_name)
);

create table dealer_info(
    dealer_id varchar2(30),
    organization_name varchar2(30),
    organization_address varchar2(80),
    applicant_name varchar2(30),
    permanent_address varchar2(80),
    email varchar2(20),
    tin_number varchar2(30),
    date_of_birth date,
    username varchar2(40),

    constraint dealer_info_dealer_id_pk primary key(dealer_id),
    constraint dealer_info_username_fk foreign key(username) references admin(username) on delete cascade
);

create table items_distributed(
    item_name varchar2(20),
    dealer_id varchar2(30),
    total_sale number(10,3),
    distribution_date date,

    constraint items_distributed_item_name_fk foreign key(item_name) references goods(item_name) on delete cascade,
    constraint items_distributed_dealer_id_fk foreign key(dealer_id) references dealer_info(dealer_id) on delete cascade
);

create table dealer_area(
    dealer_id varchar2(30),
    area_code varchar2(20),

    constraint dealer_area_dealer_id_fk foreign key(dealer_id) references dealer_info(dealer_id) on delete cascade,
    constraint dealer_area_area_code_fk foreign key(area_code) references distribution_area(area_code) on delete cascade
);

create table main_inventory(
    item_name varchar2(30),
    quantity number(10,2),
    date_added date,
    username varchar2(40),

    constraint main_inventory_item_name_pk primary key(item_name),
    constraint main_inventory_username_fk foreign key(username) references admin(username) on delete cascade

);

create table dealer_inventory(
    item_name varchar2(40),
    date_added date,
    quantity number(10,2),
    dealer_id varchar2(30),
    
    constraint dealer_inventory_dealer_id_fk foreign key(dealer_id) references dealer_info(dealer_id) on delete cascade
);

create table dealer_inventory2(
    item_name varchar2(40),
    quantity number(10,2),
    dealer_id varchar2(30),
    
    constraint dealer_inventory2_dealer_id_fk foreign key(dealer_id) references dealer_info(dealer_id) on delete cascade
);

create table feedback(
    fname varchar2(100),
    femail varchar2(100),
    fsubject varchar2(100),
    fmessage varchar2(500)
);

create sequence tcb_card_no_seq
start with 1
increment by 1
nocycle;


create sequence dealer_id_seq
start with 1
increment by 1
nocycle;



insert into package( item_name, pk1, pk2, pk3, unit)
values('Soyabin Oil', 3, 2, 1, 'ltr');

insert into package( item_name, pk1, pk2, pk3, unit)
values( 'Sugar', 2, 2, 1, 'kg');

insert into package(item_name, pk1, pk2, pk3, unit)
values('Lentil', 2, 2, 1, 'kg');

insert into package( item_name, pk1, pk2, pk3, unit)
values('Rice', 5, 5, 3, 'kg');

insert into package(item_name, pk1, pk2, pk3, unit)
values( 'Onion', 3, 2, 1, 'kg');

insert into package(item_name, pk1, pk2, pk3, unit)
values('Potato', 3, 3, 2, 'kg');



insert into distribution_area(area_code, ward_no, d_union, upazilla, district)
values('001', '1', 'nandina', 'Alam nagar', 'Rajshahi');

insert into distribution_area(area_code, ward_no, d_union, upazilla, district)
values('002', '2', 'Khaledi', 'Alam nagar', 'Rajshahi');

insert into distribution_area(area_code, ward_no, d_union, upazilla, district)
values('003', '3', 'nandina', 'Alam nagar', 'Rajshahi');

insert into distribution_area(area_code, ward_no, d_union, upazilla, district)
values('005', '3', 'khaledi', 'Alam nagar', 'Rajshahi');

insert into distribution_area(area_code, ward_no, d_union, upazilla, district)
values('004', '1', 'keshobpur', 'balutila', 'Rajshahi');




insert into customer_info(nid, name, occupation, spouse, mobile_no, tcb_card_no, gender, income, date_of_birth,no_of_family_members,age, holding_no, road, area_code,package_no)
values('1903189467218', 'Easin Arafat', 'Shopkeeper', 'Kayenat khan','01782569124','2561785210', 'Male', 10000, to_date('19-05-1992', 'dd-mm-yyyy'),5,34, '10', 'ali road', '002', '1');

insert into customer_info(nid, name, occupation, spouse, mobile_no, tcb_card_no, gender, income, date_of_birth,no_of_family_members,age, holding_no, road, area_code,package_no)
values('1903189467451', 'MN Alam', 'Shopkeeper', 'Alea begum','01782542124','3561783210', 'Male', 12000, to_date('19-05-1992', 'dd-mm-yyyy'),4,34, '10', 'ali road', '001', '2');

insert into customer_info(nid, name, occupation, spouse, mobile_no, tcb_card_no, gender, income, date_of_birth,no_of_family_members,age, holding_no, road, area_code,package_no)
values('1903189467784', 'Mahdi Muhtasim', 'Govt employee', 'Marjina begum','01782542548','3561783755', 'Male', 12000, to_date('19-05-1990', 'dd-mm-yyyy'),7,38, '16', 'ali road', '003', '3');

insert into customer_info(nid, name, occupation, spouse, mobile_no, tcb_card_no, gender, income, date_of_birth,no_of_family_members,age, holding_no, road, area_code,package_no)
values('1903189467258', 'Tesan Arafat', 'Shopkeeper', 'Kayenat khan','01782569124','2523785210', 'Male', 10000, to_date('19-05-1992', 'dd-mm-yyyy'),5,34, '10', 'ali road', '002', '2');

insert into customer_info(nid, name, occupation, spouse, mobile_no, tcb_card_no, gender, income, date_of_birth,no_of_family_members,age, holding_no, road, area_code,package_no)
values('1903189467471', 'MN Alam Siddique', 'Shopkeeper', 'Alea begum','01782542129','3561783253', 'Male', 12000, to_date('19-05-1992', 'dd-mm-yyyy'),4,34, '10', 'ali road', '001', '3');

insert into customer_info(nid, name, occupation, spouse, mobile_no, tcb_card_no, gender, income, date_of_birth,no_of_family_members,age, holding_no, road, area_code,package_no, last_buy_date)
values('1903189467481', 'MN Alam Siddique', 'Shopkeeper', 'Alea begum','01782542129','3561783263', 'Male', 12000, to_date('19-05-1992', 'dd-mm-yyyy'),4,34, '10', 'ali road', '001', '3', to_date('19-05-2022', 'dd-mm-yyyy'));

insert into customer_info(nid, name, occupation, spouse, mobile_no, tcb_card_no, gender, income, date_of_birth,no_of_family_members,age, holding_no, road, area_code,package_no, last_buy_date)
values('1903189467491', 'MN Alam Siddique', 'Shopkeeper', 'Alea begum','01782542129','3561783273', 'Male', 12000, to_date('19-05-1992', 'dd-mm-yyyy'),4,34, '10', 'ali road', '001', '3', to_date('15-07-2022', 'dd-mm-yyyy'));

insert into customer_info(nid, name, occupation, spouse, mobile_no, tcb_card_no, gender, income, date_of_birth,no_of_family_members,age, holding_no, road, area_code,package_no)
values('1903189467788', 'Mahdi Motasim', ' Non Govt employee', 'Marjina khatun','01780042548','3561789799', 'Male', 125000, to_date('13-08-1988', 'dd-mm-yyyy'),7,39, '100', 'bisso road', '004', '1');




insert into family_info(member_nid, member_name, member_occupation, member_income, nid)
values('1389241854182', 'Jaima Hasan', 'Student', '0', '1903189467218');

insert into family_info(member_nid, member_name, member_occupation, member_income, nid)
values('1389241854123', 'Rida Hasan', 'Student', '0', '1903189467218');

insert into family_info(member_nid, member_name, member_occupation, member_income, nid)
values('1382341854182', 'Brishti Begum', 'Housewife', '0', '1903189467451');

insert into family_info(member_nid, member_name, member_occupation, member_income, nid)
values('1382374564182', 'Mariam Begum', 'Govt job', '15000', '1903189467784');

insert into family_info(member_nid, member_name, member_occupation, member_income, nid)
values('1382374564183', 'Saleha Begum', 'Student', '0', '1903189467784');





insert into goods(item_name, unit_price)
values('Rice', 50);
insert into goods(item_name, unit_price)
values('Sugar', 60);
insert into goods(item_name, unit_price)
values('Soyabin Oil', 120);
insert into goods(item_name, unit_price)
values('Lentil', 70);
insert into goods(item_name, unit_price)
values('Onion', 30);
insert into goods(item_name, unit_price)
values('Potato', 15);


insert into cust_exp(nid, item_name, totalspent, buy_date, amount)
values('1903189467218', 'Rice', 200, to_date('31-12-2021', 'dd-mm-yyyy'), 3);

insert into cust_exp(nid, item_name, totalspent, buy_date, amount)
values('1903189467218', 'Soyabin Oil', 240, to_date('31-12-2021', 'dd-mm-yyyy'), 3);

insert into cust_exp(nid, item_name, totalspent, buy_date, amount)
values('1903189467451', 'Rice', 100, to_date('01-01-2022', 'dd-mm-yyyy'), 2);

insert into cust_exp(nid, item_name, totalspent, buy_date, amount)
values('1903189467451', 'Sugar', 60, to_date('01-01-2022', 'dd-mm-yyyy'), 1);

insert into cust_exp(nid, item_name, totalspent, buy_date, amount)
values('1903189467258', 'Soyabin Oil', 360, to_date('03-01-2022', 'dd-mm-yyyy'), 3);




insert into dealer_info(dealer_id, organization_name, organization_address, applicant_name, permanent_address, email, tin_number, date_of_birth)
values('123', 'AR Enterprise', '15,mollapara,dhaka', 'Saiful Islam', 'chargram, nandina, barisal', 'saiful123@gmail.com', '34251', to_date('12-10-1980', 'dd-mm-yyyy'));

insert into dealer_info(dealer_id, organization_name, organization_address, applicant_name, permanent_address, email, tin_number, date_of_birth)
values('122', 'Boltu Enterprise', 'Mirpur-1,dhaka', 'Boltu Islam', 'teengram, nandina, barisal', 'boltu123@gmail.com', '34255', to_date('18-11-1980', 'dd-mm-yyyy'));

insert into dealer_info(dealer_id, organization_name, organization_address, applicant_name, permanent_address, email, tin_number, date_of_birth)
values('121', 'Bikash Enterprise', 'Uttara,dhaka', 'Bikash Islam', 'Duigram, nandina, barisal', 'bikash123@gmail.com', '34252', to_date('18-12-1980', 'dd-mm-yyyy'));

insert into dealer_info(dealer_id, organization_name, organization_address, applicant_name, permanent_address, email, tin_number, date_of_birth)
values('120', 'Nahid Enterprise', 'Baridhara,Dhaka', 'Nahid Islam', 'Duigram, nandina, barisal', 'nahid123@gmail.com', '34257', to_date('18-12-1980', 'dd-mm-yyyy'));





insert into dealer_area(area_code, dealer_id)
values('001', '123');

insert into dealer_area(area_code, dealer_id)
values('002', '122');

insert into dealer_area(area_code, dealer_id)
values('003', '121');

insert into dealer_area(area_code, dealer_id)
values('004', '120');




insert into main_inventory(item_name, quantity, date_added, username)
values('Rice', 1000, to_date('14-06-2021', 'dd-mm-yyyy'), 'admin');

insert into main_inventory(item_name, quantity, date_added, username)
values('Sugar', 868, to_date('14-06-2021', 'dd-mm-yyyy'), 'admin');

insert into main_inventory(item_name, quantity, date_added, username)
values('Soyabin Oil', 1000, to_date('28-06-2021', 'dd-mm-yyyy'), 'admin');

insert into main_inventory(item_name, quantity, date_added, username)
values('Lentil', 1000, to_date('28-06-2021', 'dd-mm-yyyy'), 'admin');


insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Rice', 64, 123);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Suger', 56, 123);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Soyabin Oil', 100, 123);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('lentil', 101, 123);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Onion', 52, 123);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Potato', 100, 123);


insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Rice', 35, 122);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Suger', 92, 122);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Soyabin Oil', 18, 122);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('lentil', 22, 122);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Onion', 100, 122);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Potato', 55, 122);


insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Rice', 30, 121);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Suger', 100, 121);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Soyabin Oil', 10, 121);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('lentil', 100, 121);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Onion', 50, 121);

insert into dealer_inventory2(item_name, quantity, dealer_id)
values('Potato', 60, 121);

insert into dealer_inventory(item_name, date_added, quantity, dealer_id)
values('Rice', to_date('14-06-2021', 'dd-mm-yyyy'), 100, 122);

insert into dealer_inventory(item_name, date_added, quantity, dealer_id)
values('Rice', to_date('14-06-2021', 'dd-mm-yyyy'), 100, 123);

insert into dealer_inventory(item_name, date_added, quantity, dealer_id)
values('Rice', to_date('14-06-2021', 'dd-mm-yyyy'), 100, 121);

insert into dealer_inventory(item_name, date_added, quantity, dealer_id)
values('Rice', to_date('14-06-2021', 'dd-mm-yyyy'), 100, 120);

insert into dealer_inventory(item_name, date_added, quantity, dealer_id)
values('Soyabin Oil', to_date('14-06-2021', 'dd-mm-yyyy'), 100, 122);

insert into dealer_inventory(item_name, date_added, quantity, dealer_id)
values('Soyabin Oil', to_date('15-06-2021', 'dd-mm-yyyy'), 70, 123);

insert into dealer_inventory(item_name, date_added, quantity, dealer_id)
values('Soyabin Oil', to_date('14-06-2021', 'dd-mm-yyyy'), 100, 122);

insert into dealer_inventory(item_name, date_added, quantity, dealer_id)
values('Soyabin Oil', to_date('14-06-2021', 'dd-mm-yyyy'), 120, 121);

insert into dealer_inventory(item_name, date_added, quantity, dealer_id)
values('Soyabin Oil', to_date('14-06-2021', 'dd-mm-yyyy'), 60, 120);

insert into feedback(fname, femail, fsubject, fmessage)
values('Rafat', 'adreto.khan@gmail.com', 'Emni', 'Best website in town RN');

insert into feedback(fname, femail, fsubject, fmessage)
values('Nijami', 'Nijami.khan@gmail.com', 'kisuna', 'Glad to see this site published');


create or replace trigger dealer_record_trigger
before insert
on dealer_inventory2
for each row

begin

insert into dealer_inventory(item_name, date_added, quantity, dealer_id)
values(:new.item_name, sysdate, :new.quantity, :new.dealer_id);

end;

create or replace function lastbuy(x in date)
return number
as
today date;
var number;
begin
today:=sysdate;
select round(today-x) into var from dual;
return var;
end;