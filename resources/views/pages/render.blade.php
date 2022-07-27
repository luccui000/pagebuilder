@extends('layouts.master')

@section('content')
    <div id="app"></div>
@endsection

@push('scripts')
    @vite('resources/js/app.js')
@endpush
