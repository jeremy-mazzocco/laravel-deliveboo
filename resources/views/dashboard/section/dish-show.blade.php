@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1 class="text-center">
        I tuoi piatti
    </h1>

    <div class="container d-flex flex-wrap justify-content-center gap-4">

        @foreach (Auth::user()->dishes as $dish)
            @if (!$dish->deleted)
                <div class="card" style="width: 18rem;">
                    <img src=" {{ asset('storage/' . $dish->img) }}"
                        onerror="this.src=' {{ asset('storage/' . 'images/Pippo-Baudo.jpg') }}'" class="card-img-top"
                        alt="{{ $dish->dish_name }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $dish->dish_name }}</h5>
                        <p class="card-text">{{ $dish->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">PREZZO: &euro;{{ $dish->price }}</li>
                        <li class="list-group-item">VISIBILITA: {{ $dish->visibility ? 'Visibile' : 'Non visibile' }}</li>
                        <li>
                            @foreach ($dish->orders as $order)
                                <div>
                                    {{ $order->customer_name }}
                                </div>
                                <div>
                                    {{ $order->pivot->amount }}
                                </div>
                                <div>
                                    {{ $order->pivot->amount }}
                                </div>
                            @endforeach
                        </li>

                    </ul>
                    <div class="card-body">
                        <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-warning">Edit</a>

                        <form method="POST" action="{{ route('dish.deleted.edit', $dish->id) }}"
                            onsubmit="return confirmDelete()">

                            @csrf
                            @method('PUT')

                            <input class="btn btn-danger my-3" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            @endif
        @endforeach

    </div>

    <a href="{{ route('dashboard.home') }}" class="btn btn-secondary">Indietro</a>
@endsection
