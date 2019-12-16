@extends('layouts.master')
@section('master')
<div class="card text-white bg-white mt-5 container">

    <div class="card-body">
        <div class="container" style="color: #000000;">
            <h2>Thông tin liên hệ</h2>
            <h3>Tiêu đề: {{$details['title'] }}</h3>
            <h3>Người gửi: {{$details['mail'] }}</h3>
            <h3>Email: {{$details['name'] }}</h3>
            <h3>Điện thoại: {{$details['phone'] }}</h3>
            <h3>Tiêu đề: {{$details['title'] }}</h3>

        </div>
    </div>
</div>
@endsection
