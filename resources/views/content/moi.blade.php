@extends('layouts.admin')
@push('styles')
@endpush
@section('content')
    <div id="app"></div>
@endsection

@push('scripts')
    @vite('resources/js/app.js')
@endpush
