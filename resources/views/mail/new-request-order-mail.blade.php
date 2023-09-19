<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo</title>
</head>

<body>

    <h1>
        Salve {{ $user->restaurant_name }} !
    </h1>
    <p>
        Abbiamo un nuovo ordine...
    </p>
    <ul style="list-style: none">
        <li>
            <b>Cliente: </b>
            {{ $newOrder->customer_name }}
        </li>
        <li>
            <b>Indirizzo di consegna: </b>
            {{ $newOrder->customer_address }}
        </li>
        <li>
            {{ $newOrder->phone_number }}
        </li>
        <li>
            {{ $newOrder->email }}
        </li>
    </ul>
    <div>
        <b>Dettagli ordine: </b>
        <ul>
            @foreach ($newOrder['dishes'] as $dish)
                <li>
                    {{ $dish->pivot->amount }}
                    {{ $dish->dish_name }}
                </li>
            @endforeach
        </ul>
        Totale: {{ $newOrder->total_price }}
    </div>

    <hr>


</body>

</html>
