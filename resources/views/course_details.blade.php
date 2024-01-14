@extends('layouts.app')

@section('content')

    <section class="course-header-area">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="course-header-wrap">
                        <h1 class="title">{{ $course->title }}</h1>
                        <p class="subtitle">{{ $course->short_description }}</p>
                        <div class="rating-row">
                            {{--<span class="course-badge best-seller">Más vendido</span>--}}
                            <?php
                            for($i = 1; $i < 6; $i++):?>
                            <?php if ($i <= 5): ?>
                            <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                            <?php else: ?>
                            <i class="fas fa-star"></i>
                            <?php endif; ?>
                            <?php endfor; ?>
                            <span class="d-inline-block average-rating"><?php echo 5; ?></span>
                            <span>({{$palabraValoracion = $course->review() != null ? $course->review()->count() : 0}} {{$palabraValoracion = 1 ? "valoración" : "valoraciones"}})</span>
                            <span class="enrolled-num">
                                {{ $course->getUsersCountAttribute()}} estudiantes inscritos
                            </span>
                        </div>
                        <div class="created-row">
                            {{--<span class="created-by">--}}
                            {{--Creado por--}}
                            {{--<a href="">nombre_apellido</a>--}}
                            {{--</span>--}}
                            <span class="last-updated-date">Creado el {{date_format($course->created_at, 'd/m/Y')}}</span>
                            <span class="last-updated-date">Última actualización el {{date_format($course->updated_at, 'd/m/Y')}}</span>
                            {{--<span class="comment">
                                <i class="fas fa-comment"></i>Inglés
                            </span>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </section>

    <section class="course-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="what-you-get-box">
                        <div class="what-you-get-title">¿Qué aprenderé?</div>
                        <ul class="what-you-get__items">
                            @php
                                ##pasar $course->outcomes a un array, separando por comas  
                                $outcomes = explode(',', $course->outcomes);
                            @endphp
                            @foreach($outcomes as $outcome)
                                <li>{{ $outcome }}
                            @endforeach
                        </ul>
                    </div>
                    <br>
                    <div class="course-curriculum-box">
                        <div class="course-curriculum-title clearfix">
                            <div class="title float-left">Lecciones de este curso</div>
                            <div class="float-right  mt-2">
                                <span class="total-lectures">
                                    {{-- $course->lessons->count() --}} Duración
                                </span>
                                <span class="total-time">
                                {{$course->getTotalDuration()}}
                                </span>
                            </div>
                        </div>
                        <div class="course-curriculum-accordion">

                            <div class="lecture-group-wrapper">
                                <div class="lecture-group-title clearfix" data-toggle="collapse"
                                     data-target="#collapse"
                                     aria-expanded="false">
                                    <div class="title float-left">
                                        Lecciones
                                    </div>
                                    <div class="float-right">
                                        <span class="total-lectures">
                                            
                                        </span>
                                        <span class="total-time">
                                            
                                            {{ $course->lessons->count() }} lecciones
                                        </span>
                                    </div>
                                </div>

                                <div id="collapse" class="lecture-list collapse">
                                    <ul>
                                        @foreach($course->lessons as $lesson)
                                            <li class="lecture has-preview">
                                                <span class="lecture-title">{{ $lesson->title }}</span>
                                                <span class="lecture-time float-right">{{ $lesson->duration }}</span>
                                                <!-- <span class="lecture-preview float-right" data-toggle="modal" data-target="#CoursePreviewModal">Vista previa</span> -->
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="requirements-box">
                        <div class="requirements-title">Requisitos</div>
                        <div class="requirements-content">
                            <ul class="requirements__list">
                                <li>{{ $course->requirements }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="description-box view-more-parent">
                        <div class="view-more" onclick="viewMore(this,'hide')">
                            + Ver más
                        </div>
                        <div class="description-title">Descripción</div>
                        <div class="description-content-wrap">
                            <div class="description-content">
                                {!! $course->description !!}
                            </div>
                        </div>
                    </div>


                    <div class="compare-box view-more-parent d-none">
                        <div class="view-more" onclick="viewMore(this)">+ Ver más</div>
                        <div class="compare-title">Otros cursos relacionados</div>
                        <div class="compare-courses-wrap">

                        </div>
                    </div>

                    <div class="about-instructor-box d-none">
                        <div class="about-instructor-title">
                            Sobre el instructor
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="about-instructor-image">
                                    <img src="" alt="" class="img-fluid">
                                    <ul>
                                        <!-- <li><i class="fas fa-star"></i><b>4.4</b> Puntuación promedio</li> -->
                                        <li>
                                            <i class="fas fa-comment"></i><b>
                                                100
                                            </b> opiniones
                                        </li>
                                        <li><i class="fas fa-user"></i><b>
                                                120
                                            </b> estudiantes
                                        </li>
                                        <li>
                                            <i class="fas fa-play-circle"></i>
                                            <b>
                                                11
                                            </b> Cursos
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="about-instructor-details view-more-parent">
                                    <div class="view-more" onclick="viewMore(this)">+ Ver más</div>
                                    <div class="instructor-name">
                                        <a href=""></a>
                                    </div>
                                    <div class="instructor-title">
                                        título
                                    </div>
                                    <div class="instructor-bio">
                                        biografía
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="student-feedback-box">
                        <div class="student-feedback-title">
                            Comentarios de estudiantes
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-4">
                                <div class="average-rating">
                                    <div class="num">
                                        {{ $course->average }}
                                    </div>
                                    <div class="rating">
                                        <?php
                                        for($i = 1; $i < 6; $i++):?>
                                        <?php if ($i <= $course->average): ?>
                                        <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                                        <?php else: ?>
                                        <i class="fas fa-star" style="color: #abb0bb;"></i>
                                        <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="title">Puntuación promedio</div>
                                </div>
                            </div>
                            {{--<div class="col-lg-9">--}}
                                {{--<div class="individual-rating">--}}
                                    {{--<ul>--}}
                                        {{--@for($i = 1; $i <= 5; $i++)--}}
                                            {{--<li>--}}
                                                {{--<div class="progress">--}}
                                                    {{--<div class="progress-bar" style="width: 20%"></div>--}}
                                                {{--</div>--}}
                                                {{--<div>--}}
                                                    {{--<span class="rating">--}}
                                                        {{--@for($j = 1; $j <= (5 - $i); $j++)--}}
                                                            {{--<i class="fas fa-star"></i>--}}
                                                        {{--@endfor--}}
                                                        {{--@for($j = 1; $j <= $i; $j++)--}}
                                                            {{--<i class="fas fa-star filled"></i>--}}
                                                        {{--@endfor--}}
                                                    {{--</span>--}}
                                                    {{--<span>30%</span>--}}
                                                {{--</div>--}}
                                            {{--</li>--}}
                                        {{--@endfor--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="reviews">
                            <div class="reviews-title">Opiniones</div>
                            <ul>
                                @foreach($course->reviews as $review)
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="reviewer-details clearfix">
                                                    <div class="reviewer-img float-left">
                                                        <img src="{{asset('/images/' . $review->user->photo) }}" alt="">
                                                    </div>
                                                    <div class="review-time">
                                                        <div class="time">
                                                            {{ $review->created_at }}
                                                        </div>
                                                        <div class="reviewer-name">
                                                            {{ $review->user->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="review-details">
                                                    <div class="rating">
                                                        @for($i = 1; $i < 6; $i++)
                                                            @if ($i <= $review->rating)
                                                                <i class="fas fa-star filled"
                                                                   style="color: #f5c85b;"></i>
                                                            @else
                                                                <i class="fas fa-star" style="color: #abb0bb;"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="review-text">
                                                        {{ $review->review }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="course-sidebar natural">
                        <div class="preview-video-box">
                            <a data-toggle="modal" data-target="#CoursePreviewModal">
                                <img src="{{ asset('images/' . $course->thumbnail) }}" alt="" class="img-fluid">
                                {{--<span class="preview-text">Vista previa de este curso</span>--}}
                                {{--<span class="play-btn"></span>--}}
                            </a>
                        </div>
                        <div class="course-sidebar-text-box">
                            <div class="price">
                                <span class="current-price">
                                    $<span class="current-price">{{ $course->price }}</span></span>
                                <input type="hidden" id="total_price_of_checking_out" value="{{ $course->price }}">
                            </div>

                            {{--<div class="buy-btns">--}}
                            {{--<button class="btn btn-buy-now" type="button">Ya comprado</button>--}}
                            {{--</div>--}}
                            <div class="buy-btns">
                                @if(Cart::get($course->id))
                                    <a href="" class="btn btn-buy-now" id="course_2" onclick="handleBuyNow(this)">Comprar ahora</a>
                                    <button class="btn btn-add-cart addedToCart" type="button" id="{{ $course->id }}"
                                            onclick="handleCartItems(this)">Añadido al carrito
                                    </button>
                                @else
                                    <form action="{{ route('cart.add') }}" method="post">
                                        @csrf

                                        <input type="hidden" value="{{ $course->id }}" name="course_id">
                                        <input type="hidden" value="{{ $course->title }}" name="name">
                                        <input type="hidden" value="{{ $course->price }}" name="price">
                                        <input type="hidden" value="1" name="quantity">

                                        <button class="btn btn-add-cart" type="submit" id="{{ $course->id }}">Añadir al carrito
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <div class="includes">
                                <div class="title"><b>Incluye:</b></div>
                                <ul>
                                    <li class="d-none">
                                        <i class="far fa-file-video"></i>
                                        Videos a pedido
                                    </li>
                                    <li>
                                        <i class="far fa-file"></i> {{ $course->lessons->count() }} lecciones
                                    </li>
                                    <li><i class="far fa-compass"></i>Acceso de por vida
                                    </li>
                                    <li>
                                        <i class="fas fa-mobile-alt"></i>Acceso en dispositivos móviles y TV
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
