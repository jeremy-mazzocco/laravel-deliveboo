@extends('layouts.app')

@section('content')
    <div class="container" id="register">
        <h1 class="text-center fw-bold text-white p-3">Registra qui il tuo ristorante</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- restaurant_name --}}
                        <div class="mb-3 row">
                            <label for="restaurant_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nome ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_name" type="text" required title="Nome richiesto" minlength="1"
                                    maxlength="255"
                                    class="form-control
                                        @error('Nome ristorante') non valido @enderror"
                                    name="restaurant_name" value="{{ old('restaurant_name') }}"
                                    autocomplete="restaurant_name" autofocus>

                                @error('restaurant_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- address --}}
                        <div class="mb-3 row">
                            <label for="address"
                                class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" minlength="5" maxlength="64"
                                    class="form-control @error('Indirizzo') non valido @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- vat_number --}}
                        <div class="mb-3 row">
                            <label for="vat_number"
                                class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva') }}</label>

                            <div class="col-md-6">
                                <input id="vat_number" type="text" minlength="13" maxlength="13"
                                    class="form-control
                                        @error('Partita Iva') non valida @enderror"
                                    name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number"
                                    autofocus>

                                @error('vat_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- phone_number --}}
                        <div class="mb-3 row">
                            <label for="phone_number"
                                class="col-md-4 col-form-label text-md-right">{{ __('Numero di telefono') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" minlength="9" maxlength="64"
                                    class="form-control @error('Numero di telefono') non valido @enderror"
                                    name="phone_number" value="{{ old('phone_number') }}" required
                                    autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- tipologia --}}
                        <div class="mb-3 row">
                            <label for="phone_number"
                                class="col-md-4 col-form-label text-md-right">{{ __('Tipologie') }}</label>

                            <div class=" d-flex wrap my-2">
                                @foreach ($types as $type)
                                    <div class="form-check">
                                        <input class="form-check-input d-flex" type="checkbox" value="{{ $type->id }}"
                                            name="types[]" id="type-{{ $type->id }}">
                                        <label class="form-check-label  me-1" for="type-{{ $type->id }}">
                                            {{ $type->type_name }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('types')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- immagine --}}
                            <div class="m-3">
                                <label for="img">Immagine</label>
                                <input type="file" maxlength="255" name="img" id="img">
                                @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- email --}}
                            <div class="mb-3 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" maxlength="255"
                                        class="form-control @error('email') non valida @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- password --}}
                            <div class="mb-3 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') non valida @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- confirm password --}}
                            <div class="mb-3 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
