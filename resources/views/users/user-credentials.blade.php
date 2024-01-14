@extends('layouts.app')

@section('content')

    <section class="user-dashboard-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="user-dashboard-box">
                        <div class="user-dashboard-sidebar">
                            <div class="user-box">
                                <img src="{{ asset('/images/'. auth()->user()->photo) }}" alt="" class="img-fluid">
                                <div class="name">
                                    <div class="name">{{ auth()->user()->first_name .' '. auth()->user()->last_name }}</div>
                                </div>
                            </div>
                            <div class="user-dashboard-menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('user.profile') }}">Perfil</a>
                                    </li>
                                    <li class="active">
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
                                <div class="title">Cuenta</div>
                                <div class="subtitle">Edita la configuración de tu cuenta.</div>
                            </div>
                            <form action="{{ route('user.credentials.update') }}" method="post">
                                @csrf
                                <div class="content-box">
                                    <div class="email-group">
                                        <div class="form-group">
                                            <label for="email">Correo electrónico:</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                   placeholder="correo electrónico"
                                                   value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                    <div class="password-group">
                                        <div class="form-group">
                                            <label for="password">Contraseña:</label>
                                            <input type="password" class="form-control" id="current_password"
                                                   name="current_password"
                                                   placeholder="Ingresa la contraseña actual">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="new_password"
                                                   placeholder="Ingresa la nueva contraseña">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="confirm_new_password"
                                                   placeholder="Confirma tu contraseña">
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
