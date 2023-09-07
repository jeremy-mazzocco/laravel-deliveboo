@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1 class="text-center m-5 ">
        I tuoi ordini
    </h1>

    <div class="container m-4">

        @foreach (Auth::user()->dishes as $dish)
            <div>
                @foreach ($dish->orders as $order)
                    <div class="w-50 border-2 border border-secondary m-auto my-2 p-2">
                        <div class=" h5">
                            Nome cliente: {{ $order->customer_name }}
                        </div>
                        <div>
                            Indirizzo consegna: {{ $order->customer_address }}
                        </div>
                        <div>
                            Numero di telefono: {{ $order->phone_number }}
                        </div>
                        <div class="mb-3">
                            Email: {{ $order->email }}
                        </div>

                        <div>
                            Nome pietanza: {{ $dish->dish_name }}
                        </div>
                        <div>
                            Quantita': {{ $order->pivot->amount }}
                        </div>
                        <div>
                            Ora ordinazione: {{ $order->time }}
                        </div>
                        <div class="mb-3">
                            Totale da pagare: <b>&euro; {{ $order->total_price }}</b>
                        </div>

                        <div
                            class="@if ($order->status) bg-success @else bg-danger @endif text-light p-1 w-25 text-center rounded">
                            <b>{{ $order->status ? 'Pagato' : 'Da pagare' }}</b>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>


    <a href="{{ route('dashboard.home') }}" class="btn btn-secondary">Indietro</a>
@endsection
