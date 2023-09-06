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
        $request->validate([
            'restaurant_name' => ['required', 'string', 'min:1', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'address' => ['required', 'string', 'max:64'],
            'vat_number' => ['required', 'string', 'min:13', 'max:13', 'unique:' . User::class],
            'phone_number' => ['required', 'string', 'max:64'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // $this->getValidationMessages()
        ]);

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


}
