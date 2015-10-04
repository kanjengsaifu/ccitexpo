use db_ccitexpo;
DELIMITER | 
CREATE TRIGGER tr_gamedetail AFTER INSERT
    ON db_ccitexpo.tb_gamedetail FOR EACH ROW
BEGIN
		declare indexAkhir int;
        declare id_game_db int;
        declare id_peserta_db int;
        set id_game_db = 0;
        set id_peserta_db = 0;
        set indexAkhir = (select id_gamedetail from tb_gamedetail order by id_gamedetail desc limit 1);
        set id_game_db = (select tb_game_id_game from tb_gamedetail where tb_peserta_id_peserta = NEW.tb_peserta_id_peserta AND tb_game_id_game = NEW.tb_game_id_game);
        set id_peserta_db = (select tb_game_id_game from tb_gamedetail where tb_peserta_id_peserta = NEW.tb_peserta_id_peserta AND tb_game_id_game = NEW.tb_game_id_game);
		IF ((id_game_db <= 0) AND (id_peserta_db <= 0)) then
			delete from tb_gamedetail where id_gamedetail = NEW.id_gamedetail;
		END IF;
END;
|
DELIMITER ; 

drop trigger tr_gamedetail

DELIMITER | 
CREATE TRIGGER tr_seminardetail AFTER INSERT
    ON db_ccitexpo.tb_seminardetail FOR EACH ROW
BEGIN
		declare indexAkhir int;
        declare id_seminar_db int;
        declare id_peserta_db int;
        set id_seminar_db = 0;
        set id_peserta_db = 0;
        set indexAkhir = (select id_seminardetail from tb_seminardetail order by id_seminardetail desc limit 1);
        set id_seminar_db = (select tb_seminar_id_seminar from tb_seminardetail where tb_peserta_id_peserta = NEW.tb_peserta_id_peserta AND tb_seminar_id_seminar = NEW.tb_seminar_id_seminar);
        set id_peserta_db = (select tb_peserta_id_peserta from tb_seminardetail where tb_peserta_id_peserta = NEW.tb_peserta_id_peserta AND tb_seminar_id_seminar = NEW.tb_seminar_id_seminar);
		IF ((id_seminar_db <= 0) AND (id_peserta_db <= 0)) then
			delete from tb_seminardetail where id_seminardetail = NEW.id_seminardetail;
		END IF;
END;
|
DELIMITER ; 

DELIMITER | 
CREATE TRIGGER tr_project AFTER INSERT
    ON db_ccitexpo.tb_project FOR EACH ROW
BEGIN
		declare indexAkhir int;
        declare id_peserta_db int;
        set id_peserta_db = 0;
        set indexAkhir = (select id_project from tb_project order by id_project desc limit 1);
        set id_peserta_db = (select id_peserta from tb_project where id_peserta = NEW.id_peserta);
		IF (id_peserta_db <= 0) then
			delete from tb_project where id_project = NEW.id_project;
		END IF;
END;
|
DELIMITER ; 