@extends('frontend.master_dashboard')
@section('main')

        @php

            $categories = App\Models\Categories::latest()->get();
            $subcategories = App\Models\SubCategory::latest()->get();
            $blogs = App\Models\Blog::latest()->get();

        @endphp

        <div class="row ml-0 mr-0">
            @foreach($blogs as $blog)
                <div class="col-md-6 pr-0">
                    <div class="card">
                        <img class="card-img" src="{{ asset($blog->post_image) }}" alt="">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center flex-column">
                            <p style="color: white;">{{ $blog['category']['category_name'] }}</p>
                            <hr />
                            <p style="color: white;">{{ $blog['subcategory']['subcategory_name'] }}</p>
                            <h2 style="color: white;">{{ $blog->post_title }}</h2>
                            <a href="{{ route('blog.detail',$blog->id) }}" class="btn btn-primary">READ MORE</a>
                        </div>
                    </div>
                </div>
            @endforeach
            

        @foreach($categories as $category)
            <div class="col-md-3 pr-0 first">
                <div class="card">
                    <img class="card-img" src="{{ asset($category->category_image) }}" alt="">
                    <div class="card-img-overlay">
                        <h5>{{ $category->category_name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
            
        </div>

<div class="container-fluid fh5co-recent-news mt-5 pb-5">
        <h2 class="text-uppercase text-center">Recent News</h2>
        <hr class="mx-auto" />

        <div class="play-list mt-5 pt-4">
            <div class="owl-carousel owl-carousel5 owl-theme">
                <div>

                    <div class="card"> <img class="card-img link-img" src="{{ asset('frontend/assets/images/news6.png') }}" alt="">
                        <div class="card-img-overlay">
                            <div class="top-area"><a href="#" class="text-center d-block"><i
                                        class="far fa-heart"></i></a></div>
                            <div class="bottom-area">
                                <div class="row">
                                    <div class="col-5 pr-0 text-white">
                                        <a href="#" class="text-white"> <i class="fas fa-retweet"></i> Share</a>
                                    </div>
                                    <div class="col  pl-0   text-right"><a href="#" class="text-white"> June 3, 2019
                                            &nbsp; 6 <i class="far fa-comments"></i></a></div>
                                </div>
                                <h4 class="text-white mt-2">Xiaomi Hao Gertion Hones</h4>
                                <p class="text-white">Jhone Doe</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card"> <img class="card-img link-img" src="{{ asset('frontend/assets/images/news2.png') }}" alt="">
                        <div class="card-img-overlay">
                            <div class="top-area"><a href="#" class="text-center d-block"><i
                                        class="far fa-heart"></i></a></div>
                            <div class="bottom-area">
                                <div class="row">
                                    <div class="col-5 pr-0 text-white">
                                        <a href="#" class="text-white"> <i class="fas fa-retweet"></i> Share</a>
                                    </div>
                                    <div class="col  pl-0   text-right"><a href="#" class="text-white"> June 3, 2019
                                            &nbsp; 6 <i class="far fa-comments"></i></a></div>
                                </div>
                                <h4 class="text-white mt-2">Xiaomi Hao Gertion Hones</h4>
                                <p class="text-white">Jhone Doe</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="card"> <img class="card-img link-img" src="{{ asset('frontend/assets/images/news3.png') }}" alt="">
                        <div class="card-img-overlay">
                            <div class="top-area"><a href="#" class="text-center d-block"><i
                                        class="far fa-heart"></i></a></div>
                            <div class="bottom-area">
                                <div class="row">
                                    <div class="col-5 pr-0 text-white">
                                        <a href="#" class="text-white"> <i class="fas fa-retweet"></i> Share</a>
                                    </div>
                                    <div class="col  pl-0   text-right"><a href="#" class="text-white"> June 3, 2019
                                            &nbsp; 6 <i class="far fa-comments"></i></a></div>
                                </div>
                                <h4 class="text-white mt-2">Xiaomi Hao Gertion Hones</h4>
                                <p class="text-white">Jhone Doe</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card"> <img class="card-img link-img" src="{{ asset('frontend/assets/images/news4.png') }}" alt="">
                        <div class="card-img-overlay">
                            <div class="top-area"><a href="#" class="text-center d-block"><i
                                        class="far fa-heart"></i></a></div>
                            <div class="bottom-area">
                                <div class="row">
                                    <div class="col-5 pr-0 text-white">
                                        <a href="#" class="text-white"> <i class="fas fa-retweet"></i> Share</a>
                                    </div>
                                    <div class="col  pl-0   text-right"><a href="#" class="text-white"> June 3, 2019
                                            &nbsp; 6 <i class="far fa-comments"></i></a></div>
                                </div>
                                <h4 class="text-white mt-2">Xiaomi Hao Gertion Hones</h4>
                                <p class="text-white">Jhone Doe</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card"> <img class="card-img link-img" src="{{ asset('frontend/assets/images/news5.png') }}" alt="">
                        <div class="card-img-overlay">
                            <div class="top-area"><a href="#" class="text-center d-block"><i
                                        class="far fa-heart"></i></a></div>
                            <div class="bottom-area">
                                <div class="row">
                                    <div class="col-5 pr-0 text-white">
                                        <a href="#" class="text-white"> <i class="fas fa-retweet"></i> Share</a>
                                    </div>
                                    <div class="col  pl-0   text-right"><a href="#" class="text-white"> June 3, 2019
                                            &nbsp; 6 <i class="far fa-comments"></i></a></div>
                                </div>
                                <h4 class="text-white mt-2">Xiaomi Hao Gertion Hones</h4>
                                <p class="text-white">Jhone Doe</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card"> <img class="card-img link-img" src="{{ asset('frontend/assets/images/news6.png') }}" alt="">
                        <div class="card-img-overlay">
                            <div class="top-area"><a href="#" class="text-center d-block"><i
                                        class="far fa-heart"></i></a></div>
                            <div class="bottom-area">
                                <div class="row">
                                    <div class="col-5 pr-0 text-white">
                                        <a href="#" class="text-white"> <i class="fas fa-retweet"></i> Share</a>
                                    </div>
                                    <div class="col  pl-0   text-right"><a href="#" class="text-white"> June 3, 2019
                                            &nbsp; 6 <i class="far fa-comments"></i></a></div>
                                </div>
                                <h4 class="text-white mt-2">Xiaomi Hao Gertion Hones</h4>
                                <p class="text-white">Jhone Doe</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card"> <img class="card-img link-img" src="{{ asset('frontend/assets/images/news4.png') }}" alt="">
                        <div class="card-img-overlay">
                            <div class="top-area"><a href="#" class="text-center d-block"><i
                                        class="far fa-heart"></i></a></div>
                            <div class="bottom-area">
                                <div class="row">
                                    <div class="col-5 pr-0 text-white">
                                        <a href="#" class="text-white"> <i class="fas fa-retweet"></i> Share</a>
                                    </div>
                                    <div class="col  pl-0   text-right"><a href="#" class="text-white"> June 3, 2019
                                            &nbsp; 6 <i class="far fa-comments"></i></a></div>
                                </div>
                                <h4 class="text-white mt-2">Xiaomi Hao Gertion Hones</h4>
                                <p class="text-white">Jhone Doe</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid video-player">
        <div class="container">
            <hr>
            <div class="row vr-gallery">
                <div class="col-md-8 mb-4">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 pr-0 pd-md">
                            <img src="{{ asset('frontend/assets/images/gallery-img1.png') }}" alt="">
                        </div>
                        <div class="col-md-12 col-lg-5 light-bg cus-pd cus-arrow-left">
                            <p><small>march 27, 2020</small></p>
                            <h3>Trendy Summer
                                Fashion</h3>
                            <p>
                                To take a trivial example, which of us ever undertakes laborious physical exercise,
                                except to obtain some advantage from it? But who has any right to find fault with a man
                                who chooses...
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 pl-4 mb-4">
                    <div class="card">
                        <img class="card-img h-100" src="{{ asset('frontend/assets/images/video-cover1.jpg') }}" alt="">
                        <div class="card-img-overlay opacity text-center">
                            <a class="play-1" href="https://www.youtube.com/watch?v=vpO8sZDxOGI"><img
                                    src="{{ asset('frontend/assets/images/play-icon.png') }}" alt=""></a>
                            <h5 class="card-title">Weekend In Boston</h5>

                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-4 pr-0 pd-md">
                    <div class="card">
                        <img class="card-img h-100" src="{{ asset('frontend/assets/images/gallery-img2.jpg') }}" alt="">
                        <div class="card-img-overlay">
                            <div class="contact-box">
                                <p><small>march 27, 2020</small></p>
                                <h3>Trendy Summer
                                    Fashion</h3>
                                <p>To take a trivial example, which of us ever undertakes laborious physical exercise,
                                    some advantage from it? fault with a man who chooses...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 pl-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('frontend/assets/images/gallery-img3.jpg') }}" alt="">
                        <div class="card-body bg-gray cus-pd2 cus-arrow-up">
                            <p><small>march 27, 2020</small></p>
                            <h3>Trendy Summer
                                Fashion</h3>
                            <p>To take a trivial example, which of us ever undertakes laborious physical exercise, some
                                advantage from it? fault with a man who chooses...</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 pr-0 pd-md">
                            <img src="{{ asset('frontend/assets/images/gallery-img4.jpg') }}" alt="">
                        </div>
                        <div class="col-md-12 col-lg-5 light-bg cus-pd cus-arrow-left">
                            <p><small>march 27, 2020</small></p>
                            <h3>Trendy Summer
                                Fashion</h3>
                            <p>
                                To take a trivial example, which of us ever undertakes laborious physical exercise,
                                except to obtain some advantage from it? But who has any right to find fault with a man
                                who chooses...
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 pl-4 mb-4">
                    <div class="card">
                        <img class="card-img h-100" src="{{ asset('frontend/assets/images/video-cover2.jpg') }}" alt="">
                        <div class="card-img-overlay opacity text-center">
                            <a class="play-1" href="https://www.youtube.com/watch?v=vpO8sZDxOGI"><img
                                    src="{{ asset('frontend/assets/images/play-icon.png') }}" alt=""></a>
                            <h5 class="card-title">Weekend In Boston</h5>

                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <a href="#" class="btn">LOAD MORE</a>

                </div>
            </div>

        </div>
    </div>

    @endsection