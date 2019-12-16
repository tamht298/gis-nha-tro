@extends('layouts.master')
@section('master')
<div class="card text-white bg-white mt-5 container">

    <div class="card-body">
        <div class="container" style="color: #000000;">
            <h2>Thông tin liên hệ</h2>
            <h3>Tiêu đề: {{$details['title'] }}</h3>
            <h3>Người gửi: {{$details['name'] }}</h3>
            <h3>Email: {{$details['mail'] }}</h3>
            <h3>Điện thoại: {{$details['phone'] }}</h3>
            <h3>Nội dung: {{$details['content'] }}</h3>

        </div>
        <div class="alert alert-success alert-dismissible m-2" role="alert" id="success-alert">
            <strong>Gửi mail thành công!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    </div>
</div>
@endsection
