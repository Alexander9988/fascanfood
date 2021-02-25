$(document).ready(function(){

    var control = false;
    controlCarritoDisplay(control);

    $('.slider_banner').bxSlider({
        mode : "horizontal",
        pager : false,
        speed: 850,
        easing: "linear",
        auto: true

    });

    $(".bx-prev").addClass("wow rollIn")
    $(".bx-next").addClass("wow rollIn")

    new WOW().init();

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


    //Código para barra animada

    $(window).scroll(function(){
        if (screen.width > 1024){
            if($(window).scrollTop() > 0){

                $("header").css({
                    "transform" : "translate(0, -60px)"
                })

                if (!$("header").hasClass("barra_reducida")) $("header").addClass("barra_reducida");

                if ($("header").hasClass("barra_ampliada")) $("header").removeClass("barra_ampliada");
            } 

            if($(window).scrollTop() < 150){


                $("header").css({
                    "transform" : "translate(0, 0)"
                })

                if ($("header").hasClass("barra_reducida") )$("header").removeClass("barra_reducida");

                if (!$("header").hasClass("barra_ampliada")) $("header").addClass("barra_ampliada");
            }    
        }

        if (screen.width <= 1024){
            if($(window).scrollTop() > 0){

                $(".cabecera-2").css({
                    "box-shadow" : "0 0 20px 0px #000"
                });
            } 

            if($(window).scrollTop() < 150){

                $(".cabecera-2").css({
                    "box-shadow" : "none"
                });

            }
        }
    });

    


    //Control de mensaje de carrito

    function controlCarritoDisplay(control){

        $(".carrito img").on("click", function(){

            if (control == false){

                $(".carrito_mensaje").css({
                    "opacity" : "1"
                });
                control = true;
                controlCarritoDisplay(control);

            } else {

                $(".carrito_mensaje").css({
                    "opacity" : "0"
                });

                control = false;
                controlCarritoDisplay(control);

            }
        });
    }

    //Control de añadir menú sin loggear

    $(".anadir").click(function(e){

        e.preventDefault();

        if($(this).attr("href") == "#"){

            if(window.confirm("No ha inciado sesión.\nAcepte para iniciar sesión o cancele para seguir navegando.")
              ){
                window.location.href = 'users/inicio.php';
            };

        } 
    });



    //Control para inicio de sesión

    $("#btn_inicio").on("click", function(e){

        if($("#usuario_correo").val() == ""){
            e.preventDefault();

            $(".alerta_correo").css({
                opacity: "1",
                color: "red"
            });

        }else if($("#usuario_pass").val() == ""){

            e.preventDefault();
            $(".alerta_correo").css({
                opacity: "0",
                color: "red"
            });

            $(".alerta_pass").css({
                opacity: "1",
                color: "red"
            });

        } else {
            $(".alerta_pass").css({
                opacity: "0",
                color: "red"
            });
        }      

    });

    //Control para registro de usuarios

    $("#btn_registro").on("click", function(e){

        if($("#reg_usuario_nombre").val() == ""){

            e.preventDefault();
            $(".alerta_reg_nombre").css({
                opacity : "1",
                color: "red"
            });

        } else if($("#reg_usuario_apellidos").val() == ""){

            e.preventDefault();
            $(".alerta_reg_nombre").css({
                opacity : "0",
                color: "red"
            });

            $(".alerta_reg_apellidos").css({
                opacity : "1",
                color: "red"
            });

        } else if($("#reg_usuario_correo").val() == ""){

            e.preventDefault();
            $(".alerta_reg_apellidos").css({
                opacity : "0",
                color: "red"
            });

            $(".alerta_reg_correo").css({
                opacity : "1",
                color: "red"
            });

        } else if($("#reg_usuario_pass").val() == ""){

            e.preventDefault();
            $(".alerta_reg_correo").css({
                opacity : "0",
                color: "red"
            });

            $(".alerta_reg_pass").css({
                opacity : "1",
                color: "red"
            });

        } else if($("#reg_usuario_pass_con").val() == ""){

            e.preventDefault();
            $(".alerta_reg_pass").css({
                opacity : "0",
                color: "red"
            });

            $(".alerta_reg_pass_con").css({
                opacity : "1",
                color: "red"
            });

        } else if($("#reg_usuario_pass_con").val() != $("#reg_usuario_pass").val()){

            e.preventDefault();
            $(".alerta_reg_passs_con").css({
                opacity : "0",
                color: "red"
            });

            $(".alerta_reg_pass_con2").css({
                opacity : "1",
                color: "red"
            });

        }

    });

    //Control para datos de compra

    var select = "";

    $("select#metodo_pago").on("change", function(){

        console.log("Estoy aqui");
        select = $(this).val();

        console.log("Valor : " + select);
    })

    $("#btn_compra").on("click", function(e){


        if($("#usuario_direccion").val() == ""){

            e.preventDefault();
            $(".alerta_direccion").css({
                opacity: "1",
                color: "red"
            });
        } else if ($("#usuario_tfn").val() == ""){

            e.preventDefault();
            $(".alerta_direccion").css({
                opacity: "0",
                color: "red"
            });

            $(".alerta_tfn").css({
                opacity: "1",
                color: "red"
            });
        } else{

            if(select == "" || select == undefined){
                e.preventDefault();
                $(".alerta_metodo").css({
                    opacity: "1",
                    color: "red"
                });
            }

            $(".alerta_tfn").css({
                opacity: "0",
                color: "red"
            });

        }

    });

});