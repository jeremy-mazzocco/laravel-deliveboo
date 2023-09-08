@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1 class="text-center m-4">
        Crea il tuo piatto
    </h1>

    <div class="w-75 border-2 border border-secondary m-auto my-2 p-2">
        <form method="POST" action="{{ route('dish.store') }}" enctype="multipart/form-data">

            @csrf
            @method('POST')

            <div class="m-3">
                <label for="dish_name">Nome</label>
                <input type="text" required minlength="2" maxlength="64" name="dish_name" id="dish_name">
                @error('dish_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>


            <div class="m-3">
                <label for="description">Descrizione</label>
                <input type="text" maxlength="1275" name="description" id="description">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>


            <div class="m-3">
                <label for="price">Prezzo</label>
                <input type="number" required step="any" min="0.00" name="price" id="price">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>


            <div class="m-3">
                <label for="img">Immagine</label>
                <input type="file" maxlength="255" name="img" id="img">
                @error('img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>



            <div class="m-3">
                <label for="visibility">Visibilità</label>
                <select name="visibility" required id="visibility">
                    <option value="1">Visibile</option>
                    <option value="0">Non Visibile</option>
                </select>

            </div>


            <div class="m-auto">
                <input class="m-3 px-3 py-1" type="submit" value="Crea">
                <a href="{{ route('dashboard.home') }}" class="btn btn-secondary">Indietro</a>
            </div>
        </form>
    </div>
@endsection
