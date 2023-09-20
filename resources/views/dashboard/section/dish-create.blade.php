@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1 class="text-center fw-bold p-3">
        CREA IL TUO PIATTO
    </h1>

    <div class="create" id="dish-create">
        <form method="POST" action="{{ route('dish.store') }}" enctype="multipart/form-data">

            @csrf
            @method('POST')

            <div class="m-4">
                <label for="dish_name">Nome</label>
                <input type="text" required minlength="2" maxlength="64" name="dish_name" id="dish_name">
                @error('dish_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="m-4">
                <label for="description">Descrizione</label>
                <input type="text" maxlength="1275" name="description" id="description">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="m-4">
                <label for="price">Prezzo</label>
                <input type="number" required step="any" min="0.00" name="price" id="price">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="m-4">
                <label for="img">Immagine</label>
                <input type="file" maxlength="255" name="img" id="img">
                @error('img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="m-4">
                <label for="visibility">Visibilità</label>
                <select name="visibility" required id="visibility">
                    <option value="1">Visibile</option>
                    <option value="0">Non Visibile</option>
                </select>

            </div>

            <div class="text-center">
                <input id="crea" class="m-3 px-3 py-1" type="submit" value="Crea">
            </div>
        </form>
    </div>
@endsection
