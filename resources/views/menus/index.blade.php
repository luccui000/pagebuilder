@extends('layouts.admin')
@push('styles')
    <style>
        .table-menu tbody tr{
            align-items: center;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-inline-block">Danh sách menu #{{ $header->name }}</h4>
                    <a href="#" class="btn btn-primary float-right">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table class="table mb-0 table-menu">
                        <tbody>
                            @foreach($header->menus as $menu)
                                <tr>
                                    <td>
                                        {{ $menu->id }}
                                    </td>
                                    <td style="min-width: 200px;">
                                        <h2><a href="/admin/menus/{{ $menu->id }}">{{ $menu->name }}</a></h2>
                                    </td>
                                    <td>
                                        {{ $menu->direction }}
                                    </td>
                                    <td>
                                        {{ $header->name }}
                                    </td>
                                    <td class="text-right">
                                        <a href="/admin/menus/{{ $menu->id }}" class="btn btn-primary">Chỉnh sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
