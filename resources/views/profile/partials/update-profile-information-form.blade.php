<section class="p-4 edit-profile">
    <header>
        <h2 class="text-center fw-bold p-3 mb-2">
            {{ __('Aggiorna le informazioni del tuo Account.') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- immagine --}}
    @if ($user->img)
        <img src=" {{ asset('storage/' . $user->img) }}" alt="{{ $user->restaurant_name }}">
    @endif

    <form method="post" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data"
        onsubmit="return confirmEdit()" class="mt-6 space-y-6">
        @csrf
        @method('PUT')

        {{-- IMMAGINE --}}
        <div class="mb-2">
            <label for="img">Immagine</label>
            <input type="file" maxlength="255" name="img" id="img">
            @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- NOME --}}
        <div class="mb-2">
            <label for="restaurant_name">{{ __('Nome Ristorante') }}</label>
            <input class="form-control" type="text" name="restaurant_name" id="restaurant_name"
                autocomplete="restaurant_name" value="{{ old('restaurant_name', $user->restaurant_name) }}" required
                minlength="1" maxlength="255" autofocus>
            @error('restaurant_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- INDIRIZZO --}}
        <div class="mb-2">
            <label for="address">{{ __('Locazione') }}</label>
            <input class="form-control" type="text" name="address" id="address" autocomplete="address"
                value="{{ old('address', $user->address) }}" required minlength="5" maxlength="64" autofocus>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->get('address') }}</strong>
                </span>
            @enderror
        </div>

        {{-- EMAIL --}}
        <div class="mb-2">
            <label for="email">
                {{ __('Email') }}
            </label>

            <input id="email" name="email" type="email" class="form-control"
                value="{{ old('email', $user->email) }}" required maxlength="255" autocomplete="username" />

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-muted">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-outline-dark">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- NUMERO DI TELEFONO --}}
        <div class="mb-2">
            <label for="phone_number">{{ __('Numero di telefono') }}</label>
            <input class="form-control" type="text" name="phone_number" id="phone_number" autocomplete="phone_number"
                value="{{ old('phone_number', $user->phone_number) }}" required minlength="9" maxlength="64"
                autofocus>
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- PARTITA IVA --}}
        <div class="mb-2">
            <label for="vat_number">{{ __('Partita IVA') }}</label>
            <input class="form-control" type="text" name="vat_number" id="vat_number" autocomplete="vat_number"
                value="{{ old('vat_number', $user->vat_number) }}" required minlength="13" maxlength="13" autofocus>
            @error('vat_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- TIPOLOGIA --}}
        <div class="mb-4 row">
            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Tipologie') }}</label>

            <div class=" d-flex flex-wrap m-3">
                @foreach ($types as $type)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $type->id }}"
                            @checked($user->types->contains($type->id)) name="types[]" id="type-{{ $type->id }}">

                        <label class="form-check-label me-2" for="type-{{ $type->id }}">
                            {{ $type->type_name }}
                        </label>
                    </div>
                @endforeach
            </div>


            {{-- BOTTONE SUBMIT --}}
            <div class="d-flex align-items-center gap-4">
                <button class="btn btn-primary" type="submit">{{ __('Salva') }}</button>

                @if (session('status') === 'profile-updated')
                    <script>
                        const show = true;
                        setTimeout(() => show = false, 2000)
                        const el = document.getElementById('profile-status')
                        if (show) {
                            el.style.display = 'block';
                        }
                    </script>
                    <p id='profile-status' class="fs-5 text-muted">{{ __('Saved.') }}</p>
                @endif
            </div>
    </form>
</section>
