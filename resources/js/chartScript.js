import Chart from 'chart.js';
import { DateTime } from 'luxon';

Chart._adapters._date.override({
    format: (date, fmt) => {
        return DateTime.fromISO(date).toFormat(fmt);
    },
    add: (date, amount, unit) => {
        return DateTime.fromISO(date).plus({ [unit]: amount }).toISO();
    },
    diff: (max, min, unit) => {
        return DateTime.fromISO(max).diff(DateTime.fromISO(min), unit).toObject()[unit];
    }
});

const dailyTotals = window.dailyTotals;
const dates = Object.keys(dailyTotals);
const totals = Object.values(dailyTotals);

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
                type: 'time',
                time: {
                    unit: 'day',
                    displayFormats: {
                        day: 'YYYY-MM-DD'
                    }
                }
            },
            y: {
                beginAtZero: true,
                // Altre opzioni per l'asse Y se necessario
            }
        }
    }
});
