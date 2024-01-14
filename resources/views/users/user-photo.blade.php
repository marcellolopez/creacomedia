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
                                    <li>
                                        <a href="{{ route('user.profile') }}">Perfil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.credentials') }}">Cuenta</a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ route('user.photo') }}">Foto</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="user-dashboard-content">
                            <div class="content-title-box">
                                <div class="title">Foto</div>
                                <div class="subtitle">Actualiza tu foto.</div>
                            </div>
                            <form action="{{ route('user.photo.update') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="content-box">
                                    <div class="email-group">
                                        <div class="form-group">
                                            <label for="user_image">Subir imagen:</label>
                                            <input type="file" class="form-control" name="user_image" id="user_image">
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
