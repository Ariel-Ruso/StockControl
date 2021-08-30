<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticulo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //aqui van permisos
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
                'nombre' => 'required',
                'codigo' => 'required',
                'cantidad' => 'required',
                'precioVenta' => 'required',
                'pVentaTarj' => 'required',
                'iva' => 'required',
                'precioCompra' => 'required',
                //'marca'  => 'required',
                //'modelo'  => 'required',
                'categorias_id' => 'required',
                'proveedors_id' => 'required',
                'codbar' => 'required'
            
        ];
    }

}
