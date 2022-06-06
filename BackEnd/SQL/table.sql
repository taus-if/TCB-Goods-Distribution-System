drop table dealer_area;
drop table items_distributed;
drop table dealer_info;
drop table customer_expenditure;
drop table goods;
drop table family_info;
drop table customer_info;
drop table distribution_area;
drop table package;
drop table admin;

create table admin
(
    username varchar2(40) primary key,
    password varchar2(40)
);

insert into admin(username, password) values('admin', 'admin');

create table package(
    package_no varchar2(8),
    item_name varchar2(30),
    amount varchar2(30)
    --constraint package_package_no_pk primary key(package_no)
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
    constraint customer_info_nid_pk primary key(nid),
    constraint customer_info_area_code_fk foreign key(area_code) references distribution_area(area_code) on delete cascade
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
    constraint goods_item_name_pk primary key(item_name)
);

create table customer_expenditure(
    nid varchar2(20),
    item_name varchar2(20),
    totalspent number(10,3),
    last_buy_date date,
    amount number(3,0),

    constraint customer_expenditure_nid_fk foreign key(nid) references customer_info(nid) on delete cascade,
    constraint customer_expenditure_item_name_fk foreign key(item_name) references goods(item_name)
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

    constraint dealer_info_dealer_id_pk primary key(dealer_id) 
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





