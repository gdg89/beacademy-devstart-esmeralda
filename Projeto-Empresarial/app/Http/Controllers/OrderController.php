<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderCardFormRequest;
use App\Http\Requests\StoreOrderTicketFormRquest;
use App\Models\Order;
use Illuminate\View\View;
use App\Models\User;

class OrderController extends Controller
{
    private $checkoutApiUrl = 'https://tracktools.vercel.app/api/checkout';

    /**
     * Retorna view de formulario para criar novo pedido com cartão de crédito.
     *
     * @return \Illuminate\Http\Response
     */
    public function createWithCard()
    {
        return view('order.create');
    }

    /**
     * Retorna view de formulario para criar novo pedido.
     *
     * @return \Illuminate\Http\Response
     */
    public function createWithTicket()
    {
        return view('order.create');
    }

    /**
     * Armazena um novo pedido feito com cartão no banco de dados.
     *
     * @param  StoreOrderCardFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWithCard(StoreOrderCardFormRequest $request)
    {
        $input = $request->validated();

        dd($input);
    }

    /**
     * Armazena um novo pedido com boleto no banco de dados.
     *
     * @param  StoreOrderTicketFormRquest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWithTicket(StoreOrderTicketFormRquest $request)
    {
        $input = $request->validated();

        dd($input);
    }
}
