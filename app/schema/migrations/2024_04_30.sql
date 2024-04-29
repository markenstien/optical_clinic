alter table users
    add column user_preference char(10);


UPDATE users 
    set user_preference = 'staff'
        WHERE user_type = 'staff';

UPDATE users
    set user_preference = 'client'
        WHERE user_type in('patient','sub_patient')