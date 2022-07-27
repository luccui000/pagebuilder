@extends('layouts.admin')

@push('styles')
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-inline-block">Danh sách trang </h4>
                    <a href="/admin/trang/moi" class="btn btn-primary float-right">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table class="table mb-0 table-menu">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên trang</th>
                                <th>Slug</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{ $content->id }}</td>
                                    <td>{{ $content->name }}</td>
                                    <td>
                                        <span class="badge badge-dark">{{ $content->slug }}</span>
                                    </td>
                                    <td>
                                        <span class="p-2 badge badge-{{ \App\Classes\Status::color($content->status)  }}">{{ $content->status }}</span>
                                    </td>
                                    <td style="width: 200px">
                                        <a class="btn btn-primary" href=""><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href=""><i class="fa fa-trash-o"></i></a>
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

@push('scripts')
    <script src="{{ asset('build/assets/app.dd25e0e5.js') }}"></script>
@endpush
