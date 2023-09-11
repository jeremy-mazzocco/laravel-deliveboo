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

        {{-- <li>Tipologie:
            @foreach (Auth::user()->types as $type)
                {{ $type->type_name }},
            @endforeach
        </li> --}}

        <li>Tipologie:
            <?php
            // Ottieni l'array delle tipologie dell'utente autenticato
            $types = Auth::user()->types;
            ?>
            @foreach ($types as $index => $type)
                {{ $type->type_name }}

                @if ($index < count($types) - 1)
                    , <!-- Aggiungi una virgola solo se l'elemento corrente non è l'ultimo -->
                @endif
            @endforeach
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
            <a href="{{ route('orders.show', Auth::user()->id) }}"
                class="text-decoration-none fw-bold bg-info rounded btn">
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
