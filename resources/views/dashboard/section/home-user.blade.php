@extends('dashboard.dashboard')

@section('dashboardSection')
    <h2 class="text-center fw-bold text-white bg-dark rounded-5 p-1 col-4 m-auto mt-3">
        {{ Auth::user()->restaurant_name }}
    </h2>

    <div class="d-flex justify-content-center my-3">
        <img src=" {{ asset('storage/' . Auth::user()->img) }}"
            onerror="this.src=' {{ asset('storage/' . 'images/Pippo-Baudo.jpg') }}'" class="img-fluid card-img-fixed-height"
            alt="{{ Auth::user()->restaurant_name }}">
    </div>

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
        <li>Tipologie:
            @foreach (Auth::user()->types as $type)
                {{ $type->type_name }},
            @endforeach
        </li>
    </ul>

    <div class="row">
        <div>
            <a href="{{ route('dish.show') }}">
                Lista Piatti
            </a>
        </div>

        <div>
            <a href="{{ route('dish.create') }}">
                Aggiungi Piatto
            </a>
        </div>

        <div>
            <a href="{{ route('orders.show', Auth::user()->id) }}">
                Ordini clienti
            </a>
        </div>

        <div>
            <a href="">
                Statistiche
            </a>
        </div>
    </div>
@endsection
