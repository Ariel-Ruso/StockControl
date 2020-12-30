

    function checkInput(textbox) { 
        var Precio = document.getElementByName('precioCompra').value; 
        var iva = document.getElementById('iva').value; 
        var gano = document.getElementById('ganancia').value ; 

        var pre = document.getElementById("garca").value = Precio * iva /100 ;
        var renta = document.getElementById("garca").value = Precio * gano /100 ;

        var final = Number(Precio) + Number(pre) + Number(renta);
          document.getElementById("garca").value = final ;

    }
