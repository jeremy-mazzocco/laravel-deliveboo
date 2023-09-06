@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-10 text-secondary my-4 text-center">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div>
                        @yield('dashboardSection')
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
