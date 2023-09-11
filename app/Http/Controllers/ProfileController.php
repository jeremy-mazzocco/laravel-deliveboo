<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;


use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $types=Type::all();
        return view('profile.edit', [
            'user' => $request->user(),
        ], compact('types'));
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    public function updateprofile(Request $request, $id)
    {
        $data = $request->all();
        // $data = $request->validate(
        //     $this->getValidations(),
        //     $this->getValidationMessages()
        // );
        $user = User::findOrFail($id);

        // Gestione dell'immagine
        $oldImgPath = $user->img;
        if (!array_key_exists("img", $data)) {
            $data['img'] = $oldImgPath;
        } else {
            if ($user->img) {
                Storage::delete($oldImgPath);
            }
            $newImgPath = Storage::put('uploads', $data['img']);
            $data['img'] = $newImgPath;
        }
        $user->update($data);

        // Gestione tipologie
        if (array_key_exists('types', $data)) {
            $user->types()->sync($data['types']);
        } else {
            $user->types()->detach();
        }

        return redirect()->route('dashboard.home');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    // FUNZIONI DI VALIDAZIONE

    private function getValidations()
    {
        // Regole di validazione per i dati del modulo di registrazione
        return [
            'restaurant_name' => ['required', 'string', 'min:1', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string', 'min:5', 'max:64'],
            'vat_number' => ['required', 'string', 'min:13', 'max:13'],
            'phone_number' => ['required', 'string', 'min:9', 'max:64'],
            'img' => ['image', 'mimes:jpeg,png,jpg']
        ];
    }

    private function getValidationMessages()
    {
        // Messaggi di errore personalizzati per le regole di validazione
        return [
            "restaurant_name.required" => "Il nome del ristorante deve essere di almeno 1 carattere.",
            "restaurant_name.min" => "Il nome del ristorante deve essere di almeno 1 carattere.",
            "restaurant_name.max" => "Il nome del ristorante non può superare i 255 caratteri.",
            "email.email" => "Deve essere un indirizzo email valido.",
            "address.min" => "L'indirizzo deve contenere almeno 5 caratteri.",
            "address.max" => "L'indirizzo non può superare i 64 caratteri.",
            "vat_number.min" => "La partita IVA deve contenere esattamente 13 caratteri.",
            "vat_number.max" => "La partita IVA deve contenere esattamente 13 caratteri.",
            "phone_number.min" => "Il numero di telefono deve contenere almeno 9 caratteri.",
            "phone_number.max" => "Il numero di telefono non può superare i 64 caratteri.",
            "img.image" => "Il file deve essere un'immagine valida.",
            "img.mimes" => "Il file immagine deve essere di tipo JPEG, PNG o JPG.",
        ];
    }

}

