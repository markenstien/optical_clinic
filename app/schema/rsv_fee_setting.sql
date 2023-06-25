create table reservation_fee_setting(
	id int(10) not null primary key auto_increment,
	display_name varchar(100) DEFAULT 'RESERVATION CONVINIENCE FEE',
	amount_fee decimal(10,2),
	is_active boolean default true,
	description text,
	last_updated timestamp default now() ON UPDATE now()
);


insert into reservation_fee_setting(
	amount_fee,
	description
)VALUES(20.00, 'Reservation Fee payment');