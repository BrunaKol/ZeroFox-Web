@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @Administrator
            @include("layouts.menu")
            @endAdministrator
            @Korisnik
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">Moj profil</a>
                <a href="#" class="list-group-item list-group-item-action">Moji proizvodi</a>
                <a href="#" class="list-group-item list-group-item-action">Naslovna</a>
                <a href="#" class="list-group-item list-group-item-action">Shop</a>
                <a href="#" class="list-group-item list-group-item-action">ZeroFox</a>
            </div>
            @endKorisnik
            @Gost
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">Naslovna</a>
                <a href="#" class="list-group-item list-group-item-action">Shop</a>
                <a href="#" class="list-group-item list-group-item-action">ZeroFox </a>
             </div>
            @endGost
        </div>
        <div class="col-md-9"></div>
    </div>
</div>

@endsection