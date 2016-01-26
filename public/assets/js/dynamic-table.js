$(document).ready(function(){
    contador = 1;
    $('#add_row').click(function(){
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><select name="id_producto[]" id="id_producto'+contador+'" class="form-control"><option value="0">Seleccione Insumo</option>'+getInsumos(contador)+'</select></td>';
        
        cols += '<td><input type="text" class="form-control cantidad" name="cantidad[]" id="cantidad'+contador+'"/></td>';

        cols += '<td><input type="text" class="form-control precio" name="precio[]" id="precio'+contador+'"/></td>';

        cols += '<td><input type="text" class="form-control subtotal_prod" name="subtotal_prod[]" id="subtotal_prod'+contador+'" readonly="readonly"/></td>';

        cols += '<td><button type="button" id="ibtnDel" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button></td>';
        newRow.append(cols);

        $("#tabla").append(newRow);
        contador++;
    });
    //funcion para obtener las razas y añadirlos al select
    var getInsumos = function(cont){      
        $.get(baseurl+'/buscar/insumos', function(data){
            $.each(data, function(i,e){
                $('#id_producto'+cont).append('<option value="'+e.id+'">'+e.nombre+'</option>');

            });
        });        
    }

    //Detecta que se le ha dado click al bonton con id=ibtnDel
    $("#tabla").on("click", "#ibtnDel", function (event) {
        $(this).closest("tr").remove();

        calcularSub();
        $('#impuesto').val('');
        $('#descuento').val('');
        $('#total').val('');
    });

    //Detecta cuando se escribe en el campo cantidad
    $("#tabla").on("keyup", '.cantidad', function (event) {

        var cantidad = $(this).val();        
        var id_cant = $(this).attr('id');
        var precio = $('#precio'+id_cant.slice(-1)).val();
        
        esEntero(cantidad); //valida si es entero
        //calcula el subtotal del producto
        //envia la cantidad, el precio y el ultimo caracter del id enviado.
        calcular(cantidad, precio, id_cant.slice(-1)); 
        calcularSub();
    });

    //Detecta cuando se escribe en el campo precio
    $("#tabla").on("keyup", '.precio', function (event) {

        var precio = $(this).val();
        var id_precio = $(this).attr('id');
        var cantidad = $('#cantidad'+id_precio.slice(-1)).val();

        esNumero(precio); //valida que sea numero
        //calcula el subtotal del producto
        //envia la cantidad, el precio y el ultimo caracter del id enviado.
        calcular(cantidad, precio, id_precio.slice(-1)); 
        calcularSub();
    });

    $('#tabla').on('keyup', '#impuesto', function(){

        impuesto = $(this).val()/100; 
        total_impuesto = $('#subtotal').val() * impuesto;
        total = parseFloat($('#subtotal').val()) + total_impuesto;
        $('#total').val(total.toFixed(2));
    });

    $('#tabla').on('change', '#descuento', function(){

        descuento = $(this).val()/100;         
        total_descuento = $('#total').val() * descuento;
        total = parseFloat($('#total').val()) - total_descuento;
        $('#total').val(total.toFixed(2));
    });
});

//Comprueba que el valor es entero
function esEntero(numero){
    //valido si es numero
   if (isNaN(numero)){
        alert ("Solo ingrese numeros");
    }else{
        if (numero % 1 == 0) {
            return true;
        }
        else{
            alert ("No se permite decimales");
        }   
    }
}
//Comprueba si es numero lo que se escribe
function esNumero(numero){
    if (isNaN(numero)){
        alert ("Solo ingrese numeros");
    }
}

//calcula los campos de la fila
function calcular(val1, val2, id){
    var subtotal = 0;
    var subtotal_prod, resultado; 

    subtotal_prod = val1 * val2;

    $('#subtotal_prod'+id).val(subtotal_prod.toFixed(2));

}

//Calcula el subtotal
function calcularSub(){
    var subtotal = 0;
    $("table#tabla").find('.subtotal_prod').each(function () {
       subtotal += +$(this).val();
    });

    $('#subtotal').val(subtotal.toFixed(2));
    $('#total').val(subtotal.toFixed(2));
}
