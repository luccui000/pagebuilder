@extends('layouts.admin')

@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <a class="btn btn-primary text-white" data-toggle="modal" data-target="#chonMau" >Chọn mẫu</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="https://www.xtmobile.vn/vnt_upload/product/02_2022/thumbs/600_samsung_galaxy_s22_ultra_5g_mau_do_2.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="chonMau" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Thay đổi mẫu</h4>
                </div>
                <div class="modal-body">
                    Content
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
