window.onload = function(){
    
    


    //Funciones para añadir menu al carrito

    $(".menu").each(function(){
        var menu = $(this);
        $(".anadirCarrito", menu).on("click", function(){

            var img = $(".img-responsive", menu).attr("src");

            var euros = $(".menu_precio", menu).text();
            var fin = euros.length - 1;
            var precio = euros.substring(0, fin);

            var descripcion = "";

            $(".menu_info p", menu).each(function(){

                descripcion += $(this).text() + ".";
            })


            var id = $(".cod_num", menu).text();
            var ID = id.substr(1, id.lenght);

            anadirCarrito(img, precio, descripcion, ID);

        });
    })

    function anadirCarrito(a, b, c, d){

        var img = a;
        var precio = b;
        var descripcion = c;
        var id = d;

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){
                
                alert("Se ha añadadido el menú ha su carro de manera exitosa");

            }

        };

        xmlhttp.open("GET", "users/anadir_carrito.php?id="+id+"&desc="+descripcion+"&img="+img+"&precio="+precio, true);
        xmlhttp.send();


    }


}