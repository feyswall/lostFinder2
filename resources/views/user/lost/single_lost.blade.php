@extends('layouts.system')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                    <div class="d-inline">
                        <h4>Single Lost Item</h4>
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="page-header-breadcrumb"></div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-start">
                    <div class="col-md-4">
                        <h3>{{ $lost->name }}</h3>
                        <div class="row">

                            @foreach ($lost->lost_info_details as $lost)
                                <div class="col-md-3">
                                    <img src="'storage/losts/image/'{{ $lost->lost_info_item }}" alt="" />
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-7">
                        <p>{{ $lost->desc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
