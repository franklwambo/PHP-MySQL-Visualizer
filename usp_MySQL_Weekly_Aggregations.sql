DELIMITER $$
CREATE PROCEDURE `Get_Weekly_SETS_Registrations`()
BEGIN
drop table if exists facility_list;
CREATE TEMPORARY TABLE facility_list AS
   SELECT *
   FROM (
select mflcode as Facility_Mflcode, facilityname as Facility_Name from sets_surveillance_r.config_facility
where mflcode IN (16792,16785,13473,14160,14093,13533,13947,13471,14042,17518,13966,18426,17516,16783)
UNION
select 'Total','' from sets_surveillance_r.config_facility
) as facility_list;
drop table if exists registration_count;
CREATE TEMPORARY TABLE registration_count
as
(
SELECT IFNULL(facility_mflcode,'Total') AS facility_mflcode, COUNT(system_id) AS total_registered from tbl_person 
where date_created BETWEEN DATE(NOW() - INTERVAL 7 DAY) AND DATE(NOW()) group by facility_mflcode WITH ROLLUP 
);
select fl.Facility_Mflcode,Facility_Name,IFNULL(total_registered, 0) as total_registered
from facility_list fl
LEFT JOIN registration_count rc
ON fl.Facility_Mflcode=rc.facility_mflcode
ORDER BY total_registered;
END$$
DELIMITER ;

