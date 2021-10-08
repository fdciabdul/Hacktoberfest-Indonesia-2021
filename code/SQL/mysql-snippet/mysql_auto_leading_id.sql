/* TRX1409240002 */

SELECT 
	CONCAT(
		'TRX',
		DATE_FORMAT(CURDATE(), '%y%m%d'),
		IF(
			SUBSTR(MAX(id),8,2) = DATE_FORMAT(CURDATE(), '%d'),
			LPAD(
				SUBSTR(MAX(id),10,4) + 1,
				4,
				0
			),
			'0001'
		)
	) AS id
FROM 
	t_penjualan
