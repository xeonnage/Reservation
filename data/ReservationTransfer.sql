DELIMITER $$
DROP TRIGGER IF EXISTS ReservationTransfer $$

CREATE TRIGGER ReservationTransfer
    AFTER INSERT ON Rooms
    FOR EACH ROW
BEGIN
    IF (NEW.AtNumberPreple>0) THEN
        UPDATE Rooms SET
        Balance = Balance - NEW.Amount
        WHERE ACC_No = NEW.ACC_No_Source COLLATE utf8_general_ci;

        UPDATE Rooms SET
        Balance = Balance + NEW.Amount
        WHERE ACC_No = NEW.ACC_No_Dest COLLATE utf8_general_ci;
    END IF;   


END $$
DELIMITER ;