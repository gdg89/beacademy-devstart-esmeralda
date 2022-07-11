@extends('layouts.default')
@section('title', 'Editar Pedido')

@section('content')

<section class="section-container">
    <div class="form-container">
        <h1 class="title">
            Editar pedido #{{ $order->id }}
        </h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.orders.update', $order->id) }}">
            @csrf
            @method('PUT')

            <div class="input-container sm:w-1/2">
                <label for="status" class="leading-7 text-sm text-gray-600">Status do pedido</label>

                <select id="status" name="status" class="select-status">

                    @foreach ($order->statusList as $status)
                    <option @if (request()->status === $status) selected @endif class="select-option-status">
                        {{ $status }}
                    </option>
                    @endforeach

                </select>

                @error('status')
                <p class="msg-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary mt-4">
                Editar
            </button>
        </form>
    </div>
</section>

@endsection
