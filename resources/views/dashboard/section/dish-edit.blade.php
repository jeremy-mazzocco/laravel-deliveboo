@extends('dashboard.dashboard')

@section('dashboardSection')
    <div id="dish-edit">
        <h1 class="text-center fw-bold text-white p-3">
            MODIFICA IL TUO PIATTO
        </h1>

        <div class="w-75 m-auto my-2 p-4 d-flex justify-content-between" id="edit-card">
            <div>
                {{-- immagine --}}
                @if ($dish->img)
                    <img class="img-fluid" src=" {{ asset('storage/' . $dish->img) }}" alt="{{ $dish->dish_name }}">
                    <div>
                        <form method="POST" action="{{ route('dish.deleteImg', $dish->id) }}"
                            onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Cancella Immagine">
                        </form>
                    </div>
                @endif
            </div>

            {{-- form --}}
            <div>
                <form method="POST" action="{{ route('dish.update', $dish->id) }}" enctype="multipart/form-data"
                    onsubmit="return confirmEdit()">

                    @csrf
                    @method('PUT')

                    <div class="m-3">
                        <label for="dish_name">Nome</label>
                        <input type="text" required minlength="2" maxlength="64" name="dish_name" id="dish_name"
                            value="{{ $dish->dish_name }}">
                        @error('dish_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="m-3">
                        <label for="description">Descrizione</label>
                        <textarea name="description" id="description" maxlength="1275">{{ $dish->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="m-3">
                        <label for="price">Prezzo</label>
                        <input type="number" required step="any" min="0.00" name="price" id="price"
                            value="{{ $dish->price }}">
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
                            <option {{ !$dish->visibility ? 'selected' : '' }} value="0">Non Visibile</option>
                        </select>
                    </div>
                    <input id="confirm" class="px-3 py-1" type="submit" value="Conferma">
                </form>
            </div>
        </div>
    </div>
@endsection
