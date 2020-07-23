username and password for admin:
username:admin
password:adminadmin

პროექტის გაშვება:
1) შექმენით ბაზა სახელით medclinic_db
2) შექმენით ცხრილი users :
id 		INT(11)		AUTO_INCREMENT 	
fullname 	varchar(50)	
username 	varchar(20)
email 		varchar(50) 	
password 	varchar(100) 
user_type 	varchar(20)	
create_at 	timestamp 
3) შექმენით ცხრილი doctors:
image 			varchar(200) 
Doctor_id  	int(11)  Primary   AUTO_INCREMENT 
doctor_name 	varchar(50)
Gender 	enum('Male', 'Female') 
Address 	varchar(50)
phonenumber 	varchar(15)
salary 	varchar(10) 
4) შექმენით ცხრილი patients:
patient_id 	int(11)	Primary	 AUTO_INCREMENT
fullname 	varchar(50)
address 	varchar(50)
Gender 	enum('Male', 'Female')
email 	varchar(50)
phonenumber 	varchar(15)
DOB 	date
info 	varchar(255)
5)იმისათვის რომ შევქმნათ admin, ხელით შევქმნათ User და ბაზაში გადავაკეთოთ user_type admin-ით. გამოიყენეთ ეს user დალოგინებისთვის და შესაძლებლობა გექნებათ სხვა user-ების შექმნის.