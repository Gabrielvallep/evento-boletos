@extends('layouts.master')
@section('title')
Dashboards
@endsection
@section('css')

@endsection
@section('content')

<!--
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 fw-semibold flex-grow-1">Explore Product</h5>
                        <div>
                            <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseExample"><i class="ri-filter-2-line align-bottom"></i> Filters</a>
                        </div>
                    </div>
                    <div class="collaps show" id="collapseExample">
                        <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1 mt-3 g-3">
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-2">Search</h6>
                                <input type="text" class="form-control" placeholder="Search product name" autocomplete="off" id="searchProductList">
                            </div>
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-2">Select Category</h6>
                                <select class="form-control" data-choices name="select-category" data-choices-search-false id="select-category">
                                    <option value="">Select Category</option>
                                    <option value="Artwork">Artwork</option>
                                    <option value="3d Style">3d Style</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Collectibles">Collectibles</option>
                                    <option value="Crypto Card">Crypto Card</option>
                                    <option value="Games">Games</option>
                                    <option value="Music">Music</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-2">File Type</h6>
                                <select class="form-control" data-choices name="file-type" data-choices-search-false id="file-type">
                                    <option value="">File Type</option>
                                    <option value="jpg">Images</option>
                                    <option value="mp4">Video</option>
                                    <option value="mp3">Audio</option>
                                    <option value="gif">Gif</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-2">Sales Type</h6>
                                <select class="form-control" data-choices name="all-sales-type" data-choices-search-false id="all-sales-type">
                                    <option value="">All Sales Type</option>
                                    <option value="On Auction">On Auction</option>
                                    <option value="Has Offers">Has Offers</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-4">Price</h6>
                                <div class="slider" id="range-product-price"></div>
                                <input class="form-control" type="hidden" id="minCost" value="0" />
                                <input class="form-control" type="hidden" id="maxCost" value="1000" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="d-flex align-items-center mb-4">
                <div class="flex-grow-1">
                    <p class="text-muted fs-14 mb-0">Result: 8745</p>
                </div>
                <div class="flex-shrink-0">
                    <div class="dropdown">
                        <a class="text-muted fs-14 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            All View
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1" id="">
        @foreach($events as $event)
        <div class="col list-element">
            <div class="card explore-box card-animate">
                <div class="explore-place-bid-img">
                    <input type="hidden" class="form-control" id="'+ prodctData.id + '">
                    <div class="d-none">'+ prodctData.salesType + '</div>
                    <img src="{{URL::asset('storage/img_eventos/' . $event->ruta_imagen )}}" alt="" class="card-img-top explore-img" />
                    <div class="bg-overlay"></div>
                    <div class="place-bid-btn">
                        <a href="#!" class="btn btn-success"><i class="ri-auction-fill align-bottom me-1"></i> Place Bid</a>
                    </div>
                </div>
                <div class="bookmark-icon position-absolute top-0 end-0 p-2">
                    <button type="button" class="btn btn-icon '+ likeBtn + '" data-bs-toggle="button" aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                </div>
                <div class="card-body">
                    <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i> 350 </p>
                    <h5 class="mb-1"><a href="apps-nft-item-details">{{$event->evento }}</a></h5>
                    <p class="text-muted mb-0">{{$event->fecha }}</p>
                </div>
                <div class="card-footer border-top border-top-dashed">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 fs-14">
                            <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i> Capacidad: <span class="fw-medium">{{$event->capacidad}}</span>
                        </div>
                        <h5 class="flex-shrink-0 fs-14 text-primary mb-0">360</h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
@section('script')

    <script src="{{ URL::asset('build/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/wnumb/wNumb.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/apps-nft-explore.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
