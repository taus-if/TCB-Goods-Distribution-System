--package query
select * from package where package_no='1'
--customer info query
select tcb_card_no "TCB Card NO.",area_code "Area CODE",package_no "Package",name "Name",gender "Sex" ,age "Age"
    from customer_info;
--dealer query
SELECT di.dealer_id,organization_name,applicant_name,email,tin_number,da.area_code
    from dealer_info di, dealer_area da, distribution_area dia
    where di.dealer_id=da.dealer_id AND da.area_code=dia.area_code

--Family query
SELECT member_nid, member_name, member_occupation, member_income, family_info.nid, customer_info.name from family_info,customer_info
where family_info.nid=customer_info.nid;

--total query
SELECT ci.tcb_card_no "TCB Card NO.",ci.area_code "Area CODE",ci.package_no "Package",ci.name "Name",ci.gender "Sex" ,ci.age "Age",ce.totalspent "Total Spending Money",g.item_name"Items" ,di.dealer_id "Dealer ID" ,di.applicant_name "Dealer Name"

    FROM admin a, package p, dealer_area da, items_distributed id, dealer_info di, customer_expenditure ce, goods g, family_info fi, customer_info ci, distribution_area dia
        
    WHERE fi.member_nid=ci.nid AND ci.nid=ce.nid AND ce.item_name=g.item_name AND g.item_name=id.item_name AND 
        id.dealer_id=di.dealer_id AND di.dealer_id=da.dealer_id AND da.area_code=dia.area_code AND dia.area_code=ci.area_code
        AND ci.package_no=p.package_no ;
    
 
SELECT name "NAME",ci.area_code "Area CODE",ci.holding_no "Holding no",ci.road "Road no",ward_no "Ward",d_union "Union",upazilla "Upazilla",district "District"
from customer_info ci, distribution_area da
where ci.area_code=da.area_code;

--Dealer Area and name
SELECT d.dealer_id "ID",organization_name "Oranization Name",applicant_name "Dealer Name" ,dia.area_code "Area Code",ward_no "Ward",d_union "Union",upazilla "Upazilla",district "District"
from dealer_info di, distributed_area dia 
WHERE di.dealer_id=dealer_area.dealer_id and dealer_area.area_code=dia.area_code;
