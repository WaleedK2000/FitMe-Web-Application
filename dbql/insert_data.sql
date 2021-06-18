INSERT INTO user_details (user_id,user_password,first_name,last_name,email,tel_num,dob,height,weight)  VALUES (
	'wal_12',
	'1234',
	'Waleed',
	'Kha',
	'wal@wal.com',
	'0312581741',
	TO_DATE('17/12/2000' , 'DD/MM/YYYY'),
	180,
	85
);

INSERT INTO equipment VALUES (
	100,
	'None'
);

INSERT INTO equipment VALUES (
	101,
	'Dumbells'
);



INSERT INTO plan VALUES (
        21,
        'wal_12'
);

INSERT INTO exercise VALUES (
        250,
        'Push-Ups',
        25,
        100
);


INSERT INTO exercise VALUES (
        251,
        'Planks',
        25,
        100
);

INSERT INTO weekly_exercise_plan VALUES (
        21,
        'MON',
        250,
        2,
        200
);

INSERT INTO weekly_exercise_plan VALUES (
        21,
        'MON',
        251,
        1,
        250
);

INSERT INTO weekly_exercise_plan VALUES (
        21,
        'TUE',
        250,
        1,
        300
);

INSERT INTO weekly_exercise_plan VALUES (
        21,
        'SAT',
        250,
        1,
        400
);

INSERT INTO weekly_exercise_plan VALUES (
        21,
        'SAT',
        251,
        2,
        300
);

INSERT INTO 

//new

 INSERT INTO user_details VALUES (
	'kk12',
	'1234',
	'Waleed',
	'Kha',
	'wal@wal.com',
	'0312581741',
	TO_DATE('17/12/2000' , 'DD/MM/YYYY'),
	180,
	85
);

INSERT INTO daily_log (user_id,weight,intake)
VALUES(
	'kk12',
	55,
	2500
);

INSERT INTO weekly_exercise_plan (user_id,weight,intake)
VALUES(
	'kk12',
	55,
	2500
);


//Trigger to automatically enter log_date
CREATE OR REPLACE TRIGGER trg_daily_log_autodate 
BEFORE INSERT ON daily_log
FOR EACH ROW
BEGIN
:new.log_date := sysdate;
END;
/





