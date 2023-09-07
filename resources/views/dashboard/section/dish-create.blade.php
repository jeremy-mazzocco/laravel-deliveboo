@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1>
        Crea il tuo piatto
    </h1>

    <form method="POST" action="{{ route('dish.store') }}" enctype="multipart/form-data">

        @csrf
        @method('POST')

        <label for="dish_name">NAME</label>
        <br>
        <input type="text" name="dish_name" id="dish_name">
        @error('dish_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>


        <label for="description">DESCRIPTION</label>
        <br>
        <input type="text" name="description" id="description">
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>


        <label for="price">PRICE</label>
        <br>
        <input type="number" step="0.01" min="0.01" name="price" id="price">
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>


        <label for="img">PICTURE</label>
        <br>
        <input type="file" name="img" id="img">
        @error('img')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>


        <label for="visibility">Visibilità</label>
        <br>
        <select name="visibility" id="visibility">
            <option value="1">Visibile</option>
            <option value="0">Non Visibile</option>
        </select>
        <br>

        @foreach ($types as $type)
            <div class="form-check mx-auto" style="max-width: 300px">
                <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name="types[]"
                    id="type-{{ $type->id }}">
                <label class="form-check-label" for="type-{{ $type->id }}">
                    {{ $type->type_name }}
                </label>
            </div>
        @endforeach

        <input class="my-3" type="submit" value="CREATE">

        <a href="{{ route('dashboard.home') }}" class="btn btn-secondary">Indietro</a>
    </form>
@endsection
