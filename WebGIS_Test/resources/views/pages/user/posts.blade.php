@extends('layouts.master')

@section('master')
<div class="bg-image-post">
    <div class="card-body">
        <div class="container">
            <div class="row mt-12 mb-4">
            @foreach($dsBaiViet as $item)
                <div class="col-md-6 m-top-ward mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center font-weight-bold h4">                         
                            {{$item->tieude}}
                                                
                        </div>
                        <div class="card-body bg-opacity">

                            {!! $item->noidung !!}
                            <a href="#" class="btn btn-outline-info float-right"><i class="fa fa-bullseye"></i> Xem
                                trên bản đồ</a>
                        </div>
                        <div class="card-footer d-flex justify-content-center font-weight-bold">
                            Ngày đăng: {{$item->ngaytao}}
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="row justify-content-end">
                {{ $dsBaiViet->links() }}           
            </div>

        </div>
    </div>
</div>
@endsection
