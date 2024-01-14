<footer class="footer-area">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-6">
                <ul class="nav justify-content-md-end footer-menu">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="">Política de privacidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="">Términos y condiciones</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content sign-in-modal">
            <div class="modal-header">
                <h5 class="modal-title">¡Inicia sesión en tu cuenta!</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <span class="input-field-icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Correo electrónico">
                    </div>
                    <div class="input-group">
                        <span class="input-field-icon"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    <div class="forgot-pass">
                        <span>o</span>
                        <a href="" data-toggle="modal" data-target="#forgotModal" data-dismiss="modal">¿Olvidaste la contraseña?</a>
                    </div>
                </form>
                <div class="account-have">
                    ¿No tienes una cuenta? <a href="" data-toggle="modal" data-target="#signUpModal" data-dismiss="modal">Regístrate</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- Modal -->

<!-- Rating Modal -->
<div class="modal fade multi-step" id="EditRatingModal" tabindex="-1" role="dialog" aria-hidden="true"
     reset-on-close="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content edit-rating-modal">
            <div class="modal-header">
                <h5 class="modal-title step-1" data-step="1">Paso 1</h5>
                <h5 class="modal-title step-2" data-step="2">Paso 2</h5>
                <h5 class="m-progress-stats modal-title">
                    &nbsp;de&nbsp;<span class="m-progress-total"></span>
                </h5>

                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-progress-bar-wrapper">
                <div class="m-progress-bar">
                </div>
            </div>
            <form action="{{ route('add.review') }}" method="post">
                @csrf
                <div class="modal-body step step-1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="modal-rating-box">
                                    <h4 class="rating-title">¿Cómo calificarías este curso en general?</h4>
                                    <fieldset class="your-rating">

                                        <input type="radio" id="star5" name="rating" value="5"/>
                                        <label class="full" for="star5"></label>

                                        <input type="radio" id="star4" name="rating" value="4"/>
                                        <label class="full" for="star4"></label>

                                        <input type="radio" id="star3" name="rating" value="3"/>
                                        <label class="full" for="star3"></label>

                                        <input type="radio" id="star2" name="rating" value="2"/>
                                        <label class="full" for="star2"></label>

                                        <input type="radio" id="star1" name="rating" value="1"/>
                                        <label class="full" for="star1"></label>

                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-course-preview-box">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" id="course_thumbnail_1" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title" class="course_title_for_rating"
                                                id="course_title_1"></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body step step-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="modal-rating-comment-box">
                                    <h4 class="rating-title">Escribe una reseña</h4>
                                    <textarea id="review_of_a_course" name="review"
                                              placeholder="Describe tu experiencia y lo que obtuviste de este curso"
                                              maxlength="1000" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-course-preview-box">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" id="course_thumbnail_2" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title" class="course_title_for_rating"
                                                id="course_title_2"></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="course_id" id="course_id_for_rating" value="">
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary next step step-1" data-step="1"
                            onclick="sendEvent(2)">Siguiente
                    </button>
                    <button type="button" class="btn btn-primary previous step step-2 mr-auto" data-step="2"
                            onclick="sendEvent(1)">Anterior
                    </button>
                    <button type="submit" class="btn btn-primary publish step step-2" id="">Publicar</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content sign-in-modal">
            <div class="modal-header">
                <h5 class="modal-title">¿Olvidaste tu contraseña?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control forgot-email" placeholder="Correo electrónico">
                    </div>
                    <div class="forgot-pass-btn">
                        <button type="submit" class="btn btn-primary d-inline-block">Restablecer contraseña</button>
                        <span>o</span>
                        <a href="" data-toggle="modal" data-target="#signInModal" data-dismiss="modal">Iniciar sesión</a>
                    </div>
                </form>
                <div class="forgot-recaptcha">

                </div>
            </div>
        </div>
    </div>
</div><!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content sign-in-modal">
            <div class="modal-header">
                <h5 class="modal-title">¡Regístrate y comienza a aprender!</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <span class="input-field-icon"><i class="fas fa-user"></i></span>
                        <input type="text" name="first_name" class="form-control"
                               placeholder="Nombre">
                    </div>
                    <div class="input-group">
                        <span class="input-field-icon"><i class="fas fa-user"></i></span>
                        <input type="text" name="last_name" class="form-control"
                               placeholder="Apellido">
                    </div>
                    <div class="input-group">
                        <span class="input-field-icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control"
                               placeholder="Correo electrónico">
                    </div>
                    <div class="input-group">
                        <span class="input-field-icon"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control"
                               placeholder="Contraseña">
                    </div>
                    <div class="input-group">
                        <span class="input-field-icon"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Confirmar contraseña">
                    </div>
                    <div class="custom-control custom-checkbox deal-checkbox">
                        <input type="checkbox" class="custom-control-input" id="dealCheckbox">
                        <label class="custom-control-label" for="dealCheckbox">
                            Marca aquí para recibir ofertas emocionantes y recomendaciones de cursos personalizadas.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>
                <div class="agreement-text">
                    Al registrarte, aceptas nuestros
                    <a href="">Términos de uso</a> y <a
                            href="">Política de privacidad</a>.
                </div>
                <div class="account-have">
                    ¿Ya tienes una cuenta?
                    <a href="" data-toggle="modal" data-target="#signInModal" data-dismiss="modal">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- Modal -->

{{--modal de pago--}}
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content payment-in-modal">
            <div class="modal-header">
                <h5 class="modal-title">¡Compra ahora!</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('enroll') }}" method="get">
                            <input type="hidden" class="total_price_of_checking_out" name="total_price_of_checking_out"
                                   value="">
                            <button type="submit" class="btn btn-default paypal">
                                Paypal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Modal -->
