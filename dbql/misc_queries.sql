
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
FROM weekly_excercise_plan
WHERE plan_id = 21 AND day_id = (
SELECT TO_CHAR(SYSDATE,'DY') FROM DUAL
) ;

SELECT * 
FROM weekly_excercise_plan
WHERE plan_id = 21 AND day_id = (
SELECT TO_CHAR(SYSDATE,'DY') FROM DUAL
) 
ORDER BY order_allocated;