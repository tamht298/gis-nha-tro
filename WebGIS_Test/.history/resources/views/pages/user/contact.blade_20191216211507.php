@extends('layouts.master')
@section('master')
<div class="card text-white bg-white mt-5 container">

    <div class="card-body">
        <div class="container" style="color: #000000;">
            <h2>Thông tin liên hệ</h2>
            <div class="card">
                <div class="card-body">

                    <form action="send-email" method="get">
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Tên</label>
                                <input type="text" name="ten" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Số điện thoại</label>
                                <input type="" class="form-control" id="inputPassword4">
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Tiêu đề<span class="text-danger"> (*)</span></label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">Email<span class="text-danger"> (*)</span></label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputAddress2">Nội dung<span class="text-danger"> (*)</span></label>
                                <textarea class="form-control" rows="5" id="comment" ></textarea>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
