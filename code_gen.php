

function agregafuncion(idfinalidad){

    document.getElementById('funcion').length=0;
    document.getElementById('funcion').options[0] = new Option('-seleccione-','0');
    document.getElementById('subfuncion').length=0;
    document.getElementById('subfuncion').options[0] = new Option('-seleccione-','0');
    document.getElementById('id_finalidad').value = idfinalidad;
    switch(idfinalidad){
    <?php
require_once("seguridad/siplan_2017.php");
    for($x=1;$x<5;$x=$x+1){
        $b=1;

        echo "case \"$x\":\n";
        $consulta_funcion = mysql_query( " SELECT * FROM funcion where id_finalidad = $x",$siplan_data_conn )or die(mysql_error());
        while($resultado_funcion = mysql_fetch_array($consulta_funcion)){
            $id_funcion = $resultado_funcion['id_funf'];
            $funcion_desc =html_entity_decode($resultado_funcion['nombre']);
            echo  "document.getElementById('funcion').options[$b]=new Option ('$funcion_desc','$id_funcion');\n";
            $b = $b + 1;
        }

        mysql_free_result($consulta_funcion);
        echo "break;\n";
    }
    ?>
    }
}

function agregasubfuncion(idfuncion){

    document.getElementById('subfuncion').length=0;
    document.getElementById('subfuncion').options[0] = new Option('-seleccione-','0');
    var idfinalidad = document.getElementById('id_finalidad').value;
    var clave_subfondo = idfinalidad+idfuncion;

    switch(clave_subfondo){
    <?php

    for($x=1;$x<5;$x=$x+1){

        for($a=1;$a<10;$a=$a+1){
            $b=1;
            $consulta_subfuncion = mysql_query( " SELECT * FROM subfuncion where id_finalidad = $x and id_funcion_f = $a",$siplan_data_conn )or die(mysql_error());
            $encontrados_subf = mysql_num_rows($consulta_subfuncion);
            if($encontrados_subf>0){
                $identificador = $x."".$a;
                echo "case \"$identificador\":\n";
                while($resultado_subfuncion = mysql_fetch_array($consulta_subfuncion)){
                    $id_subfuncion = $resultado_subfuncion['id_subfuncion'];
                    $subfuncion_desc = html_entity_decode($resultado_subfuncion['nombre']);
                    echo  "document.getElementById('subfuncion').options[$b]=new Option ('$subfuncion_desc','$id_subfuncion');\n";
                    $b = $b + 1;
                }
                mysql_free_result($consulta_subfuncion);
                echo "break;\n";
            }
        }
    }
    ?>
    }
}