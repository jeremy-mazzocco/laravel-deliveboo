@extends('dashboard.dashboard')

@section('dashboardSection')
    <h2 class="text-center fw-bold text-white bg-dark rounded-5 p-1 col-4 m-auto mt-3">
        {{ Auth::user()->restaurant_name }}
    </h2>

    <ul class="list-unstyled text-center col-6 m-auto p-2">
        <li class="mb-2 fw-bold">
            Indirizzo: {{ Auth::user()->address }}
        </li>
        <li class="mb-2 fw-bold">
            Email: {{ Auth::user()->email }}
        </li>
        <li class="mb-2 fw-bold">
            Numero di telefono: {{ Auth::user()->phone_number }}
        </li>
        <li class="mb-2 fw-bold">
            Partita Iva: {{ Auth::user()->vat_number }}
        </li>
    </ul>

    <div class="row text-center mt-5 mb-5">
        <div class="col">
            <a href="{{ route('dish.show') }}" class="text-decoration-none fw-bold bg-info rounded btn">
                Lista Piatti
            </a>
        </div>

        <div class="col">
            <a href="{{ route('dish.create') }}" class="text-decoration-none fw-bold bg-info rounded btn">
                Aggiungi Piatto
            </a>
        </div>

        <div class="col">
            <a href="{{ route('orders.show', Auth::user()->id) }}" class="text-decoration-none fw-bold bg-info rounded btn">
                Ordini clienti
            </a>
        </div>

        <div class="col">
            <a href="" class="text-decoration-none fw-bold bg-info rounded btn">
                Statistiche
            </a>
        </div>
    </div>
@endsection
