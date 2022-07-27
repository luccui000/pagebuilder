@extends('layouts.admin')
@push('styles')
    <style>
        .template-2 {
            background-color: #3f51b5;
            color: #fff;
        }
    </style>
@endpush
@section('content')
    <div id="app"></div>
@endsection

@push('scripts')
    @vite('resources/js/app.js')
@endpush
