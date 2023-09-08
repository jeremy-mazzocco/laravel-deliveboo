@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1 class="text-center m-5">
        I tuoi ordini
    </h1>

    <div class="container m-4">
        @foreach ($orders as $order)
            <div class="order w-50 border-2 border border-secondary m-auto my-2 p-2">
                <h3>Ordine ID: {{ $order->id }}</h3>
                <div class="customer-info">
                    Nome cliente: {{ $order->customer_name }}
                    Indirizzo consegna: {{ $order->customer_address }}
                    Numero di telefono: {{ $order->phone_number }}
                    Email: {{ $order->email }}
                </div>
                <div class="order-details">
                    @foreach ($order->dishes as $dish)
                        <div class="dish">
                            Nome pietanza: {{ $dish->dish_name }}
                            Quantità: {{ $dish->pivot->amount }}
                            Prezzo unitario: &euro; {{ $dish->price }}
                            Ora ordinazione: {{ $order->time }}
                            Totale per questo piatto: &euro; {{ $dish->price * $dish->pivot->amount }}
                            <div
                                class="@if ($order->status) bg-success @else bg-danger @endif text-light p-1 w-25 text-center rounded">
                                <b>{{ $order->status ? 'Pagato' : 'Da pagare' }}</b>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach
    </div>

    <a href="{{ route('dashboard.home') }}" class="btn btn-secondary">Indietro</a>
@endsection
