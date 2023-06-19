@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add SubCategories </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add SubCategories </li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">

					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">

                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{ route('update.blog') }}" enctype="multipart/form-data" >
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $blogs->id }}" />

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Category Name</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
	 	                                        <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $blogs->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                                    @endforeach
								                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">SubCategory Name</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
	 	                                        <select name="subcategory_id" id="inputCollection" class="form-select mb-3" aria-label="Default select example">
                                                    <option></option>
                                                    @foreach($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $blogs->subcategory_id ? 'selected' : '' }}>{{ $subcategory->subcategory_name }}</option>
                                                    @endforeach
								                </select>
                                            </div>
                                        </div>

                                    

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Blog Title</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <input type="text" name="post_title" class="form-control" value="{{ $blogs->post_title }}" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Blog Short Description</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <textarea name="post_short_description" class="form-control" id="inputProductDescription" rows="3">{{ $blogs->post_short_description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Blog Long Description</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <textarea id="mytextarea" name="post_long_description">{{ $blogs->post_long_description }} </textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Blog Image </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="file" name="post_image" class="form-control"  id="image"   />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0"> </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <img id="showImage" src="{{ asset($blogs->post_image) }}" alt="Admin" style="width:100px; height: 100px;"  >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                            </div>
                                        </div>
                                    </div>
                                    </form>
	                            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#image').change(function(e){
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('#showImage').attr('src',e.target.result);
                        }
                        reader.readAsDataURL(e.target.files['0']);
                    });
                });
            </script>

            <script type="text/javascript">
                    
                    $(document).ready(function(){
                        $('select[name="category_id"]').on('change', function(){
                            var category_id = $(this).val();
                            if (category_id) {
                                $.ajax({
                                    url: "{{ url('/subcategory/ajax') }}/"+category_id,
                                    type: "GET",
                                    dataType:"json",
                                    success:function(data){
                                        $('select[name="subcategory_id"]').html('');
                                        var d =$('select[name="subcategory_id"]').empty();
                                        $.each(data, function(key, value){
                                            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
                                        });
                                    },

                                });
                            } else {
                                alert('danger');
                            }
                        });
                    });

            </script>


@endsection