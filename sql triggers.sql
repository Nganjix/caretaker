use caretaker;
DELIMITER $$
CREATE TRIGGER after_tickedsettings_insert
AFTER INSERT ON tickedsettings FOR EACH ROW
BEGIN
update tickedsettings 
set NEW.dtstamp = UNIX_TIMESTAMP(NOW());
END $$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER after_tickedsettings_update
AFTER UPDATE ON tickedsettings FOR EACH ROW
BEGIN
update tickedsettings 
set NEW.datemodified = UNIX_TIMESTAMP(NOW());
END $$
DELIMITER ;


