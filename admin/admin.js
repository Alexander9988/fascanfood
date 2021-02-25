window.onload = function(){

//Control para formulario de administrador

$("#btn_admin").on("click", function(e){

    if($("#admin_correo").val() == "" || $("#admin_pass").val() == ""){

        e.preventDefault();
        $(".alerta_admin").css({
            opacity : 1,
            color : "red"
        })

    }

});

//Código para focus

$(function(){

    $('a[href*=#]').click(function() {

        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
            && location.hostname == this.hostname) {

            var $target = $(this.hash);

            $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

            if ($target.length) {

                var targetOffset = $target.offset().top;

                $('html,body').animate({scrollTop: targetOffset}, 1000);

                return false;

            }

        }

    });

});




}