# Stored procedures

use test;
	
DELIMITER //

create procedure sp_search(in keyword varchar(250), in user_type varchar(10))
begin
	if user_type = 'guest' then
		select PartName, PartNumber, Suppliers, Category, Description01 from carparts where 
			PartName like concat(concat('%', keyword), '%') or  PartNumber like concat(concat('%', keyword), '%') 
			or Suppliers like concat(concat('%', keyword), '%') or Category like concat(concat('%', keyword), '%')
			or Description01 like concat(concat('%', keyword), '%');
	elseif user_type = 'admin' then
		select * from carparts where 
			PartName like concat(concat('%', keyword), '%') or  PartNumber like concat(concat('%', keyword), '%') 
			or Suppliers like concat(concat('%', keyword), '%') or Category like concat(concat('%', keyword), '%')
			or Description01 like concat(concat('%', keyword), '%');
	else
		select 'Invalid user type';
	end if;
end
//
