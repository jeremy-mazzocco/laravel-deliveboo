@extends('layouts.app')
@section('content')
    <div class="container">

        @include('profile.partials.update-profile-information-form')

        @include('profile.partials.update-password-form')

        {{--
        <div class="card p-4 mb-4 bg-white shadow rounded-lg">
            @include('profile.partials.delete-user-form')
        </div> --}}
    </div>
@endsection
