function cargar_variables(v){
    'use strict';
    console.log(v);
    if (v == 1 || v == 2 || v == 3 || v == 5 || v == 7 || v == 8 || v == 9 || v == 11){
        document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required><label for='var2'>Nombre de variable 2:</label><input type='text' id='var2' name='var2' class='form-control'  required>";
    }

    if (v == 4){
        document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required><label for='var2'>Nombre de variable 2:</label><input type='text' id='var2' name='var2' class='form-control'  required><label for='var3'>Nombre de variable 3:</label><input type='text' id='var3' name='var3' class='form-control'  required>";
    }

      if (v == 6){
        document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required>";
    }

       if (v == 10){
        document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required><label for='var2'>Nombre de variable 2:</label><input type='text' id='var2' name='var2' class='form-control'  required><label for='var3'>Nombre de variable 3:</label><input type='text' id='var3' name='var3' class='form-control'  required><label for='var4'>Nombre de variable 4:</label><input type='text' id='var4' name='var4' class='form-control'  required>";
    }

}
