INSERT INTO user_details VALUES (
	'wal_12',
	'1234',
	'Waleed',
	'Kha',
	'wal@wal.com',
	'0312581741',
	TO_DATE('17/12/2000' , 'DD/MM/YYYY'),
	180
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

INSERT INTO excercise VALUES (
        250,
        'Push-Ups',
        25,
        100
);


INSERT INTO excercise VALUES (
        251,
        'Planks',
        25,
        100
);

INSERT INTO weekly_excercise_plan VALUES (
        21,
        'MON',
        250,
        2,
        200
);

INSERT INTO weekly_excercise_plan VALUES (
        21,
        'MON',
        251,
        1,
        250
);

INSERT INTO weekly_excercise_plan VALUES (
        21,
        'TUE',
        250,
        1,
        300
);

INSERT INTO weekly_excercise_plan VALUES (
        21,
        'SAT',
        250,
        1,
        400
);

INSERT INTO weekly_excercise_plan VALUES (
        21,
        'SAT',
        251,
        2,
        300
);