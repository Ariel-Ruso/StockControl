function peso() {
    const precio = '<?php echo $detalle['
    Precio '] ?>';

    const peso = document.getElementById('inpeso');
    const res = (document.getElementById('pxkg'));

    //eventos
    peso.onclick = function(e) {
        alert(parseFloat(peso.value));
        //res.textContent= number (parseFloat(peso) * parseFloat(precio));
        res.textContent = parseFloat(peso.value) * precio;
    }

}


function checkInput(precioCompra) {

    var Precio = document.calc.precioCompra.value;
    var pre = document.calc.precioVenta.value;
    var gano = pre - Precio;
    var gano1 = Number(gano / Precio);
    var ganof = Number(gano1 * 100);

    document.calc.ganancia.value = ganof;

    var finaltarjeta = Number(pre * 0.17) + Number(pre);

    document.calc.pVentaTarj.value = Math.round(finaltarjeta);
    document.calc.pVentaTarj.value = redondeo2(document.calc.pVentaTarj.value);

}

/*   function Descuento2($total) {

    var tot = '<?php echo $total; ?>'
    document.detail.descuento.value = tot;
} */

function Descuento($total) {

    var tot = '<?php echo $total; ?>'
    var desc = document.detail.descuento.value;
    var porc = Number(desc * tot) / 100;
    alert(porc);
    //var final = tot - desc;
    //document.detail.tot2.value = final;
    document.detail.descP.value = porc.value;

}