CREATE TABLE
    users_service_specializations(
        id int(1) not null primary key auto_increment,
        user_id int(10),
        service_id tinyint,
        is_active boolean default true,
        created_at datetime DEFAULT now(),
        updated_at datetime 
    );3