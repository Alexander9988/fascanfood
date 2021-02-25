window.onload = function(){


    cargarCarro();

    function cargarCarro() {
        //Cargar menus del carro

        var xmlhttp = new XMLHttpRequest();


        xmlhttp.onreadystatechange = function(){

            if(this.readyState = 4 && this.status == 200){


                document.getElementById("carrito").innerHTML = this.responseText;

                //Funciones para eliminar menu del carrito

                $(".mi_menu").each(function(){
                    var menu = $(this);
                    $(".eliminar_menu", menu).on("click", function(){

                        var code = $(".cod_orden", menu).text();

                        eliminarCarrito(code);

                    });
                });

                //Control para colorear menus en carrito

                $(".mi_menu").each(function(i){

                    if(i % 2 == 0){
                        $(this).css("background", "#cdcde1");
                    } else {
                        $(this).css("background", "#fff");
                    }
                });


                //Control para evitar compra vacía

                $(".btn_comprar").click(function(e){
                    var encargos = $("#carro .mi_menu").toArray().length;

                    if(encargos == 0){
                        e.preventDefault();
                        alert("Su carro de compra está vacío");
                    };

                });

            }
        }
        xmlhttp.open("POST", "cargar_carrito.php", true);
        xmlhttp.send();
    }


    function eliminarCarrito(a){

        var code = a;


        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){


                cargarCarro();

            }

        };

        xmlhttp.open("GET", "eliminar_menu.php?id="+code, true);
        xmlhttp.send();


    }

}