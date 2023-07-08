drop table if exists orders;
create table orders(
	id int(10) not null primary key auto_increment,
	tmp_token varchar(50),
	order_reference varchar(100),
	customer_name varchar(100),
	customer_number varchar(100),
	customer_email varchar(100),
	customer_address text,

	initial_amount decimal(10,2),
	current_balance decimal(10,2),
	
	discount_amount decimal(10,2),
	discount_type varchar(100),
	discount_notes varchar(100),

	customer_id int(10) comment 'fill only if customer user exists',
	user_id int(10) not null comment 'processed by',
	created_at timestamp default now(),
	updated_at timestamp default now() ON UPDATE now()
);



create table order_items(
	id int(10) not null primary key auto_increment,
	order_id int(10),
	item_id int(10),
	purchased_amount decimal(10,2),
	quantity tinyint
);