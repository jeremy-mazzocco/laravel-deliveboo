@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1>
        Modifica il tuo piatto
    </h1>

    <form method="POST" action="{{ route('dish.update', $dish->id) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label for="dish_name">NAME</label>
        <br>
        <input type="text" required minlength="2" maxlength="64" name="dish_name" id="dish_name"
            value="{{ $dish->dish_name }}">
        @error('dish_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>


        <label for="description">DESCRIPTION</label>
        <br>
        <input type="text" maxlength="1275" name="description" id="description" value="{{ $dish->description }}">
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>


        <label for="price">PRICE</label>
        <br>
        <input type="number" required step="0.01" min="0.01" name="price" id="price"
            value="{{ $dish->price }}">
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>


        <label for="img">PICTURE</label>
        <br>
        <input type="file" maxlength="255" name="img" id="img">
        @error('img')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>


        <label for="visibility">Visibilità</label>
        <br>
        <select name="visibility" required id="visibility">

            <option value="1">Visibile</option>
            <option {{ !$dish->visibility ? 'selected' : '' }} value="0">Non Visibile</option>
        </select>
        <br>

        <input class="my-3" type="submit" value="Conferma">

        <a href="{{ route('dashboard.home') }}" class="btn btn-secondary">Indietro</a>
    </form>
@endsection
