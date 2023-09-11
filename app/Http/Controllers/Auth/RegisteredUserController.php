<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Mostra la vista di registrazione.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Gestisce una richiesta di registrazione in arrivo.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        // Validazione dei dati del modulo di registrazione
        $request->validate(
            $this->getValidations(),
            $this->getValidationMessages(),
        );


        $data = $request;
        if ($data['img']) {
            $img_path = Storage::put('uploads', $data['img']);
        } else {
            $img_path = null;
        }


        // Creazione di un nuovo utente
        $user = User::create([
            'restaurant_name' => $request->restaurant_name,
            'email' => $request->email,
            'address' => $request->address,
            'vat_number' => $request->vat_number,
            'img' => $img_path,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        $user->types()->attach($data['types']);

        // Generazione dell'evento di registrazione
        event(new Registered($user));

        // Login dell'utente appena registrato
        Auth::login($user);

        // Reindirizzamento alla pagina home
        return redirect(RouteServiceProvider::HOME);
    }

    // FUNZIONI DI VALIDAZIONE

    private function getValidations()
    {
        // Regole di validazione per i dati del modulo di registrazione
        return [
            'restaurant_name' => ['required', 'string', 'min:1', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'address' => ['required', 'string', 'min:5', 'max:64'],
            'vat_number' => ['required', 'string', 'min:13', 'max:13', 'unique:' . User::class],
            'phone_number' => ['required', 'string', 'min:9', 'max:64'],
            'img' => ['image', 'mimes:jpeg,png,jpg'],
            'types' => ['required','array','min:1'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    private function getValidationMessages()
    {
        // Messaggi di errore personalizzati per le regole di validazione
        return [
            "restaurant_name.required" => "Il nome del ristorante deve essere di almeno 1 carattere.",
            "restaurant_name.min" => "Il nome del ristorante deve essere di almeno 1 carattere.",
            "restaurant_name.max" => "Il nome del ristorante non può superare i 255 caratteri.",
            'email.email' => "Deve essere un indirizzo email valido.",
            'email.unique' => "Questo indirizzo email è già stato registrato.",
            "address.min" => "L'indirizzo deve contenere almeno 5 caratteri.",
            "address.max" => "L'indirizzo non può superare i 64 caratteri.",
            "vat_number.min" => "La partita IVA deve contenere esattamente 13 caratteri.",
            "vat_number.max" => "La partita IVA deve contenere esattamente 13 caratteri.",
            "vat_number.unique" => "Questa partita IVA è già stata registrata.",
            'phone_number.min' => "Il numero di telefono deve contenere almeno 9 caratteri.",
            'phone_number.max' => "Il numero di telefono non può superare i 64 caratteri.",
            'img.image' => 'Il file deve essere un\'immagine valida.',
            'img.mimes' => 'Il file immagine deve essere di tipo JPEG, PNG o JPG.',
            'types.required' => 'Almeno una casella deve essere selezionata.',
            'types.min' => 'Almeno una casella deve essere selezionata.',
            'password.confirmed' => 'Password non corretta.'
        ];
    }
}
