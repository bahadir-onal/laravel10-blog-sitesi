@extends('frontend.master_dashboard')
@section('main')

    <div class="container-fluid ar-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pr-8">
                    <div class="card ar-img-over">
                        <img class="card-img" src="{{ asset($blogs->post_image) }}" alt="">
                        <div class="card-img-overlay">
                            <a href="#" class="d-flex align-items-center justify-content-center"><img
                                    src="assets/images/full-screen.png" alt=""></a>
                        </div>
                    </div>
                    <div class="row date-time mt-3">

                        <div class="col text-white">
                            <a href="#">{{ $blogs['category']['category_name'] }} - {{ $blogs['subcategory']['subcategory_name'] }}</a>
                        </div>
                        
                    <h2>{{ $blogs->post_title }}</h2>

                    <div class="media my-5">
                        <div class="q-box d-flex align-items-center justify-content-center"><img
                                src="assets/images/quote.png" alt=""></div>
                        <div class="bbg media-body">
                            <h5 class="mb-0">{{ $blogs->post_short_description }}</h5>

                        </div>
                    </div>

                    <p>{!! $blogs->post_long_description !!}</p>
                    
                    </div>
                
                </div>

                
            </div>
        </div>
    </div>

@endsection