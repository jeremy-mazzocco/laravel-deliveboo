<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo</title>
</head>

<body>

    <h2>
        Ciao {{ $newOrder->customer_name }} !
    </h2>
    <h4>
        Stiamo preparando il tuo ordine...
    </h4>
    <p>
        <b>Indirizzo di consegna: </b>
        {{ $newOrder->customer_address }}
    </p>
    <p>
        <b>Dettagli del tuo ordine: </b>
    <ul>
        @foreach ($newOrder['dishes'] as $dish)
            <li>
                {{ $dish->pivot->amount }}
                {{ $dish->dish_name }}
            </li>
        @endforeach
    </ul>
    </p>

    {{-- <h2>
        {{ $user->restaurant_name }}
    </h2> --}}

</body>

</html>
