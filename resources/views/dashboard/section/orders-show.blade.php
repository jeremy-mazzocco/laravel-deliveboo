@extends('dashboard.dashboard')

@section('dashboardSection')
    @php
        $orderNumber = 1;
    @endphp

    <h1 class="text-center fw-bold p-3">
        I TUOI ORDINI
    </h1>
    {{-- Schede e tabella switch --}}
    <div class="btn-group my-3 mx-auto bottoni-tab" role="group">
        <button id="btnSchede" type="button" class="nav-schede-tabella active">Schede</button>
        <button id="btnTabella" type="button" class="nav-schede-tabella">Tabella</button>
    </div>

    {{-- schede --}}


    <div class="orders-container row" id="schedeContainer">
        @foreach ($orders as $order)
            <div class="order-container">
                <div class="order col-3 gap-2">
                    <div class="order-status-container">
                        <h6 class="titolo-ordine">Ordine N: {{ $orderNumber }}</h6>
                        <p class=" @if ($order->status) bg-success @else bg-danger @endif text-light text-center"
                            id="stato-ordine">
                            <b>{{ $order->status ? 'Completato' : 'In elaborazione' }}</b>
                        </p>
                    </div>

                    <p class="order-time">Ordinazione: &nbsp&nbsp&nbsp&nbsp<span
                            class="order-time-text">{{ $order->created_at }}</span></p>

                    <div class="dettagli m-2 text-light">
                        <span>Dettagli:</span>
                        <i class="fa-solid fa-plus mx-2"></i>
                    </div>
                </div>


                <div class="order-details-container">
                    <div class="order-details my-2">
                        {{-- CUSTOMER INFO --}}
                        <div class="customer-info my-2">
                            <p id="p-title">
                                {{ $order->customer_name }}
                            </p>
                            <div class="customer-datails ">
                                <div>
                                    Indirizzo: {{ $order->customer_address }}
                                </div>
                                <div>
                                    Tel: {{ $order->phone_number }}
                                </div>
                                <div>
                                    Email: {{ $order->email }}
                                </div>
                            </div>
                        </div>

                        {{-- ORDER DETAILS --}}
                        <div class="order-info-container my-2">
                            <div class="order-info">
                                @foreach ($order->dishes as $dish)
                                    <div class="dish my-2">
                                        <p>{{ $dish->dish_name }}</p>
                                        <div>Prezzo: &euro; {{ $dish->price }}</div>
                                        <div>Quantità: {{ $dish->pivot->amount }}</div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="fs-5">
                                Totale: &euro;{{ $order->total_price }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $orderNumber++;
            @endphp
        @endforeach
    </div>


    {{-- table --}}
    @php
        $orderNumberTable = 1;
    @endphp
    <div class="container-table d-none">

        <div class="input-group my-3 w-50 mx-auto">
            <input type="text" id="searchInput" class="form-control" placeholder="Cerca...">
        </div>
        <div class="table-responsive">
            {{-- table for orders --}}
            <table id="TableId" class="table table-striped table-dark table-hover">
                <thead class="table-header">
                    <tr>
                        <th scope="col">Ordine</th>
                        <th scope="col">Data</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Totale</th>
                        <th scope="col">Email</th>
                        <th scope="col">Stato Ordine</th>
                        <th style="width: 16px;" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($orders as $order)
                        <tr>
                            <td scope="row">{{ $orderNumberTable }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->email }}</td>
                            <td class="{{ $order->status ? 'text-success' : 'text-danger' }}">
                                {{ $order->status ? 'Completato' : 'Elaborazione' }}</td>
                            <td style="width: 16px;"></td>
                        </tr>
                        @php
                            $orderNumberTable++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var searchInput = document.getElementById('searchInput');
                var tableRows = document.querySelectorAll('#TableId tbody tr');

                searchInput.addEventListener('input', function() {
                    var searchText = searchInput.value.toLowerCase();

                    tableRows.forEach(function(row) {
                        var rowData = row.textContent.toLowerCase();
                        if (rowData.includes(searchText)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var btnSchede = document.getElementById('btnSchede');
            var btnTabella = document.getElementById('btnTabella');
            var schedeContainer = document.getElementById('schedeContainer');
            var tabellaContainer = document.querySelector('.container-table');

            btnSchede.addEventListener('click', function() {
                schedeContainer.classList.remove('d-none');
                tabellaContainer.classList.add('d-none');
                btnSchede.classList.add('active');
                btnTabella.classList.remove('active');
            });

            btnTabella.addEventListener('click', function() {
                schedeContainer.classList.add('d-none');
                tabellaContainer.classList.remove('d-none');
                btnSchede.classList.remove('active');
                btnTabella.classList.add('active');
            });
        });
    </script>
@endsection
