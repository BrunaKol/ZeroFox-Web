@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.korisnik')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">My address</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<?php

                    if (Auth::user()->address == NULL){
                        abort (403, "You didn't add an address.");
                    };
                    
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Country</th>
                            <th>Postalcode</th>
                            <th>Region</th>
                            <th>Address</th>
                        </tr>
                        
                        <tr>
                            <td>{{ Auth::user()->address->country }}</td>
                            <td>{{ Auth::user()->address->postalcode }}</td>
                            <td>{{ Auth::user()->address->region }}</td>
                            <td>{{ Auth::user()->address->address }}</td>
                        </tr>
                    </table>
                    @endsection