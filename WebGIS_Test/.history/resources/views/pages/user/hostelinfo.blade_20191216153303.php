@extends('layouts.master')
@section('master')
<div class="card text-white bg-white mt-5 container">
    <div class="card-body">
        <div class="container" style="color: #000000;">
            <div class="dashboard-wrapper">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">
                        <!-- Noi dung -->
                        <h3>Thông Tin Chủ Trọ</h3>

                        <div class="card">
                            <div class="card-header">
                                <div class="row float-left" style="font-size: 20px;">
                                </div>
                                <div class="row float-right bg-success mr-3 mt-2">
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="row table-responsive mx-auto" style="font-size: 16px">
                                    <table class="table table-striped">
                                        <thead style="background: #3CADF1; color: antiquewhite">
                                            <tr>
                                                <th scope="col">Tên nhà trọ</th>
                                                <th scope="col">Tên chủ trọ</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Địa chỉ</th>
                                                <th scope="col"></th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <td>{{$item->tennhatro}}</td>
                                                <td>{{$item->tenchutro}}</td>
                                                <td>{{$item->sodienthoai}}</td>
                                                <td>{{$item->diachi}}</td>
                                                <td>
                                                    <span data-toggle="modal" data-target="#su">
                                                        <a href="#" class="text-success" data-toggle="tooltip" data-placement="left" data-html="true" title="Sửa"><i class="fa fa-edit fa-lg"></i></a>
                                                    </span>

                                                    <!-- Modal sửa -->

                                                    <div class="modal fade" id="{{$sua}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h2 class="modal-title" id="editModalLabel">Sửa Thông Tin Chủ Trọ
                                                                        </h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('SuaTTChuTro',['gid' => $item->gid])}}" method="post">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label class="col-form-label font-weight-bold">Mã chủ trọ<span class="text-danger"> (*)</span></label>
                                                                            <input type="text" readonly name="gid" value="{{$item->gid}}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-form-label font-weight-bold">Tên nhà trọ<span class="text-danger"> (*)</span></label>
                                                                            <input type="text" name="tennhatro" value="{{$item->tennhatro}}" class="form-control">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-form-label font-weight-bold">Tên chủ trọ<span class="text-danger"> (*)</span></label>
                                                                            <input type="text" name="tenchutro" value="{{$item->tenchutro}}" class="form-control">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-form-label font-weight-bold">Số điện thoại<span class="text-danger"> (*)</span></label>
                                                                            <input type="text" name="sodienthoai" value="{{$item->sodienthoai}}" class="form-control">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-form-label font-weight-bold">Địa chỉ<span class="text-danger"> (*)</span></label>
                                                                            <input type="text" name="diachi" value="{{$item->diachi}}" class="form-control">
                                                                        </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                                                    <input type="submit" class="btn btn-success" value="Cập nhật">
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- End modal sửa -->


                                                </td>
                                            </tr>
                                            @break
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    {{ $SVOTro->links() }}

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
