<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <title>Deliveboo</title>
</head>

<body>
    <div id="customer-order">
        <div class="container">
            <h1>
                Ciao <span>{{ $newOrder->customer_name }}</span>
            </h1>
            <br>
            <p>
                Stiamo preparando il tuo ordine...
            </p>
            <br>

            <div class="txt">
                <p>
                    <b>Indirizzo di consegna: </b>
                    {{ $newOrder->customer_address }}
                </p>
                <div>
                    <b>Dettagli del tuo ordine: </b>
                    <ul>
                        @foreach ($newOrder['dishes'] as $dish)
                            <li>
                                {{ $dish->pivot->amount }}
                                {{ $dish->dish_name }}
                            </li>
                        @endforeach
                    </ul>
                    <b>Totale:</b> {{ $newOrder->total_price }}
                </div>
            </div>

            <br>
            <br>
            <hr>
            <br>
            <h3>
                {{ $user->restaurant_name }}
            </h3>
            <div>
                {{ $user->address }}
            </div>
            <div>
                {{ $user->email }}
            </div>
            <div>
                {{ $user->phone_number }}
            </div>
        </div>
    </div>
</body>

</html>
