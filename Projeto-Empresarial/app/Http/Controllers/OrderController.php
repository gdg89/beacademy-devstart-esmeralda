<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderFormRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Retorna view de formulario para criar novo pedido.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Armazena um novo pedido no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderFormRequest $request)
    {
        $input = $request->validated();

        dd($input);
    }
}
