@extends('dashboard.dashboard')

@section('dashboardSection')
    <div class="content">
        <h2 class="text-center fw-bold text-white bg-dark rounded-5 p-1 col-4 m-auto mt-3">
            {{ Auth::user()->restaurant_name }}
        </h2>

        <div class="d-flex justify-content-center my-3">
            <img src=" {{ asset('storage/' . Auth::user()->img) }}"
                onerror="this.src=' {{ asset('storage/' . 'images/Pippo-Baudo.jpg') }}'"
                class="img-fluid card-img-fixed-height" alt="{{ Auth::user()->restaurant_name }}">
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
    </div>
@endsection
