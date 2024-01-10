<!DOCTYPE html>
<html>

@include('Admin.layouts.head')
{{-- @dd(session()->all()) --}}
<body id="page-top">

@include('Admin.layouts.nav')

@include('Admin.layouts.asidebar')
	<div id="wrapper">
		 <div id="content-wrapper" class="d-flex flex-column">
		 	<div id="content">

		 		<div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>
						<div class="container rounded bg-white mt-5 mb-5">
						    <div class="row">
						        <div class="col-md-3 border-right">
						            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
						            	<div class="profile-container">
							            	<img id="imagePreview" class="rounded-circle mt-5"onclick="handleFoodUploadClick()" width="150px" src="{{asset('avatars/food-avatar.jpeg')}}" style="cursor: pointer;" alt="Preview">
                                            <form action="{{route('add_food')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
								                <label for="fileInput" class="camera-icon" onclick="handleFoodUploadClick()">📷</label>
								            	 <input type="file" id="profilePicInput" name="image" style="display: none" accept="image/*" required>

							            	<span class="profile_name"></span>
							            	<span class="text-black-50 profile_email"></span>
						            	</div>
						            </div>
						        </div>
						        <div class="col-md-9 border-right">
								    <div class="p-3 py-5">
								        <div class="d-flex justify-content-between align-items-center mb-3">
								            <h4 class="text-right">Menu Listing</h4>
								        </div>
									        <div class="row mt-3">
									            <div class="col-md-12 mb-3">
									                <label class="form-label">Food Item Name</label>
									                <input type="text" class="form-control" name="name"  value="" placeholder="Enter Food Item Name" required >
									            </div>
									        </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Food Category</label>
                                                    <select class="form-select" id="foodCategorySelect" name="category" required>
                                                        <option value="#" selected disabled>Choose a Category </option>
                                                        @foreach ($categories as $item)
                                                        <option value="{{$item->id}}" >{{$item->category_name}}</option>

                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" id="selectedCategories" name="selectedCategories" value="">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Price Of The Item</label>
                                                    <input type="text" class="form-control" placeholder="Enter Price Per Plate..." value="" name="price" required>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Ingrediants</label>
                                                    <select class="form-control" id="ingrediantsSelect" name="ingrediants[]" required>

                                                    </select>
                                                </div>
                                            </div>
									        <div class="mt-5 text-center">
									            <button class="btn btn-primary" type="submit">Save Profile</button>
									        </div>
								        </form>
								    </div>
								</div>
						    </div>
						</div>
				</div>
			</div>

		</div>
	</div>

    @include('Admin.layouts.footer')

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

   <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

    @include('Admin.layouts.scripts')

</body>
</html>
