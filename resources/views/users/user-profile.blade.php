@extends('layouts.app')

@section('content')

    <section class="user-dashboard-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="user-dashboard-box">
                        <div class="user-dashboard-sidebar">
                            <div class="user-box">
                                <img src="{{ asset('/images/'.auth()->user()->photo) }}" alt="" class="img-fluid">
                                <div class="name">
                                    <div class="name">{{ auth()->user()->first_name .' '. auth()->user()->last_name }}</div>
                                </div>
                            </div>
                            <div class="user-dashboard-menu">
                                <ul>
                                    <li class="active">
                                        <a href="{{ route('user.profile') }}">Perfil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.credentials') }}">Cuenta</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.photo') }}">Foto</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="user-dashboard-content">
                            <div class="content-title-box">
                                <div class="title">Perfil</div>
                                <div class="subtitle">Agrega información sobre ti para compartir en tu perfil.
                                </div>
                            </div>
                            <form action="{{ route('user.profile.update') }}" method="post">
                                @csrf
                                <div class="content-box">
                                    <div class="basic-group">
                                        <div class="form-group">
                                            <label for="FristName">Datos básicos:</label>
                                            <input type="text" class="form-control" name="first_name" id="FristName"
                                                   placeholder="nombre" value="{{ auth()->user()->first_name }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="last_name"
                                                   placeholder="apellido" value="{{ auth()->user()->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="content-update-box">
                                    <button type="submit" class="btn">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
