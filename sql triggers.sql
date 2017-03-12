use caretaker;
DELIMITER |
CREATE TRIGGER before_apartment_insert
BEFORE INSERT ON apartment 
FOR EACH ROW
BEGIN
SET NEW.dtstamp = UNIX_TIMESTAMP(NOW()); 
END |
DELIMITER ;
DELIMITER |
CREATE TRIGGER before_apartment_update
BEFORE UPDATE ON apartment 
FOR EACH ROW
BEGIN
set NEW.dateModified = UNIX_TIMESTAMP(NOW());
END |
DELIMITER ;