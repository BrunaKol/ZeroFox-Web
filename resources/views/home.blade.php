@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @Administrator
            @include("layouts.menu")
            @endAdministrator
            @Korisnik
            @include("layouts.korisnik")
            @endKorisnik
            @Gost
            @include("layouts.gost")
            @endGost
        </div>
        <div class="col-md-9"></div>
    </div>
</div>

@endsection