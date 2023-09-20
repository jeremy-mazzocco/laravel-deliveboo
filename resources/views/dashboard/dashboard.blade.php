@extends('layouts.app')

@section('content')
    <div class="dashboard" id="dashboard-container">
        <div class="left-nav">
            <div class="text-nav">
                <a href="{{ route('dashboard.home') }}" class="text-decoration-none">
                    Dashboard
                </a>
            </div>
            <div class="text-nav">
                <a href="{{ route('dish.show') }}" class="text-decoration-none">
                    I tuoi Piatti
                </a>
            </div>
            <div class="text-nav">
                <a href="{{ route('dish.create') }}" class="text-decoration-none">
                    Aggiungi Piatto
                </a>
            </div>
            <div class="text-nav">
                <a href="{{ route('orders.show', Auth::user()->id) }}" class="text-decoration-none">
                    Ordini clienti
                </a>
            </div>
            <div class="text-nav">
                <a href="{{ route('orders.statistics', Auth::user()->id) }}" class="text-decoration-none">
                    Statistiche
                </a>
            </div>
        </div>
        <div class="container-fluid dashboard-home">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('dashboardSection')

            </div>
        </div>
    </div>
@endsection
