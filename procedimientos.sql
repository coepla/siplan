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
	SELECT 
	us.id_usuario,
    us.id_perfil,
    us.id_dependencia,
    dep.nombre,
    dep.acronimo
	FROM 
	usuarios us
	inner join dependencias dep on (us.id_dependencia = dep.id_dependencia) 
	WHERE us.usuario = u and password = c;
end $$
delimiter ;

delimiter $$
create procedure historial_login (in u smallint, in e smallint,in i varchar(15) )
begin
    INSERT INTO historial (id_usuario,fecha,hora,evento,ipaddress,identificador) values (u, curdate(), curtime(), e, i, 0);
	select true;
end $$
delimiter ;

delimiter $$
CREATE PROCEDURE guardar_ppp 
	(in p_no_proyecto smallint(6), in p_nombre text, in p_prioritario tinyint(1), in p_prog_pres tinyint(2),in p_uresponsable varchar(128),in p_titular varchar(256),in p_eje tinyint(1),
     in p_linea tinyint(2),in p_estrategia smallint(3),in p_pnd_eje tinyint(1),in p_pnd_objetivo tinyint(2),in p_pnd_estrategia smallint(3),in p_pnd_linea smallint(3),
     in p_ponderacion float,in p_proposito text,in p_diagnostico text,in p_gvulnerable tinyint(2),in p_ben_h int(11),in p_ben_m int(11),in p_u_medida varchar(128),in p_prog_anual float,
     in p_p_semestral float,in p_finalidad tinyint(1),in p_funcion tinyint(2),in p_subfuncion smallint(3),in p_observaciones text,in p_dependencia int(11),in h_usuario smallint,in h_ip varchar(10))
begin
-- Insertamos la info en la tabla general de proyectos
INSERT INTO proyectos (
		id_dependencia,id_eje, id_linea, id_estrategia, estatus, grado, no_proyecto, nombre, clasificacion, inversion, ponderacion, unidad_medida,cantidad, prog_sem, 
g_vulnerable, beneficiarios_h, beneficiarios_m, justificacion,  finalidad, funcion, subfuncion, proposito, observaciones, anual_pr, uresponsable, titular, objetivo,
pnd_eje, pnd_objetivo, pnd_estrategia, pnd_linea_accion, prog_pres
)
VALUES (p_dependencia,p_eje,p_linea,p_estrategia,0,0,p_no_proyecto,p_nombre,1,0,p_ponderacion,p_u_medida,p_prog_anual,p_p_semestral, p_gvulnerable,p_ben_h,p_ben_m,
p_diagnostico,p_finalidad,p_funcion,p_subfuncion,p_proposito,p_observaciones,2019,p_uresponsable,p_titular,'',p_pnd_eje,p_pnd_objetivo,p_pnd_estrategia,p_pnd_linea,p_prog_pres);
-- insertamos informacion en la tabla de proyectos prioritarios
set @insertado = last_insert_id();
insert into proyectos_ppp (id_proyecto,nom_proyecto_ppp) values (@insertado,p_nombre);
insert into historial (id_usuario,fecha,hora,evento,ipaddress,identificador) values (h_usuario,curdate(),curtime(),6,h_ip,@insertado);

end $$
delimiter ;

delimiter $$
CREATE PROCEDURE guardar_ppi 
	(in p_no_proyecto smallint(6), in p_nombre text, in p_prioritario tinyint(1), in p_prog_pres tinyint(2),in p_uresponsable varchar(128),in p_titular varchar(256),in p_eje tinyint(1),
     in p_linea tinyint(2),in p_estrategia smallint(3),in p_pnd_eje tinyint(1),in p_pnd_objetivo tinyint(2),in p_pnd_estrategia smallint(3),in p_pnd_linea smallint(3),
     in p_ponderacion float,in p_proposito text,in p_diagnostico text,in p_gvulnerable tinyint(2),in p_ben_h int(11),in p_ben_m int(11),in p_u_medida varchar(128),in p_prog_anual float,
     in p_p_semestral float,in p_finalidad tinyint(1),in p_funcion tinyint(2),in p_subfuncion smallint(3),in p_observaciones text,in p_dependencia int(11),in h_usuario smallint,in h_ip varchar(10))
begin
-- Insertamos la info en la tabla general de proyectos
INSERT INTO proyectos (
		id_dependencia,id_eje, id_linea, id_estrategia, estatus, grado, no_proyecto, nombre, clasificacion, inversion, ponderacion, unidad_medida,cantidad, prog_sem, 
g_vulnerable, beneficiarios_h, beneficiarios_m, justificacion,  finalidad, funcion, subfuncion, proposito, observaciones, anual_pr, uresponsable, titular, objetivo,
pnd_eje, pnd_objetivo, pnd_estrategia, pnd_linea_accion, prog_pres
)
VALUES (p_dependencia,p_eje,p_linea,p_estrategia,0,0,p_no_proyecto,p_nombre,0,0,p_ponderacion,p_u_medida,p_prog_anual,p_p_semestral, p_gvulnerable,p_ben_h,p_ben_m,
p_diagnostico,p_finalidad,p_funcion,p_subfuncion,p_proposito,p_observaciones,2019,p_uresponsable,p_titular,'',p_pnd_eje,p_pnd_objetivo,p_pnd_estrategia,p_pnd_linea,p_prog_pres);
-- insertamos informacion en la tabla de proyectos prioritarios

set @insertado = last_insert_id();
insert into proyectos_ppi (id_proyecto,nom_proyecto_ppi) values (@insertado,p_nombre);
insert into historial (id_usuario,fecha,hora,evento,ipaddress,identificador) values (h_usuario,curdate(),curtime(),5,h_ip,@insertado);

end $$
delimiter ;

delimiter $$
create procedure contar_indicadores_pp (in id_proyecto int(11))
begin
set @c_indicadores_fin = (select count(*) from indicadores_fin WHERE id_pp = id_proyecto);
set @c_indicadores_proposito = (select count(*) from indicadores_proposito WHERE id_pp = id_proyecto);
select (@c_indicadores_fin + @c_indicadores_proposito);
end $$
delimiter ;


delimiter $$
create procedure guarda_indicador_fin (
in i_id_pp int(11),
in i_nombre varchar(256),
in i_objetivo text,
in i_metodo text,
in i_tipo tinyint,
in i_dimension tinyint,
in i_frecuencia tinyint,
in i_sentido tinyint,
in i_u_medida varchar(256),
in i_meta varchar(16),
in i_medio text,
in i_supuesto text,
in i_linea varchar(45)
)
begin
	INSERT INTO indicadores_fin 
    (
		id_pp,
        nombre,
		objetivo,
        metodo,
        tipo,
        dimension,
        frecuencia,
        sentido,
        u_medida,
        meta,
        medio_verificacion,
        supuesto,
        linea_base
        )
    VALUES
    (i_id_pp,
i_nombre,
i_objetivo,
i_metodo,
i_tipo,
i_dimension,
i_frecuencia,
i_sentido,
i_u_medida,
i_meta,
i_medio,
i_supuesto,
i_linea);
end $$
delimiter ;


delimiter $$
create procedure agregar_indicador( in i_nivel_indicador tinyint, in i_proyecto smallint, in i_componente smallint, in i_actividad smallint, in i_nombre varchar(256), in i_objetivo text,
in i_metodo tinyint, in i_tipo tinyint, in i_dimension tinyint, in i_frecuencia tinyint, in i_sentido tinyint, in i_u_medida varchar(256), in i_meta varchar(16), in i_linea varchar(16),
in i_medio text, in i_supuesto text, in i_var1 varchar(256), in i_var2 varchar(256), in i_var3 varchar(256), in i_var4 varchar(256), in i_var5 varchar(256), in i_var6 varchar(256),
in i_usuario smallint, in i_ip varchar(10) )
begin
	insert into indicadores
    (nivel_indicador, id_proyecto, id_componente, id_actividad, nombre, objetivo, metodo, tipo, dimension, frecuencia, sentido, u_medida, meta, linea_base, medio_verificacion, supuesto)
    values
    (i_nivel_indicador, i_proyecto, i_componente, i_actividad, i_nombre, i_objetivo, i_metodo, i_tipo, i_dimension, i_frecuencia, i_sentido, i_u_medida, i_meta, i_linea_base, i_medio_verificacion, i_supuesto);
    set @insertado = last_insert_id();
    insert into variables_indicadores (id_indicador,var1,var2,var3,var4,var5,var6) values (@insertado,i_var1,i_var2,i_var3,i_var4,i_var5,i_var6);
    insert into historial (id_usuario,fecha,hora,evento,ipaddress,identificador) values (i_usuario,curdate(),curtime(),15,i_ip,@insertado);
end;
delimiter $$
