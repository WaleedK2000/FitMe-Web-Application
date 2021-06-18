DROP TABLE user_details CASCADE CONSTRAINTS;
DROP TABLE equipment CASCADE CONSTRAINTS;
DROP TABLE plan CASCADE CONSTRAINTS;
DROP TABLE exercise CASCADE CONSTRAINTS;
DROP TABLE weekly_exercise_plan CASCADE CONSTRAINTS;
DROP TABLE planned_intake CASCADE CONSTRAINTS;
DROP TABLE Daily_log CASCADE CONSTRAINTS;
DROP TABLE exercise_log CASCADE CONSTRAINTS;


CREATE TABLE user_details (
	user_id VARCHAR(30) NOT NULL PRIMARY KEY,
  	user_password VARCHAR(30),
	first_name VARCHAR(45),
	last_name VARCHAR(45),
	email VARCHAR(250),
	tel_num VARCHAR(15),
	dob DATE,
	height NUMBER,
	weight NUMBER
);

CREATE TABLE equipment(
	eq_id NUMBER NOT NULL PRIMARY KEY,
	eq_name VARCHAR2(25)
);


CREATE TABLE plan
(
	plan_id NUMBER NOT NULL PRIMARY KEY,
	user_id VARCHAR(30),
CONSTRAINT user_id_fk FOREIGN KEY (user_id) REFERENCES user_details(user_id)
);

CREATE TABLE exercise
(
	ex_id NUMBER NOT NULL PRIMARY KEY,
	exercise_NAME VARCHAR(30),
	cal_burn_rate NUMBER,
	equipment_id NUMBER,
	CONSTRAINT FK_equipment_id FOREIGN KEY (equipment_id) REFERENCES equipment(eq_id)
);

CREATE TABLE weekly_exercise_plan(
	plan_id NUMBER NOT NULL ,
	day_id VARCHAR2(3) NOT NULL,
	exercise_id NUMBER,
	order_allocated NUMBER,
	duration NUMBER,
	CONSTRAINT FK_plan_id FOREIGN KEY (plan_id) REFERENCES plan(plan_id),
	CONSTRAINT FK_exercise_id FOREIGN KEY (exercise_id) REFERENCES exercise(ex_id),
	CONSTRAINT w_ex_plan_id_pk PRIMARY KEY (plan_id, day_id,exercise_id)
);

CREATE TABLE planned_intake
(
plan_id NUMBER,
day_id VARCHAR2(3),
calorie_assigned NUMBER,
CONSTRAINT fk_planid FOREIGN KEY (plan_id) REFERENCES plan(plan_id)
);

CREATE TABLE Daily_log
(
user_id VARCHAR(30),
log_date DATE,
weight NUMBER,
intake NUMBER,
CONSTRAINT FK_user_id FOREIGN KEY (user_id) REFERENCES user_details(user_id)
);


CREATE TABLE exercise_log
(
user_id VARCHAR(30) NOT NULL,
exercise_date DATE NOT NULL,
exercise_id NUMBER,
duration NUMBER,
 CONSTRAINT fk_userdetails_id FOREIGN KEY (user_id) REFERENCES user_details(user_id),
 CONSTRAINT FK_ex_id FOREIGN KEY (exercise_id) REFERENCES exercise(ex_id),
 CONSTRAINT ex_log_pk PRIMARY KEY (user_id, exercise_date)
);
