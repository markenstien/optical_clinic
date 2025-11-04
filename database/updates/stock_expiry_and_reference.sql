alter table stocks
     add column expiry_date date,
     add column stock_reference char(12);


alter table stocks
     add column meta_status char(25);