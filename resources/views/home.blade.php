@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Administracija korisnika</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#addUsersModal"> Dodaj korisnika</button>
                    <table class="table table-bordered">
                        <tr>
                            <th>#ID</th>
                            <th>Ime korisnika</th>
                            <th>Prezime korisnika</th>
                            <th>E-mail korisnika</th>
                            <th>Uloga korisnika</th>
                            <th>Vrijeme registracije</th>
                            <th>Akcije</th>

                        </tr>
                        
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href='{{route("users.delete", $user->id)}}' class="btn btn-light">Pobriši</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                    <div class="modal fade" id="addUsersModal" tabindex="-1" role="dialog" aria-labelledby="addUsersModalLabel" aria-hidden="true">
                        <form id="addUsersForm" method="POST" action="{{route('users.add')}}">
                            @csrf
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUsersLabel">Dodavanje korisnika</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Ime Korisnika</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Unesite ime korisnika">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="surname">Prezime Korisnika</label>
                                <input type="text" class="form-control  @error('surname') is-invalid @enderror" name="surname" id="surname" placeholder="Unesite prezime korisnika">
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email korisnika</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="Unesite email korisnika">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Lozinka korisnika</label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" placeholder="Unesite lozinku korisnika">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Ponovite lozinku korisnika</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Ponovite lozinku korisnika">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                            <button id="addUserBtn" type="submit" class="btn btn-primary">Spremi promjene</button>
                            </div>
                        </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
