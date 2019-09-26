@extends('layouts.app')

@section('content')
    <!-- Header Section Start -->
    <header id="slider-area">
        <nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="/img/icon/logo.png" alt="BestConstruct">BestConstruct</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#carousel-area">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#services">Сервисы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#features">Характеристики</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#portfolios">Портфолио</a>
                        </li>
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link page-scroll" href="#pricing">Ценообразование</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link page-scroll" href="#team">Команда</a>--}}
                        {{--</li>--}}
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#subscribe">Заказать услугу</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#contact">Контакт</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Carousel Section -->
        <div id="carousel-area">
            <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    @if(isset($images) && is_object($images))
                        @foreach($images as $i => $image)
                            <li data-target="#carousel-slider" data-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></li>
                        @endforeach
                    @endif
                </ol>
                <div class="carousel-inner" role="listbox">
                    @if(isset($images) && is_object($images))
                        @foreach($images as $i => $image)
                            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                <img src="{{ asset('img') . '/slider/' . $image->image }}" alt="{{ $image->image }}">
                                <div class="carousel-caption text-left">
                                    <h2 class="wow fadeInRight" data-wow-delay="0.4s">{{ $image->name }}</h2>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
                <a class="carousel-control-prev" href="#carousel-slider" role="button" data-slide="prev">
                    <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-slider" role="button" data-slide="next">
                    <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </header>
    <!-- Header Section End -->

    <!-- Services Section Start -->
    <section id="services" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Наши Услуги</h2>
                <span>Услуги</span>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.2s">
                        <div class="icon color-1">
                            <i class="lni-ruler-pencil"></i>
                        </div>
                        <h4><strong>Проектирование зданий и сооружений</strong></h4>
                        <p>Предлагаем услуги по разработке комплексных проектов, для строительства ластних домов, обществених и производственных помещений.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.4s">
                        <div class="icon color-2">
                            <i class="lni-paint-roller"></i>
                        </div>
                        <h4><strong>Внутренние отделочные работы</strong></h4>
                        <p>Наша компания предлагает укладку ламината, поклейку обоев, установку дверей и другие отделочные работы. Большой опыт и богатая практика на российском рынке свидетельствуют о высоком качестве выполняемых услуг.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.6s">
                        <div class="icon color-3">
                            <i class="lni-brick"></i>
                        </div>
                        <h4><strong>Строительство</strong></h4>
                        <p>Наша компания обладает необходимым опытом и ресурсами для проведения комплексных проектных и строительно-монтажных работ, осуществляя качественное строительство здания под ключ и подготавливая его к сдаче и приемке независимой комиссии.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.8s">
                        <div class="icon color-4">
                            <i class="lni-road"></i>
                        </div>
                        <h4><strong>Асфальтирование</strong></h4>
                        <p>Мы предлагаем своим клиентам профессиональную укладку асфальта, устройство оснований, озеленение и благоустройство под ключ, подкрепленное фирменной гарантией на выполняемые работы.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="item-boxes services-item wow fadeInDown" data-wow-delay="1s">
                        <div class="icon color-5">
                            <i class="lni-construction-hammer"></i>
                        </div>
                        <h4><strong>Благоустройство</strong></h4>
                        <p>
                            Мы предлагаем широкий спектр услуг по благоустройству территорий, который призван удовлетворить любые запросы самых требовательных заказчиков.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="item-boxes services-item wow fadeInDown" data-wow-delay="1.2s">
                        <div class="icon color-6">
                            <i class="lni-invention"></i>
                        </div>
                        <h4><strong>Электромонтаж</strong></h4>
                        <p>Мы предлагаем профессиональные услуги в сфере организации электроустановочных работ. Основными направлениями нашей деятельности являются проектирование электрики на объекте, ремонт сетей электроснабжения и освещения, а также монтаж оборудования любой сложности.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Call to Action Start -->
    <section class="call-action section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="cta-trial text-center">
                        <h3>Готовы ли вы начать свой проект?</h3>
                        <p>Расскажите нам о вашем проекте</p>
                        <a href="#subscribe" class="btn btn-common btn-effect">Начать!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to Action End -->

    <!-- Features Section Start -->
    <section id="features" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Почему нас</h2>
                <span>Почему</span>
            </div>
            <div class="row">
                <!-- Start featured -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="featured-box">
                        <div class="featured-icon">
                            <i class="lni-timer"></i>
                        </div>
                        <div class="featured-content">
                            <div class="icon-o"><i class="lni-timer"></i></div>
                            <h4>Ответственность</h4>
                            <p>Наша команда закончит работу в срок.</p>
                        </div>
                    </div>
                </div>
                <!-- End featured -->
                <!-- Start featured -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="featured-box">
                        <div class="featured-icon">
                            <i class="lni-school-compass"></i>
                        </div>
                        <div class="featured-content">
                            <div class="icon-o"><i class="lni-school-compass"></i></div>
                            <h4>Дизайна</h4>
                            <p>Проект начинается с четких измерений и дизайна.</p>
                        </div>
                    </div>
                </div>
                <!-- End featured -->
                <!-- Start featured -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="featured-box">
                        <div class="featured-icon">
                            <i class="lni-rocket"></i>
                        </div>
                        <div class="featured-content">
                            <div class="icon-o"><i class="lni-rocket"></i></div>
                            <h4>Строим быстро и надолго</h4>
                            <p>Наша команда всегда соблюдает сроки и гарантирует высокое качество</p>
                        </div>
                    </div>
                </div>
                <!-- End featured -->
                <!-- Start featured -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="featured-box">
                        <div class="featured-icon">
                            <i class="lni-stats-up"></i>
                        </div>
                        <div class="featured-content">
                            <div class="icon-o"><i class="lni-stats-up"></i></div>
                            <h4>Современные решения</h4>
                            <p>Своевременно предлагаем новые варианты решения.</p>
                        </div>
                    </div>
                </div>
                <!-- End featured -->
                <!-- Start featured -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="featured-box">
                        <div class="featured-icon">
                            <i class="lni-leaf"></i>
                        </div>
                        <div class="featured-content">
                            <div class="icon-o"><i class="lni-leaf"></i></div>
                            <h4>Чистотой</h4>
                            <p>Работа выполнена с чистотой.</p>
                        </div>
                    </div>
                </div>
                <!-- End featured -->
                <!-- Start featured -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="featured-box">
                        <div class="featured-icon">
                            <i class="lni-home"></i>
                        </div>
                        <div class="featured-content">
                            <div class="icon-o"><i class="lni-home"></i></div>
                            <h4>Долгожительство проекта</h4>
                            <p>Добросовестное выполнение проделанной работы обеспечивает долгожительство проекта.</p>
                        </div>
                    </div>
                </div>
                <!-- End featured -->
            </div>
        </div>
    </section>
    <!-- Features Section End -->

    <!-- Start Video promo Section -->
    <section class="video-promo section">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="video-promo-content text-center">
                        {{--<a class="video-popup"><i class="lni-play"></i></a>--}}
                        <h2 class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms">BEST CONSTRUCT</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Video Promo Section -->

    <!-- Portfolio Section -->
    <section id="portfolios" class="section">
        <!-- Container Starts -->
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Наш Портфолио</h2>
                <span>Портфолио</span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Portfolio Controller/Buttons -->
                    <div class="controls text-center">
                        <a class="filter active btn btn-common btn-effect" data-filter="all">
                            Все
                        </a>
                        @if(isset($categories) && is_object($categories))
                            @foreach($categories as $i => $category)
                                <a class="filter btn btn-common btn-effect" data-filter="{{ '.category-'.$category->code }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        @endif
                    </div>
                    <!-- Portfolio Controller/Buttons Ends-->
                </div>
            </div>

            <!-- Portfolio Recent Projects -->
            <div id="portfolio" class="row">
                @if(isset($portfolios))
                    @foreach($portfolios as $portfolio)
                        <div class="col-lg-4 col-md-6 col-xs-12 mix @foreach($portfolio->categories as $category) {{ 'category-'.$category }} @endforeach">
                            <div class="portfolio-item">
                                <div class="shot-item">
                                    <div class="lightgallery">
                                        @foreach($portfolio->images as $image)
                                            @if($image->is_main === 1)
                                                <a href="{{ $image->photo_path }}" class="main-img">
                                                    <i class="lni-zoom-in item-icon zoom-icon"></i>
                                                    <img src="{{ $image->photo_path }}" alt="{{ $portfolio->name }}" />
                                                </a>
                                            @else
                                                <a href="{{ $image->photo_path }}" class="d-none">
                                                    <img src="{{ $image->photo_path }}" alt="{{ $portfolio->name }}" />
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif

            </div>
        </div>
        <!-- Container Ends -->
    </section>
    <!-- Portfolio Section Ends -->

    <!-- Start Pricing Table Section -->
    {{--<div id="pricing" class="section pricing-section">--}}
        {{--<div class="container">--}}
            {{--<div class="section-header">--}}
                {{--<h2 class="section-title">ПЛАНЫ ЦЕНЫ</h2>--}}
                {{--<span>Цены</span>--}}
                {{--<p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p>--}}
            {{--</div>--}}

            {{--<div class="row pricing-tables">--}}
                {{--<div class="col-lg-4 col-md-4 col-xs-12">--}}
                    {{--<div class="pricing-table">--}}
                        {{--<div class="pricing-details">--}}
                            {{--<h2>Starter Plan</h2>--}}
                            {{--<div class="price">49$ <span>/mo</span></div>--}}
                            {{--<ul>--}}
                                {{--<li>Consectetur adipiscing</li>--}}
                                {{--<li>Nunc luctus nulla et tellus</li>--}}
                                {{--<li>Suspendisse quis metus</li>--}}
                                {{--<li>Vestibul varius fermentum erat</li>--}}
                                {{--<li> - </li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="plan-button">--}}
                            {{--<a href="#" class="btn btn-common btn-effect">Get Plan</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-4 col-md-4 col-xs-12">--}}
                    {{--<div class="pricing-table pricing-big">--}}
                        {{--<div class="pricing-details">--}}
                            {{--<h2>Popular Plan</h2>--}}
                            {{--<div class="price">99$ <span>/mo</span></div>--}}
                            {{--<ul>--}}
                                {{--<li>Consectetur adipiscing</li>--}}
                                {{--<li>Nunc luctus nulla et tellus</li>--}}
                                {{--<li>Suspendisse quis metus</li>--}}
                                {{--<li>Vestibul varius fermentum erat</li>--}}
                                {{--<li> - </li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="plan-button">--}}
                            {{--<a href="#" class="btn btn-common btn-effect">Buy Now</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-4 col-md-4 col-xs-12">--}}
                    {{--<div class="pricing-table">--}}
                        {{--<div class="pricing-details">--}}
                            {{--<h2>Premium Plan</h2>--}}
                            {{--<div class="price">199$ <span>/mo</span></div>--}}
                            {{--<ul>--}}
                                {{--<li>Consectetur adipiscing</li>--}}
                                {{--<li>Nunc luctus nulla et tellus</li>--}}
                                {{--<li>Suspendisse quis metus</li>--}}
                                {{--<li>Vestibul varius fermentum erat</li>--}}
                                {{--<li>Suspendisse quis metus</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="plan-button">--}}
                            {{--<a href="#" class="btn btn-common btn-effect">Buy Now</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- End Pricing Table Section -->

    <!-- Counter Section Start -->
    <div class="counters section bg-defult">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="facts-item">
                        <div class="icon">
                            <i class="lni-rocket"></i>
                        </div>
                        <div class="fact-count">
                            <h3><span class="counter">100</span>%</h3>
                            <h4>Быстрее</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="facts-item">
                        <div class="icon">
                            <i class="lni-home"></i>
                        </div>
                        <div class="fact-count">
                            <h3><span class="counter">350</span>+</h3>
                            <h4>Выполненных проектов</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="facts-item">
                        <div class="icon">
                            <i class="lni-heart"></i>
                        </div>
                        <div class="fact-count">
                            <h3><span class="counter">500</span></h3>
                            <h4>Люди любят</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter Section End -->

    <!-- Testimonial Section Start -->
    <section class="testimonial section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="testimonials" class="touch-slider owl-carousel">
                        @if(isset($feedbacks) && is_object($feedbacks))
                            @foreach($feedbacks as $item)
                                <div class="item">
                                    <div class="testimonial-item">
                                        <div class="author">
                                            <div class="img-thumb">
                                                <img src="img/testimonial/img1.jpg" alt="">
                                            </div>
                                            <div class="author-info">
                                                <h2><a href="#">{{ $item->first_name . ' ' . $item->last_name }}</a></h2>
                                                <span>{{ $item->position }}</span>
                                            </div>
                                        </div>
                                        <div class="content-inner">
                                            <p class="description">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Team section Start -->
    {{--<section id="team" class="section">--}}
        {{--<div class="container">--}}
            {{--<div class="section-header">--}}
                {{--<h2 class="section-title">Наша Команда</h2>--}}
                {{--<span>Команда</span>--}}
            {{--</div>--}}
            {{--<div class="row justify-content-center">--}}
                {{--<div id="teamSlider" class="touch-slider owl-carousel">--}}
                    {{--@if(isset($team_members))--}}
                        {{--@foreach($team_members as $team_member)--}}
                            {{--<div class="item mx-3">--}}
                                {{--<div class="single-team">--}}
                                    {{--<img width="150" src="{{ $team_member->photo_path }}" alt="{{ $team_member->profession }}">--}}
                                    {{--<div class="team-details">--}}
                                        {{--<div class="team-inner">--}}
                                            {{--<h4 class="team-title">{{ $team_member->first_name . ' ' . $team_member->last_name }}</h4>--}}
                                            {{--<p>{{ $team_member->profession }}</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!-- Team section End -->

    <!-- Subcribe Section Start -->
    <div id="subscribe" class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="subscribe-form">
                        <div class="form-wrapper">
                            <div class="sub-title text-center">
                                <h3>Расскажите нам о своем проекте!</h3>
                            </div>
                            <form id="offerForm">
                                <div class="row">
                                    <div class="col-12 form-line">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Полное имя">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-line">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="phone_number" placeholder="Телефон">
                                        </div>
                                    </div>
                                    <div class="col-12 form-line">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Эл. адрес">
                                        </div>
                                    </div>
                                    <div class="col-12 form-line">
                                        <div class="form-group">
                                            <textarea class="form-control" id="message" name="message" placeholder="Опишите свой проект"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 form-line">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="files[]" multiple>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-submit">
                                            <button type="button" id="sendOffer" class="btn btn-common btn-effect ld-ext-right">Отправить
                                                <div class="ld ld-ring ld-spin" id="loadOffer"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    {{--<div class="sub-item-box">--}}
                        {{--<div class="icon-box">--}}
                            {{--<i class="lni-bullhorn"></i>--}}
                        {{--</div>--}}
                        {{--<div class="text-box">--}}
                            {{--<h4></h4>--}}
                            {{--<p>Представьте нам свои проекты и мы свяжемся с вами․</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="sub-item-box">--}}
                        {{--<div class="icon-box">--}}
                            {{--<i class="lni-book"></i>--}}
                        {{--</div>--}}
                        {{--<div class="text-box">--}}
                            {{--<h4></h4>--}}
                            {{--<p></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="sub-item-box">--}}
                        {{--<div class="icon-box">--}}
                            {{--<i class="lni-timer"></i>--}}
                        {{--</div>--}}
                        {{--<div class="text-box">--}}
                            {{--<h4></h4>--}}
                            {{--<p></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- Subcribe Section End -->

    <!-- Contact Section Start -->
    <section id="contact" class="section">
        <div class="contact-form">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Связаться с нами</h2>
                    <span>Контакт</span>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-9 col-md-9 col-xs-12">
                        <div class="contact-block">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="fullName" name="name" placeholder="Имя" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" placeholder="Эл. адрес" id="contactEmail" class="form-control" name="email" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Предмет" id="msgSubject" name="subject" class="form-control" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="contactMessage" name="message" rows="7" placeholder="Сообщение" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="submit-button">
                                            <button type="button" id="contactFormSubmit" class="btn btn-common btn-effect ld-ext-right">Отправить
                                                <div class="ld ld-ring ld-spin" id="loadContactForm"></div>
                                            </button>
                                            <div id="msgSubmit" class="h3 hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <div class="contact-deatils">
                            <!-- Content Info -->
                            <div class="contact-info_area">
                                <div class="contact-info">
                                    <i class="lni-map"></i>
                                    <h5>АДРЕС</h5>
                                    <p>Россия Г. Москва</p>
                                </div>
                                <!-- Content Info -->
                                <div class="contact-info">
                                    <i class="lni-star"></i>
                                    <h5>ЭЛ. АДРЕС</h5>
                                    <p><a href="mailto:infobestconstruct@gmail.com">infobestconstruct@gmail.com</a></p>
                                </div>
                                <!-- Content Info -->
                                <div class="contact-info">
                                    <i class="lni-phone"></i>
                                    <h5>ТЕЛЕФОН</h5>
                                    <p><a href="tel:89160770436"> 89160770436</a> <br/> <a href="tel:89166596091 "> 89166596091</a> <br/><a href="tel:89019026104 "> 89019026104</a></p>
                                </div>
                                <!-- Icon -->
                                <ul class="footer-social">
                                    {{--<li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>--}}
                                    <li><a class="twitter" target="_blank" href="https://vk.com/public181693212"><i class="lni-vk"></i></a></li>
                                    {{--<li><a class="linkedin" href="#"><i class="lni-linkedin"></i></a></li>--}}
                                    <li><a class="google-plus" href="mailto:infobestconstruct@gmail.com"><i class="lni-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Section Start -->
    <section id="google-map-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 padding-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d577336.7638984495!2d36.82513038949304!3d55.5807480820225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCwLCDQoNC-0YHRgdC40Y8!5e0!3m2!1sru!2s!4v1556043495876!5m2!1sru!2s"  height="400" frameborder="0" style="border:0; width: 100%" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Section End -->

    <!-- Footer Section Start -->
    <footer>
        <!-- Footer Area Start -->
        <section class="footer-Content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                        <h3>BestConstruct</h3>
                        <div class="textwidget">
                            <p>Выполняет весь комплекс услуг, который включает проектирование и строительство, ремонт и текущее содержание ....</p>
                        </div>
                        <ul class="footer-social">
                            {{--<li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>--}}
                            <li><a class="twitter" target="_blank" href="https://vk.com/public181693212"><i class="lni-vk"></i></a></li>
                            {{--<li><a class="linkedin" href="#"><i class="lni-linkedin"></i></a></li>--}}
                            <li><a class="google-plus" href="mailto:infobestconstruct@gmail.com"><i class="lni-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                        <div class="widget">
                            <h3 class="block-title">КОРОТКАЯ ССЫЛКА</h3>
                            <ul class="menu">
                                <li><a href="#services">Сервисы</a></li>
                                <li><a href="#contact">Контакт</a></li>
                                <li><a href="#portfolios">Портфолио</a></li>
                                <li><a href="#subscribe">Subscribe</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                        <div class="widget">
                            <h3 class="block-title">Контакт</h3>
                            <ul class="contact-footer">
                                <li>
                                    <strong>АДРЕС: </strong> <span class="ml-2">Россия Г. Москва </span>
                                </li>
                                <li>
                                    <strong>ТЕЛЕФОН: </strong> <span class="ml-2"><a href="tel:89160770436"> 89160770436</a> <a href="tel:89166596091 "> 89166596091</a> <a href="tel:89019026104 "> 89019026104</a></span>
                                </li>
                                <li>
                                    <strong>ЭЛ. АДРЕС: </strong> <span class="ml-2"><a href="mailto:infobestconstruct@gmail.com">infobestconstruct@gmail.com</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer area End -->

        <!-- Copyright Start  -->
        <div id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-info float-left">
                            <p>Разработка сайта <a class="font-weight-bold" target="_blank" href="https://web.facebook.com/taron.chatoyan.21">Taron Chatoyan</a></p>
                        </div>
                        <div class="float-right">
                            <p>© 2019 BestConstruct. ВСЕ ПРАВА ЗАЩИЩЕНЫ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

    </footer>
    <!-- Footer Section End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="lni-arrow-up"></i>
    </a>

    {{--<div id="loader">--}}
        {{--<div class="spinner">--}}
            {{--<div class="double-bounce1"></div>--}}
            {{--<div class="double-bounce2"></div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <!-- Modal thank you -->
    <div class="modal fade" id="thankYouModalOffer" tabindex="-1" role="dialog" aria-labelledby="thankYouModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title mb-3 fz-18">Спасибо, что доверили нам обследование вашего проекта.</h5>
                    <p>Мы свяжемся с вами для получения более подробной информации.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal thank you -->
    <div class="modal fade" id="thankYouModalContact" tabindex="-1" role="dialog" aria-labelledby="thankYouModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h5 class="modal-title mb-3 fz-18">Спасибо.</h5>
                    <p>Мы свяжемся с вами.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
