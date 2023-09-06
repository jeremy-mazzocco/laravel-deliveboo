@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1>I tuoi dati</h1>

    <h3>
        {{ Auth::user()->restaurant_name }}
    </h3>
    <ul>
        <li>
            Codice: {{ Auth::user()->id }}
        </li>
        <li>
            Indirizzo: {{ Auth::user()->address }}
        </li>
        <li>
            Email: {{ Auth::user()->email }}
        </li>
        <li>
            Numero di telefono: {{ Auth::user()->phone_number }}
        </li>
        <li>
            Partita Iva: {{ Auth::user()->vat_number }}
        </li>
    </ul>

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
@endsection
