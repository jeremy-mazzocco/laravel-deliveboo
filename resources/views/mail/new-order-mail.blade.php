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
        Ciao {{ $newOrder->customer_name }} !
    </h1>
    <p>
        Stiamo preparando il tuo ordine...
    </p>
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

    <hr>

    <h3>
        {{ $user->restaurant_name }}
    </h3>
    <ul style="list-style: none">
        <li>
            {{ $user->address }}
        </li>
        <li>
            {{ $user->email }}
        </li>

        <li>
            {{ $user->phone_number }}
        </li>
    </ul>



</body>

</html>
