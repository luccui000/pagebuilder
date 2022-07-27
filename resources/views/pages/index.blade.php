@extends('layouts.master')

@push('styles')
    <style>
        .editor__header {
            display: flex;
        }
        .editor__header::after {
            font-family: "Font Awesome 5 Free", sans-serif;
            content: "\f044";
            color: #eaeaea;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 10;
            transition: color .2s linear;
        }
        .editor__header:hover::after {
            color: #7e7e7e;
        }
        .carousel__wrapper {
            position: relative;
        }
        .carousel__content {
            position: absolute;
            top: 100px;
            left: 50%;
            color: #fff;
        }
        .carousel__content .secondary__text {
            text-transform: capitalize;
        }
        .carousel__content .primary__text {
            font-weight: bold;
            color: #000;
            font-size: 30px;
        }
        .editor__carousel {
            position: relative;
        }
        .editor__carousel::after {
            font-family: "Font Awesome 5 Free", sans-serif;
            content: "\2b";
            font-weight: 900;
            font-size: 30px;
            position: absolute;
            top: 50%;
            left: 50%;
            background-color: #fff;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            transition: all .3s linear;
            text-align: center;
            place-items: center;
        }
        .editor__carousel:hover::after {
            display: block;
        }
        .btn__add {
            background-color: #e5e5e5;
        }
        .btn__add:hover {
            background-color: #d9d7d7;
        }
        .btn__add:focus {
            outline: none;
            box-shadow: none;
        }
        .btn__add--grid {
            position: relative;
        }
        .btn__add--showgrid {
            position: absolute;
            right: 60px;
            background-color: #fff;
            display: inline-block;
            visibility: hidden;
        }
        .show {
            visibility: visible;
        }
        .bg__grid--item {
            margin-left: 5px;
            background-color: #eaeaea;
            cursor: pointer;
            transition: background-color .2s linear;
        }
        .bg__grid--item:hover {
            background-color: #f8f8f8;
        }
        .grid__show--box {
            border-radius: 2px;
            min-height: 250px;
            border: 1px dashed #ccc;
        }
        .grid__show--box {
            position: relative;
        }
        .grid__show--afterbox{
            font-family: "Font Awesome 5 Free", sans-serif;
            content: "\2b";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 30px;
            background-color: #eaeaea;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 999;

        }
        .box-card {
            font-family: "Font Awesome 5 Free", sans-serif;
            content: "\2b";
            border: 1px dashed #d9d7d7;
            width: 100px;
            height: 100px;
        }
    </style>
@endpush
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Trang chủ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                @foreach($header->menuitems as $menuitem)
                    <li class="nav-item active editor__header" data-name="{{ $menuitem->name }}" data-id="{{ $menuitem->id }}">
                        <a class="nav-link" href="{{ $menuitem->link }}">{{ $menuitem->name }}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach($carousels as $carousel)
                            <div data-carousel="{{ $carousel }}" class="carousel-item carousel__wrapper editor__carousel  @if ($loop->first) active @endif" >
                                <img class="d-block w-100" src="{{ $carousel->background_image }}" alt="First slide">
                                <div class="carousel__content top-1">
                                    <h5 class="secondary__text">{{ $carousel->secondary_text }}</h5>
                                    <h3 class="primary__text">{{ $carousel->primary_text }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="my-2">Danh mục sản phẩm</h4>
                <div class="d-flex">
                    <button class="btn btn__add" data-toggle="modal" data-target="#modalThemDong">
                        <i class="fa fa-plus"></i>
                        Thêm dòng
                    </button>
                    <div class="ml-2">
                        <button class="btn btn__add btn__add--grid" >
                            <i class="fa-solid fa-grip"></i>
                        </button>
                        <ul class="btn__add--showgrid">
                            <li class="btn bg__grid--item" data-row="6">
                                <svg width="28" height="20" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 0H0V20H3V0Z" fill="#6C6C6C"/>
                                    <path d="M8 0H5V20H8V0Z" fill="#6C6C6C"/>
                                    <path d="M13 0H10V20H13V0Z" fill="#6C6C6C"/>
                                    <path d="M18 0H15V20H18V0Z" fill="#6C6C6C"/>
                                    <path d="M23 0H20V20H23V0Z" fill="#6C6C6C"/>
                                    <path d="M28 0H25V20H28V0Z" fill="#6C6C6C"/>
                                </svg>
                            </li>
                            <li class="btn bg__grid--item" data-row="4">
                                <svg width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.26316 0H0V20H5.26316V0Z" fill="#6C6C6C"/>
                                    <path d="M13.2632 0H8V20H13.2632V0Z" fill="#6C6C6C"/>
                                    <path d="M21.2632 0H16V20H21.2632V0Z" fill="#6C6C6C"/>
                                    <path d="M29.2632 0H24V20H29.2632V0Z" fill="#6C6C6C"/>
                                </svg>
                            </li>
                            <li class="btn bg__grid--item" data-row="3">
                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.26316 0H0V20H5.26316V0Z" fill="#6C6C6C"/>
                                    <path d="M13.2632 0H8V20H13.2632V0Z" fill="#6C6C6C"/>
                                    <path d="M21.2632 0H16V20H21.2632V0Z" fill="#6C6C6C"/>
                                </svg>
                            </li>
                            <li class="btn bg__grid--item" data-row="2" >
                                <svg width="27" height="20" viewBox="0 0 27 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="10" height="38" fill="#6C6C6C"/>
                                    <rect x="17" width="10" height="38" fill="#6C6C6C"/>
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row grid__show mt-3">

        </div>
    </div>
    @include('partials.pages.modal')
    @include('partials.pages.modal.carousel')
    @include('partials.pages.modal.sanpham')
    @include('partials.pages.modal.mau')
    @include('partials.pages.modal.themdong')
@endsection
@push('scripts')
    <script src="{{ asset('js/page.js') }}"></script>
@endpush
