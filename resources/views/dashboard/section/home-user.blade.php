@extends('dashboard.dashboard')

@section('dashboardSection')

<h3 class="my-3 text-secondary">I tuoi dati</h3>

<h5>
    Ristorante: {{Auth::user()->restaurant_name}}
</h5>
<ul>
    <li>
        Indirizzo: {{Auth::user()->address}}
    </li>
    <li>
        Email: {{Auth::user()->email}}
    </li>
    <li>
        Numero di telefono: {{Auth::user()->phone_number}}
    </li>
    <li>
        Partita Iva: {{Auth::user()->vat_number}}
    </li>
</ul>

<div>
    <a href="">
        Lista Piatti
    </a>
</div>
<div>
    <a href="">
        Aggiungi Piatto
    </a>
</div>
<div>
    <a href="">
        Ordini clienti
    </a>
</div>
<div>
    <a href="">
        Statistiche
    </a>
</div>


@endsection
