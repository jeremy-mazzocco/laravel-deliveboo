@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1 class="text-center fw-bold text-white p-3">
        I tuoi ordini
    </h1>

    <div class="container m-4 row">
        @foreach ($orders as $order)
            <div class="order col-3 my-2 p-2">
                <h4>Ordine ID: {{ $order->id }}</h4>
                <div class="fs-4 p-2 @if ($order->status) bg-success @else bg-danger @endif text-light p-1 w-25 text-center rounded"
                    id="stato-ordine">
                    <b>{{ $order->status ? 'Pagato' : 'Da pagare' }}</b>
                </div>
                <i class="fa-solid fa-plus mx-3"></i>
                <div class="show-order">
                    <div class="customer-info my-2">
                        <div class="fs-3">
                            {{ $order->customer_name }}
                        </div>
                        <div>
                            Indirizzo: {{ $order->customer_address }}
                        </div>
                        <div>
                            Tel: {{ $order->phone_number }}
                        </div>
                        <div>
                            Email: {{ $order->email }}
                        </div>
                    </div>
                    <div class="order-details my-2">
                        @foreach ($order->dishes as $dish)
                            <div class="dish my-2">
                                <div class="fs-5">{{ $dish->dish_name }}</div>
                                <div>Quantità: {{ $dish->pivot->amount }}</div>
                                <div>Prezzo unitario: &euro; {{ $dish->price }}</div>
                                <div>Ora ordinazione: {{ $order->time }}</div>
                                <div>Totale per questo piatto: &euro; {{ $dish->price * $dish->pivot->amount }}</div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
