<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'restaurant_name' => ['required', 'string', 'min:1', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'address' => ['required', 'string', 'min:5', 'max:64'],
                'vat_number' => ['required', 'string', 'min:13', 'max:13', 'unique:' . User::class],
                'phone_number' => ['required', 'string', 'min:9', 'max:64'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            $this->getValidationMessages(),
        );

        $user = User::create([
            'restaurant_name' => $request->restaurant_name,
            'email' => $request->email,
            'address' => $request->address,
            'vat_number' => $request->vat_number,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    private function getValidationMessages()
    {

        return [
            "restaurant_name.min" => "Il codice deve essere di almeno 1 caratteri",
            "restaurant_name.max" => "Il codice deve essere di massimo 255 caratteri",

            'email.email' => "Deve essere una email",

            "address.min" => "L'indirizzo deve essere minimo 5 caratteri",
            "address.max" => "L'indirizzo deve essere massimo 64 caratteri",

            "vat_number.min" => "La partita IVA deve essere di almeno 13 caratteri",
            "vat_number.max" => "La partita IVA deve essere massimo di 13 caratteri",
            
            'phone_number.min' => "Il numero di telefono deve essere minimo di 8 caratteri",
            'phone_number.max' => "Il numero di telefono deve essere massimo di 64 caratteri",
        ];
    }
}
