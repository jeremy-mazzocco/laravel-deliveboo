@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1 class="text-center">
        I tuoi piatti
    </h1>

    <div class="container d-flex flex-wrap justify-content-center gap-4">

        @foreach (Auth::user()->dishes as $dish)
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $dish->dish_name }}</h5>
                    <p class="card-text">{{ $dish->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">PREZZO: {{ $dish->price }}</li>
                    <li class="list-group-item">VISIBILITA: {{ $dish->visibility ? 'Visibile' : 'Non visibile' }}</li>
                    <li>
                        {{ $dish->id }}
                    </li>

                </ul>
                {{-- <div class="card-body">
                    <a href="#" class="btn btn-warning">Edit</a>

                    <form method="POST" action="{{ route('dish.deleted.edit', $dish->id) }}">

                        @csrf
                        @method('patch')

                        <input class="btn btn-primary my-3" type="submit" value="Delete">
                        <div>
                            {{ $dish->id }}
                        </div>

                        <form>
                </div>
            </div> --}}
            {{-- <a class="btn btn-primary my-3" href="{{ route('dish.deleted.edit', $dish->id) }}">Delete</a> --}}
        @endforeach

    </div>

    <a href="{{ route('dashboard.home') }}" class="btn btn-secondary">Indietro</a>
@endsection
