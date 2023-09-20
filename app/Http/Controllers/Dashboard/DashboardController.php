<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Type;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class DashboardController extends Controller
{
    public function index()
    {
        // Metodo per visualizzare la pagina principale del pannello di controllo
        return view('dashboard.section.home-user');
    }

    public function show()
    {
        // Metodo per visualizzare i piatti dell'utente loggato
        // Puoi implementare la logica qui per recuperare i piatti dell'utente.
        return view('dashboard.section.dish-show');
    }

    public function create()
    {
        // Metodo per visualizzare il formulario di creazione dei piatti
        $types = Type::all();

        return view('dashboard.section.dish-create', compact('types'));
    }

    public function store(Request $request)
    {
        // Metodo per salvare un nuovo piatto nel database
        $data = $request->validate(
            $this->getValidations(),
            $this->getValidationMessages()

        );

        if (array_key_exists('img', $data) && $data['img'] !== null) {
            $img_path = Storage::put('uploads', $data['img']);
        } else {
            $img_path = null;
        }

        $userId = Auth::user()->id;
        $data['user_id'] = $userId;
        $data['img'] = $img_path;

        $dish = Dish::create($data);

        return redirect()->route('dish.show');
    }

    public function edit($id)
    {
        // Metodo per visualizzare il formulario di modifica di un piatto
        $dish = Dish::findOrFail($id);

        return view('dashboard.section.dish-edit', compact('dish'));
    }

    public function update(Request $request, $id)
    {
        // Metodo per aggiornare i dati di un piatto esistente
        $data = $request->validate(
            $this->getValidations(),
            $this->getValidationMessages()
        );

        $dish = Dish::findOrFail($id);

        // Gestione dell'immagine
        $oldImgPath = $dish->img;

        if (!array_key_exists("img", $data)) {
            $data['img'] = $oldImgPath;
        } else {
            if ($dish->img) {
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
        // Metodo per cambiare lo stato "deleted" di un piatto
        $dish = Dish::findOrFail($id);
        $dish['deleted'] = !$dish['deleted'];

        $dish->save();
        return redirect()->route('dish.show');
    }

    public function deleteImg($id)
    {
        // Metodo per eliminare l'immagine associata a un piatto
        $dish = Dish::findOrFail($id);
        $img_path = $dish->img;

        if ($img_path) {
            Storage::delete($img_path);
        }

        $dish->img = null;
        $dish->save();

        return back();
    }

    public function showOrders($id)
    {
        // Metodo per visualizzare gli ordini associati ai piatti dell'utente
        $orders = Order::with('dishes')
            ->whereHas('dishes', function ($query) use ($id) {
                $query->where('user_id', $id);
            })
            ->get();

        return view('dashboard.section.orders-show', compact('orders'));
    }
    public function showStatistics($id)
    {
        // Metodo per visualizzare gli ordini associati ai piatti dell'utente
        $orders = Order::with('dishes')
            ->whereHas('dishes', function ($query) use ($id) {
                $query->where('user_id', $id);
            })
            ->get();

        // Creazione di un array inizializzato con zeri per tutti i giorni del mese (da 1 a 31)
        $dailyTotals = array_fill(1, 31, 0);

        // Calcola il totale per ogni giorno
        foreach ($orders as $order) {
            $dayOfMonth = (int)$order->created_at->format('d');
            $total = $order->total_price;

            // Aggiorna il totale per il giorno del mese corrente
            $dailyTotals[$dayOfMonth] += $total;
        }

        return view('dashboard.section.statistics', compact('dailyTotals', 'orders'));
    }


    // FUNZIONI DI VALIDAZIONE

    private function getValidations()
    {
        // Definizione delle regole di validazione per i dati del piatto
        return [
            'dish_name' => ['required', 'min:2', 'max:64'],
            'description' => ['max:1275'],
            'price' => ['required', 'numeric', 'min:0'],
            'img' => ['image', 'mimes:jpeg,png,jpg'],
            'visibility' => ['required']
        ];
    }

    private function getValidationMessages()
    {
        // Definizione dei messaggi di errore personalizzati per le regole di validazione
        return [
            'dish_name.required' => 'Il nome del piatto è obbligatorio.',
            'dish_name.min' => 'Il nome del piatto deve essere lungo almeno 2 caratteri.',
            'dish_name.max' => 'Il nome del piatto non può superare i 64 caratteri.',
            'description.max' => 'La descrizione non può superare i 1275 caratteri.',
            'price.required' => 'Il prezzo del piatto è obbligatorio.',
            'price.numeric' => 'Il prezzo del piatto deve essere un numero.',
            'price.min' => 'Il prezzo del piatto non può essere negativo.',
            'img.image' => 'Il file deve essere un\'immagine valida.',
            'img.mimes' => 'Il file immagine deve essere di tipo JPEG, PNG o JPG.',
            'visibility.required' => 'La visibilità del piatto è obbligatoria.'
        ];
    }
}
