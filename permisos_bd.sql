-- CREATE USER 'siplan2019_USR'@'localhost' IDENTIFIED BY '99yH8}@(pw$E2je)';
GRANT ALL PRIVILEGES ON siplan2019.* TO 'siplan2019_USR'@'localhost';
-- CREATE USER 'siplan2019_sel'@'localhost' IDENTIFIED BY ';J&f_vP]9T2yMghr';
GRANT SELECT ON siplan2019.* TO 'siplan2019_sel'@'localhost';
GRANT EXECUTE ON PROCEDURE siplan2019.login TO 'siplan2019_sel'@'localhost';
GRANT EXECUTE ON PROCEDURE siplan2019.usuario_habilitado TO 'siplan2019_sel'@'localhost';
GRANT EXECUTE ON PROCEDURE siplan2019.usuario_info TO 'siplan2019_sel'@'localhost';
-- CREATE USER 'siplan2019_ins'@'localhost' IDENTIFIED BY '|.aLw%LdzO%<,w#';
GRANT SELECT ON siplan2019.* TO 'siplan2019_ins'@'localhost';
GRANT INSERT ON siplan2019.* TO 'siplan2019_ins'@'localhost';
GRANT EXECUTE ON PROCEDURE siplan2019.historial TO 'siplan2019_ins'@'localhost';
Flush privileges;
