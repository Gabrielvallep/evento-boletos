@extends('layouts.master')
@section('title')
Dashboards
@endsection
@section('css')

@endsection
@section('content')

<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">Good Morning, Anna!</h4>
                            <p class="text-muted mb-0">Here's what's happening with your store
                                today.</p>
                        </div>

                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>

                        </div><!-- end card header -->

                        <div class="card-header p-0 border-0 bg-soft-light">
                            <div class="row g-0 text-center">

                            </div>
                        </div><!-- end card header -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <!-- end col -->
            </div>

        </div> <!-- end .h-100-->

    </div> <!-- end col -->
</div>
@endsection
@section('script')

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
