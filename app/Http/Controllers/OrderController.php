<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderCardFormRequest;
use App\Http\Requests\StoreOrderTicketFormRquest;
use App\Mail\OrderCreated;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    private $checkoutApiUrl = 'https://tracktools.vercel.app/api/checkout';
    private $headers = [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'token' => 'UGFyYWLDqW5zLCB2b2PDqiBlc3RhIGluZG8gYmVtIQ=='
    ];

    /**
     * Retorna view de formulario para criar novo pedido com cartão de crédito.
     *
     * @return \Illuminate\View\View
     */
    public function createWithCard()
    {
        return view('order.create');
    }

    /**
     * Retorna view de formulario para criar novo pedido com boleto.
     *
     * @return \Illuminate\View\View
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

        return $this->makeCheckoutRequest($input, 'card');
    }

    /**
     * Armazena um novo pedido feito com boleto no banco de dados.
     *
     * @param  StoreOrderTicketFormRquest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWithTicket(StoreOrderTicketFormRquest $request)
    {
        $input = $request->validated();

        return $this->makeCheckoutRequest($input, 'ticket');
    }

    /**
     * Faz requisição para o checkout API.
     *
     * @param  array  $input
     * @param  string  $transactionType
     * @return RedirectResponse
     */
    public function makeCheckoutRequest(array $input, string $transactionType): RedirectResponse
    {
        $response = Http::withHeaders($this->headers)->post($this->checkoutApiUrl, $input);

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);

        if ($statusCode !== 200 || $responseBody['transaction']['status'] === 'recused') {
            $errorRoute = $transactionType === 'card' ? 'order.create.card' : 'order.create.ticket';

            return redirect()
                ->route($errorRoute)
                ->with('error', 'Ocorreu um erro na transação, tente novamente mais tarde.');
        }

        switch ($responseBody['transaction']['status']) {
            case 'paid':
                $status = 'Aprovado';
                break;
            case 'pending':
                $status = 'Processando';
                break;
            case 'recused':
                $status = 'Recusado';
                break;
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'status' => $status,
        ]);

        $order->products()->attach($input['products']);

        $this->sendOrderCreatedMail($order);

        return redirect()
            ->route('user.order', ["user" => auth()->id(), "order" => $order->id])
            ->with('create-order', "Seu pedido #{$order->id} foi criado com sucesso!");
    }

    public function sendOrderCreatedMail(Order $order)
    {
        $mailInfo = [
            'title' => "Seu Pedido #{$order->id} foi criado!",
            'subject' => "EstanteDev - Pedido #{$order->id} criado! ⚠️",
            'url' => 'https://devstart-esmeralda.herokuapp.com',
            'message' => "{$order->user->name}, seu pedido foi criado com sucesso! Em breve seus livros estarão contigo!",
            'status' => "Seu pedido está com status {$order->status}",
        ];

        Mail::to($order->user->email)
            ->send(new OrderCreated($mailInfo));

        return response()->json([
            'message' => 'Mail has sent.'
        ], Response::HTTP_OK);
    }
}
