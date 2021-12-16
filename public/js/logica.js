window.onload = randomInt();

function randomInt() {

    var codbar = Math.round(Math.random() * 10) * 154657897987 * 1375;
    document.calc.codbar.value = codbar;
    JsBarcode("#barcode2", codbar);

}

function checkInput(precioCompra) {

    var Precio = document.calc.precioCompra.value;
    var pre = document.calc.precioVenta.value;
    var gano = pre - Precio;
    var gano1 = Number(gano / Precio);
    var ganof = Number(gano1 * 100);

    document.calc.ganancia.value = ganof;

    var finaltarjeta = Number(pre * 0.18) + Number(pre);

    document.calc.pVentaTarj.value = Math.round(finaltarjeta);
    document.calc.pVentaTarj.value = redondeo2(document.calc.pVentaTarj.value);

}

/*  function checkInput(precioVenta){

   document.calc.precioVenta.value= redondeo2 ( document.calc.precioVenta.value );

 } */

/* 
function redondeo2(data) {

    var ultdig = data.slice(-2);
    var resto = data - ultdig;

    //var res= Number(ultdig) - 10;
    if (Number(ultdig < 50)) {
        //window.alert( '1 rango');
        res = 50;
    } else {
        //window.alert( '2 rango');
        res = 90;
    }

    return (resto + Number(res));

} */

function redondeo2(data) {

    var ultdig = data.slice(-2);
    //window.alert( ultdig);
    var resto = data - ultdig;

    //var res= Number(ultdig) - 10;
    if (Number(ultdig < 50)) {

        res = 50;
    } else {
        //window.alert( '2 rango');
        res = 90;
    }

    return (resto + Number(res));
}


function PagoCompuesto($total) {

    //window.alert($total);
    var tote = '<?php echo $total; ?>';
    //let tote = $total;
    //var tote = $total;

    document.detail.eft.value = tote;

    document.detail.noBanc.value = tote - document.detail.eft.value;
}

function PagoCompuesto2($total) {
    /* 
      let tot = '<?php echo $total; ?>'
      let noBanc= document.detail.noBanc.value;
      let eft= document.detail.eft.value;

      document.detail.eft.value = tot - document.detail.noBanc.value; */
}


function PagoCompuestoControl($total) {

    let tot = '<?php echo $total; ?>'
    let eft = document.detail.eft.value;
    let noBanc = document.detail.noBanc.value;
    //document.detail.noBanc.value= tot - eft;
    //si a + b <> tot
    //calculo cuotas

    let final = tot - eft - noBanc;
    if (final > 0) {
        let final18 = final + (final * 0.18);
        document.detail.tarje1.value = final;
        let finalRed = redondeo2(String(final18));
        window.alert(finalRed);
        document.detail.tarje2.value = (finalRed / 3).toFixed(2);
        document.detail.tarje3.value = (finalRed / 6).toFixed(2);
        document.detail.tarje4.value = (finalRed / 12).toFixed(2);
    }

}