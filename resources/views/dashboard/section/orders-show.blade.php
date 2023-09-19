@extends('dashboard.dashboard')

@section('dashboardSection')
    @php
        $tot = 0;
    @endphp

    <h1 class="text-center fw-bold p-3">
        I TUOI ORDINI
    </h1>

    <div class="orders-container row">
        @foreach ($orders as $order)
            <div class="order-container">
                <div class="order col-3 gap-2">
                    <div class="order-status-container">
                        <h6 class="titolo-ordine">Ordine N: {{ $order->id }}</h6>
                        <p class=" @if ($order->status) bg-success @else bg-danger @endif text-light text-center"
                            id="stato-ordine">
                            <b>{{ $order->status ? 'Pagato' : 'Da pagare' }}</b>
                        </p>
                    </div>

                    <p class="order-time">Ora ordinazione: <br> {{ $order->time }}</p>

                    <div class="dettagli m-2 text-light">
                        <span>Dettagli:</span>
                        <i class="fa-solid fa-plus mx-2"></i>
                    </div>
                </div>


                <div class="order-details-container">
                    <div class="order-details my-2">
                        {{-- CUSTOMER INFO --}}
                        <div class="customer-info my-2">
                            <p id="p-title">
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

                        {{-- ORDER DETAILS --}}
                        <div class="order-info-container my-2">
                            <div class="order-info">
                                @foreach ($order->dishes as $dish)
                                    <div class="dish my-2">
                                        <p>{{ $dish->dish_name }}</p>
                                        <div>Prezzo: &euro; {{ $dish->price }}</div>
                                        <div>Quantità: {{ $dish->pivot->amount }}</div>
                                        @php
                                            $totPiatto = $dish->price * $dish->pivot->amount;
                                            $tot += $totPiatto;
                                        @endphp
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="fs-5">
                                Totale: &euro;{{ $tot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
