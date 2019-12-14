@extends('layouts.master')
@section('master')
<div class="container mt-6" style="color: #000000;">
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Đổi mật khẩu</h2>
                    </div>
                    <div class="card-body mx-auto">
                        @if ( Session::has('success') )
                        <div class="alert alert-success alert-dismissible m-2" role="alert" id="success-alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        @endif

                        <!-- Hiển thị thông báo lỗi? -->
                        @if ( Session::has('error') )
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        @endif
                        <form action="doi-mat-khau" method="POST">
                        @csrf
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label font-weight-bold">Mật khẩu cũ:<span class="text-danger"> (*)</span></label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" name="matkhaucu">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label font-weight-bold">Mật khẩu mới:<span class="text-danger"> (*)</span></label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" name="matkhaumoi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label font-weight-bold">Xác nhận mật khẩu mới:<span class="text-danger"> (*)</span></label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" name="xacnhanmatkhaumoi">
                                </div>
                            </div>                           
                            <button type="submit" class="btn btn-primary float-right">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
</div>
@endsection