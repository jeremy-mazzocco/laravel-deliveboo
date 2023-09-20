@extends('dashboard.dashboard')

@section('dashboardSection')
    <div class="card-header">
        <h1>Statistiche</h1>
        <p class="text-light text-center"><small>Fatturato AGOSTO 2023</small></p>
    </div>

    {{-- grafico --}}
    <canvas id="myChart" width="400" height="200"></canvas>

    <script>
        // Crea un array di numeri da 1 a 31
        const daysOfMonth = Array.from({
            length: 31
        }, (_, index) => index + 1);

        // Estrai i dati degli ordini da PHP
        const dailyTotals = @json($dailyTotals);

        // Estrai le date e i totali dai dati aggregati
        const dates = Object.keys(dailyTotals);
        const totals = Object.values(dailyTotals);

        // Creazione del grafico utilizzando Chart.js
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Valore degli ordini per giorno',
                    data: totals,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Giorni del mese'
                        },
                    },
                    y: {
                        beginAtZero: true,

                        title: {
                            display: true,
                            text: 'Valore (€)'
                        },
                        ticks: {
                            callback: function(value, index, values) {
                                return value + '€';
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
