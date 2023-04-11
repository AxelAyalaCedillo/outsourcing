function init(){
    $('#coment_form').on("submit", function(e){
        guardar(e);
    });
}

function guardar(e){
    e.preventDefault();
    var formData =  new FormData($("#coment_form")[0]);
    if($('#coment').val() ==''){
        swal("Advertencia!", "El comentario no debe estar vacío", "warning");
    }else{
        $.ajax({
            url: "../../controller/usuario.php?op=guardarcomentario",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                console.log(datos);
                $('#coment').val('');
                swal("Correcto!", "Registrado Correctamente", "success");
            }
        });
    }
}

init();



