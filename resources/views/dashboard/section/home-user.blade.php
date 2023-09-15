@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1 class="text-center fw-bold text-white p-3">
        {{ Auth::user()->restaurant_name }}
    </h1>

    <div class="row align-items-center justify-content-center g-5">
        <div class="img col-6">
            <img src=" {{ asset('storage/' . Auth::user()->img) }}"
                onerror="this.src=' {{ asset('storage/' . 'images/Pippo-Baudo.jpg') }}'"
                class="img-fluid card-img-fixed-height" alt="{{ Auth::user()->restaurant_name }}">
        </div>
        <div class="list col-4">
            <ul class="list-unstyled text-center">
                <li class="mb-2">
                    {{ Auth::user()->address }}
                </li>
                <li class="mb-2">
                    {{ Auth::user()->email }}
                </li>
                <li class="mb-2">
                    Tel.: {{ Auth::user()->phone_number }}
                </li>
                <li class="mb-2">
                    Partita Iva: {{ Auth::user()->vat_number }}
                </li>

                <li>
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
    </div>
@endsection
