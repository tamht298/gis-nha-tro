@extends('layouts.master')
@section('master')
<div class="container" style="color: #000000;">
    <div class="dashboard-wrapper mt-5">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">



                <div class="card">
                    <div class="card-header">
                      <div class="row">
                          <div class="col-md-6 mt-2 ">
                            <h3>Quản Lý Bài Viết</h3>
                          </div>
                          <div class="col-md-6">
                            <button class="btn btn-success mt-2 float-right mr-3" data-toggle="modal" data-target="#addModalBaiViet"><i class="fa fa-plus"></i> Thêm</button>

                            <!-- Modal thêm -->

                            <div class="modal fade" id="addModalBaiViet" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="addModalLabel">Thêm Bài Viết</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="ThemBaiViet" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="makhutro" value="{{$khunhatro->gid}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label font-weight-bold">Tiêu đề<span class="text-danger"> (*)</span></label>
                                                    <input type="text" name="tieude" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-form-label font-weight-bold">Nội dung<span class="text-danger"> (*)</span></label>
                                                    <textarea name="noidung" class="form-control " id="editor1"></textarea>
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                            <input type="submit" class="btn btn-success" value="Thêm">
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                             <!-- Search bar -->

                        <div class="navbar-nav float-right mt-2 mr-5">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">

                            </div>
                        </div>

                        <!-- End search bar -->

                            <!-- End modal thêm -->
                          </div>


                      </div>






                    </div>

                    <div class="card-body">
                        <!-- Hiển thị thông báo thành công>-->
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
                        <div class="row table-responsive mx-auto" style="font-size: 16px">
                            <table class="table table-striped">
                                <thead style="background: #3CADF1; color: antiquewhite">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tiêu đề</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col">Trạng thái duyệt</th>
                                        <th scope="col">Thao tác</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    $y = 2 ?>
                                    @foreach ($baiviet as $item)

                                    <?php
                                    $suabv = "suabv" . $item->id;
                                    $xoabv = "xoabv" . $item->id; ?>
                                    <tr>
                                        <th scope="row">{{$i++ + ($baiviet->currentPage() -1)* $pageSize }}</th>
                                        <th>{{$item->tieude}}</th>
                                        <th style="width: 30%;">{!! $item->noidung !!}</th>
                                        <th>{{$item->ngaytao}}</th>
                                        @switch($item->trangthaiduyet)
                                        @case (0)
                                        <th class="text-center">
                                            <span class="text-warning mr-1"><i
                                                    class="fas fa-dot-circle" data-toggle="tooltip" data-placement="right"
                                                    data-html="true" title="Chờ duyệt"></i></span>

                                        </th>

                                        @break;
                                        @case(1)
                                    <th class="text-center">

                                        <span class="text-success mr-1"><i
                                                class="fas fa-check-circle" data-toggle="tooltip" data-placement="right"
                                                data-html="true" title="Đã duyệt"></i></span>

                                    </th>


                                    {{-- end modal trạng thái --}}
                                    @break
                                    @case(2)
                                    <th class="text-center">

                                        <span class="text-danger mr-1"><i
                                                class="fas fa-ban" data-toggle="tooltip" data-placement="right"
                                                data-html="true" title="Không duyệt"></i></span>
                                    </th>

                                    @break
                                        @endswitch


                                        <td>
                                            <span data-toggle="modal" data-target="#{{$suabv}}">
                                                <a href="#" class="text-success" data-toggle="tooltip" data-placement="left" data-html="true" title="Sửa"><i class="fa fa-edit fa-lg"></i></a>
                                            </span>
                                            <span data-toggle="modal" data-target="#{{$xoabv}}">
                                                <a href="#" class="text-danger ml-3" data-toggle="tooltip" data-placement="right" data-html="true" title="Xóa"><i class="fa fa-trash-alt fa-lg"></i></a>
                                            </span>

                                            <!-- Modal sửa -->

                                            <div class="modal fade" id="{{$suabv}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title" id="editModalLabel">Sửa Bài Viết
                                                                </h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('SuaBaiViet',['id' => $item->id])}}" method="post">
                                                                @csrf

                                                                <div class="form-group">
                                                                    <label class="col-form-label font-weight-bold">Tiêu đề<span class="text-danger"> (*)</span></label>
                                                                    <input type="text" name="tieude" value="{{$item->tieude}}" class="form-control">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-form-label font-weight-bold">Nội dung</label>
                                                                    <textarea name="noidung" class="form-control " id="editor{{$y++}}">{!!$item->noidung!!}</textarea>

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

                                            <!-- Modal xóa -->

                                            <div class="modal fade" id="{{$xoabv}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title" id="deleteModalLabel">Xóa Bài Viết</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Bạn có chắc muốn xóa bài viết <span>"{{$item->tieude}}"</span></h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('XoaBaiViet',['id' => $item->id])}}" method="post">
                                                                @csrf
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End modal xóa -->
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $baiviet->links() }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
</div>
@endsection
