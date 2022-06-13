@extends('layouts.system')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                    <div class="d-inline">
                        <h4>Sample Page</h4>
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!">Pages</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!">Sample page</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-start">

                    @foreach ($losts as $lost)
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" />
                                <div class="card-body">
                                    <h5 class="card-title">feyswal</h5>
                                    <small class="text-success">mkubwa</small>
                                    <p class="card-text">
                                        description things
                                    </p>
                                    <a href="{{ route('user.lost.show', $lost->id) }}" class="btn btn-primary">read
                                        more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
