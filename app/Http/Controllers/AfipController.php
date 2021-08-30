<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afip;


class AfipController extends Controller
{
    public function voucher (){

        $afip= new Afip();
        $voucher= $afip->createVoucher();
        dd($voucher);

        return view ('afip.voucher', compact ('voucher'));
    }
}



