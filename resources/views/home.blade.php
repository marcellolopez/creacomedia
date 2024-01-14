@extends('layouts.app')

@section('content')
    <section class="home-banner-area" style="background-image: url({{ asset('images/learning.jpg') }})">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <div class="home-banner-wrap" style="min-height: 250px">
                    {{--
                        <h2>El mejor lugar para aprender</h2>
                        <p>Aprende de cualquier tema, elige desde la categoría</p>
                        <form class="" action=""
                              method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search_string"
                                       placeholder="¿Qué quieres aprender?">
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-fact-area">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-4 d-flex">
                    <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                        <i class="fas fa-bullseye float-left"></i>
                        <div class="text-box">
                            <h4>{{ $courses->count() }} cursos en línea</h4>
                            <p>Explora una variedad de temas frescos</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex">
                    <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                        <i class="fa fa-check float-left"></i>
                        <div class="text-box">
                            <h4>Instrucción de expertos</h4>
                            <p>Encuentra el curso adecuado para ti   </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex">
                    <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                        <i class="fa fa-clock float-left"></i>
                        <div class="text-box">
                            <h4>Acceso de por vida</h4>
                            <p>Aprende a tu ritmo donde quieras      </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-carousel-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <h2 class="course-carousel-title">Mejores cursos</h2>
                    <div class="course-carousel">
                        @foreach (\App\Course::inRandomOrder()->get() as $top_course)
                            <div class="course-box-wrap">
                                <a href="{{ route('course_detail', $top_course) }}"
                                   class="has-popover">
                                    <div class="course-box">
                                        <div class="course-image">
                                            <img src="{{ asset('images/'. $top_course->thumbnail) }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="course-details">
                                            <h5 class="title">{{ $top_course->title }}</h5>
                                            <p class="instructors">{{ $top_course->short_description }}</p>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">5</span>
                                            </div>
                                            <p class="price text-right">
                                                ${{ $top_course->price }}
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <div class="webui-popover-content">
                                    <div class="course-popover-content">
                                        <div class="course-title">
                                            <a href="{{ route('course_detail', $top_course) }}">{{ $top_course->title }}</a>
                                        </div>
                                        <div class="course-meta">
                                            <span class=""><i class="fas fa-play-circle"></i>
                                                {{ $top_course->lessons->count() }} Lecciones
                                            </span>
                                            <span class=""><i class="far fa-clock"></i>
                                                2 Horas
                                            </span>
                                            <span class="">
                                                <i class="fas fa-closed-captioning"></i> Inglés
                                            </span>
                                        </div>
                                        <div class="course-subtitle">{{ $top_course->short_description }}</div>
                                        <div class="what-will-learn">
                                            <ul>
                                                {{ $top_course->outcomes }}
                                            </ul>
                                        </div>
                                        <div class="popover-btns">
                                            @if(auth()->check() && \App\Enroll::whereCourseId($top_course->id)->first() !== null)
                                                <div class="purchased">
                                                    <a href="#">Ya comprado</a>
                                                </div>
                                            @elseif(Cart::get($top_course->id) !== null)
                                                <button type="button"
                                                        class="btn add-to-cart-btn addedToCart big-cart-button-1"
                                                        id="1">
                                                    Añadido al carrito
                                                </button>
                                            @else
                                                <button type="button"
                                                        class="btn add-to-cart-btn addedToCart big-cart-button-1"
                                                        id="1">
                                                    Añadir al carrito
                                                </button>
                                            @endif
                                            <button type="button"
                                                    class="wishlist-btn"
                                                    title="Agregar a la lista de deseos"
                                                    id="1"><i class="fas fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-carousel-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <h2 class="course-carousel-title">Top 10 cursos más recientes</h2>
                    <div class="course-carousel">
                        @foreach($courses as $course)
                            <div class="course-box-wrap">
                                <a href="{{ route('course_detail', $course) }}">
                                    <div class="course-box">
                                        <div class="course-image">
                                            <img src="{{ asset('images/'. $course->thumbnail) }}" alt="" class="img-fluid">                                        
                                        </div>
                                        <div class="course-details">
                                            <h5 class="title">{{ $course->title }}</h5>
                                            <p class="instructors">Nombre y apellido del instructor</p>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">{{$course->getAverageAttribute()}}</span>
                                            </div>
                                            <p class="price text-right">
                                                ${{$course->price}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
