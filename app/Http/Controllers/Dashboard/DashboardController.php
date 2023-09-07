<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Type;
use App\Models\Dish;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// importazione di Auth per usare Auth::user()
// use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard.section.home-user');
    }
    public function show()
    {
        // accedo all'id dell'user loggato
        // $userId = Auth::user()->id;
        // cerco il piatto dove user_id è uguale all'id dell'user loggato
        // $dishes = Dish::where('user_id', $userId)->get();

        return view('dashboard.section.dish-show');
    }

    public function create()
    {
        $types = Type::all();

        return view('dashboard.section.dish-create', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(

            $this->getValidations(),
            $this->getValidationMessages(),

        );

        $userId = Auth::user()->id;

        $data['user_id'] = $userId;

        $img_path = Storage::put('uploads', $data['img']);
        $data['img'] = $img_path;

        /* $img_path = Storage :: put('uploads', $data['img']);
        $data['img'] = $img_path; */

        $dish = Dish::create($data);
        /* $dish -> technologies() -> attach($data['technologies']); */

        return redirect()->route('dish.show');
    }

    public function edit($id)
    {

        $dish = Dish::findOrFail($id);

        return view('dashboard.section.dish-edit', compact('dish'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate(
            $this->getValidations(),
            $this->getValidationMessages()
        );

        $dish = Dish::findOrFail($id);

        // gestione img

        $oldImgPath = $dish->img;

        if (!array_key_exists("img", $data)) {
            $data['img'] = $oldImgPath;
        } else {
            if ($dish->img){
                Storage::delete($oldImgPath);
            }
            $newImgPath = Storage::put('uploads', $data['img']);
            $data['img'] = $newImgPath;
        }

        $dish->update($data);

        return redirect()->route('dish.show');
    }

    public function changeDeleted($id)
    {

        $dish = Dish::findOrFail($id);
        $dish['deleted'] = !$dish['deleted'];

        $dish->save();
        return redirect()->route('dish.show');
    }

    // Elimina l'immagine di un progetto
    public function deleteImg($id) {
        $dish = Dish::findOrFail($id);

        $img_path = $dish->img;

        // Elimina fisicamente l'immagine
        if ($img_path ) {
            Storage::delete($img_path);
        }

        $dish->img = null;
        $dish->save();

        return back();
    }



    // VALIDATION FUCTIONS

    private function getValidations()
    {

        return [
            'dish_name' => ['required', 'min:2', 'max:64'],
            'description' => ['max:1275'],
            'price' => ['required', 'numeric', 'min:0'],
            // 'img' => ['image', 'max:255', 'mimes:jpeg,png,jpg'],
            // max 255 da errore
            'img' => ['image', 'mimes:jpeg,png,jpg'],
            'visibility' => ['required']
        ];
    }

    private function getValidationMessages()
    {

        return [
            'dish_name' => 'dato non corretto',
            'description' => 'dato non corretto',
            'price' => 'dato non corretto',
            'img' => 'errore caricamento immagine',
            // 'img.max' => 'errore in max',
            'visibility' => 'dato non corretto'
        ];
    }
}
