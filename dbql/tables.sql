
DROP TABLE user_details CASCADE CONSTRAINTS;
DROP TABLE equipment CASCADE CONSTRAINTS;
DROP TABLE plan CASCADE CONSTRAINTS;
DROP TABLE excercise CASCADE CONSTRAINTS;
DROP TABLE weekly_excercise_plan CASCADE CONSTRAINTS;

CREATE TABLE user_details (
	user_id VARCHAR(30),
  	user_password VARCHAR(30),
	first_name VARCHAR(45),
	last_name VARCHAR(45),
	email VARCHAR(250),
	tel_num VARCHAR(15),
	dob DATE,
	height NUMBER
);

CREATE TABLE equipment(
	eq_id NUMBER,
	eq_name VARCHAR2(25)
);


CREATE TABLE plan(
	plan_id NUMBER,
	created_by VARCHAR2(30)
);

CREATE TABLE excercise(
	excercise_id NUMBER,
	excercise_NAME VARCHAR(30),
	cal_burn_rate NUMBER,
	equipment_id NUMBER
);

CREATE TABLE weekly_excercise_plan(
	plan_id NUMBER,
	day_id VARCHAR2(3),
	exercise_id NUMBER,
	order_allocated NUMBER,
	duration NUMBER
);



