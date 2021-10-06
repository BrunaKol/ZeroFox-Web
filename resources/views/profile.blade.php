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

                    if (Auth::user()->profile == NULL){
                        abort (403, "You didn't create a profile.");
                    };
                    
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>E-mail</th>
                            <th>User role</th>
                            <th>Image</th>
                            <th>Gender</th>
                            <th>Birthday</th>
                        </tr>
                        
                        <tr>
                            <td>{{ Auth::user()->id}}</td>
                            <td>{{ Auth::user()->name}}</td>
                            <td>{{ Auth::user()->surname}}</td>
                            <td>{{ Auth::user()->email}}</td>
                            <td>{{ Auth::user()->role}}</td>
                            <td>{{Auth::user()->profile->image}}</td>
                            <td>{{Auth::user()->profile->gender}}</td>
                            <td>{{Auth::user()->profile->birthday}}</td>
                        </tr>
                    </table>
                    @endsection