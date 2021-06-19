
SELECT * 
FROM user_details
WHERE user_id = 'wal_12' AND user_password = '1234';

SELECT * 
FROM user_details
WHERE (

	SELECT to_char(dob,'DY') DAY_BIRTH
	FROM user_details
	WHERE to_char(dob,'DY')  like 'SUN'
)


SELECT SUM(duration)
FROM weekly_exercise_plan
WHERE plan_id = 21 AND day_id = (
SELECT TO_CHAR(SYSDATE,'DY') FROM DUAL
) ;


-- returns todays allocated exercise for plan id = 21 in order
SELECT * 
FROM weekly_exercise_plan
WHERE plan_id = 21 AND day_id = (
SELECT TO_CHAR(SYSDATE,'DY') FROM DUAL
) 
ORDER BY order_allocated;

-- returns TUESDAYS allocated exercise for plan id = 21 in order
SELECT * 
FROM weekly_exercise_plan
WHERE plan_id = 21 AND day_id = 'TUE' 
ORDER BY order_allocated;

-- returns total sum of duration of exercises on plan id = 21 for MONDAY
SELECT sum(duration) 
FROM weekly_exercise_plan
WHERE plan_id = 21 AND day_id = 'MON' 
ORDER BY order_allocated;

-- returns total sum of duration of exercises on plan id = 21 for MONDAY with calaries burned of both exercises
select exercise.exercise_NAME, weekly_exercise_plan.duration, exercise.cal_burn_rate, ( weekly_exercise_plan.duration *  exercise.cal_burn_rate) AS "Calories burned", weekly_exercise_plan.order_allocated, equipment.eq_name
FROM weekly_exercise_plan
LEFT OUTER JOIN exercise ON exercise.ex_id  = weekly_exercise_plan.exercise_id
LEFT OUTER JOIN equipment ON exercise.equipment_id = equipment.eq_id
WHERE plan_id = 21 AND day_id = 'MON' 
ORDER BY weekly_exercise_plan.order_allocated;


