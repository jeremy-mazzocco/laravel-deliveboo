@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1 class="text-center fw-bold text-white p-3">
        I tuoi piatti
    </h1>

    <div class="row" id="dish-show">
        @foreach (Auth::user()->dishes as $dish)
            @if (!$dish->deleted)
                <div class="col-3 mb-5">
                    <h3 id="card-title" class="card-title text-center">{{ $dish->dish_name }}</h3>
                    <img id="img-dish" class=" text-center" src=" {{ asset('storage/' . $dish->img) }}"
                        onerror="this.src=' {{ asset('storage/' . 'images/Pippo-Baudo.jpg') }}'"
                        class="card-img-top card-img-fixed-height" alt="{{ $dish->dish_name }}">

                    <div class="card-footer">
                        <div class="card-text px-2">
                            <p>{{ $dish->description }}</p>
                        </div>
                        <div class="my-2">&euro;{{ $dish->price }}</div>
                        <div>Visibilità: {{ $dish->visibility ? 'Visibile' : 'Non visibile' }}
                        </div>
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
@endsection
