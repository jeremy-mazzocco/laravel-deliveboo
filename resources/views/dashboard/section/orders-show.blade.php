@extends('dashboard.dashboard')

@section('dashboardSection')
    @php
        $tot = 0;
    @endphp

    <h1 class="text-center fw-bold text-white p-3">
        I tuoi ordini
    </h1>

    <div class="container m-4 row">
        @foreach ($orders as $order)
            <div class="order col-3 gap-2">
                <h6 class="titolo-ordine">Ordine nr: {{ $order->id }}</h6>
                <div class="fs-6 p-2 @if ($order->status) bg-success @else bg-danger @endif text-light p-1 w-25 text-center rounded"
                    id="stato-ordine">
                    <b>{{ $order->status ? 'Pagato' : 'Da pagare' }}</b>
                </div>
                <div class="dettagli m-2">
                    <span>Dettagli:</span>
                    <i class="fa-solid fa-plus mx-2"></i>
                </div>

                <div class="show-order">
                    <div class="customer-info my-2">
                        <p class="bg-danger" id="p-title">
                            {{ $order->customer_name }}
                        </p>
                        <div class="customer-datails ">
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
                    </div>
                    <hr>

                    <div class="order-details my-2">
                        @foreach ($order->dishes as $dish)
                            <div class="dish my-2">
                                <p>{{ $dish->dish_name }}</p>
                                <div>Prezzo: &euro; {{ $dish->price }}</div>
                                <div>Quantità: {{ $dish->pivot->amount }}</div>
                                <div>Ora ordinazione: {{ $order->time }}</div>
                                @php
                                    $totPiatto = $dish->price * $dish->pivot->amount;
                                    $tot += $totPiatto;
                                @endphp
                            </div>
                            <hr>
                        @endforeach
                        <div class="fs-5">
                            Totale: &euro;{{ $tot }}
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
