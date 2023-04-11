var todate = new Date();
function init(){
    $('#agendar_form').on("submit", function(e){
        agendar(e);
    });
}

function agendar(e){
    e.preventDefault();
    var formData =  new FormData($("#agendar_form")[0]);
    if($('#fecha').val() =='' && $('#hora').val() ==''){
        swal("Advertencia!", "La fecha y la hora no pueden estar vacías", "warning");
    }else{
        $.ajax({
            url: "../../controller/usuario.php?op=agendar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                console.log(datos);
                $('#fecha').val('');
                $('#hora').val('');
                swal("Correcto!", "Cita Registrada Correctamente", "success");
            }
        });
    }
}



init();