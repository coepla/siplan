use siplan2019;

delimiter $$
create procedure login (in u varchar(16),in c varchar(32))
begin
	SELECT COUNT(*) FROM usuarios WHERE usuario = u and password = c;
end $$
delimiter ;

delimiter $$
create procedure usuario_habilitado (in u varchar(16),in c varchar(32))
begin
	SELECT activo FROM usuarios WHERE usuario = u and password = c;
end $$
delimiter ;

delimiter $$
create procedure usuario_info (in u varchar(16),in c varchar(32))
begin
	SELECT id_usuario,id_perfil,id_dependencia FROM usuarios WHERE usuario = u and password = c;
end $$
delimiter ;

delimiter $$
create procedure historial (in u smallint, in e smallint,in i varchar(15) )
begin
    INSERT INTO historial (id_usuario,fecha,hora,evento,ipaddress) values (u, curdate(), curtime(), e, i);
	select true;
end $$
delimiter ;
