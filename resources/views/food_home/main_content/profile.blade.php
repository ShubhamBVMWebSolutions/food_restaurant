<!DOCTYPE html>
<html>
@include('food_home.layouts.head')
<body id="page-top">
    @include('food_home.layouts.header')
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
                                        @if ($profile->profile_pic == null)
                                            <img class="rounded-circle mt-5"onclick="handleUploadClick()" width="150px"
                                                src="{{ asset('images/default-avatar.png') }}" style="cursor: pointer;">
                                        @else
                                            <img class="rounded-circle mt-5" width="150px"
                                                src="{{ asset($profile->profile_pic) }}" onclick="handleUploadClick()"
                                                alt="profile_pic" style="cursor: pointer">
                                        @endif
                                        <form action="{{ route('update_profile_picture') }}" method="post"
                                            id="profilePicForm" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ session('user_id') }}">
                                            <label for="fileInput" class="camera-icon"
                                                onclick="handleUploadClick()">📷</label>
                                            <input type="file" id="profilePicInput" name="image"
                                                style="display: none" accept="image/*">
                                        </form>
                                        <span class="profile_name"
                                            style="cursor: pointer">{{ session('username') }}</span>
                                        <span class="text-black-50 profile_email"
                                            style="cursor: pointer">{{ session('email') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile Settings</h4>
                                    </div>
                                    <form action="{{ route('update_profile_data') }}" method="POST">
                                        @csrf
                                        <div class="row mt-2">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control"
                                                    value="{{ session('username') }}" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Surname</label>
                                                <input type="text" name="surname"
                                                    class="form-control"placeholder="Surname"
                                                    value="{{ $profile->last_name }}">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Mobile Number</label>
                                                <input type="text" class="form-control" id="mobile_code"
                                                    placeholder="Enter phone number" name="contact"
                                                    value="{{ $profile->contact_number }}">
                                                <input type="hidden" id="selected_country_code"
                                                    name="selected_country_code">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address Line 1</label>
                                                <i class="fa fa-crosshairs" id="getLocationBtn"
                                                    style="position: relative; left:80%; font-size:20px;cursor:pointer;"
                                                    title="Get My Location"></i>
                                                <input type="text" class="form-control" id="address_1"
                                                    placeholder="Enter address line 1"
                                                    value="{{ $profile->Address_1 }}" name="address_1">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Land Mark</label>
                                                <input type="text" class="form-control" id="address_2"
                                                    placeholder="Specify any Landmarks...."
                                                    value="{{ $profile->Address_2 }}" name="address_2">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Postcode</label>
                                                <input type="text" class="form-control" id="postcode"
                                                    placeholder="Enter postcode" value="{{ $profile->zip_code }}"
                                                    name="postcode">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Area</label>
                                                <input type="text" class="form-control" id="area"
                                                    placeholder="Enter area" value="{{ $profile->area }}"
                                                    name="area">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Email ID</label>
                                                <input type="text" class="form-control"
                                                    value="{{ session('email') }}" disabled>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Country</label>
                                                <input type="text" id="country" class="form-control"
                                                    placeholder="Enter country" value="{{ $profile->country }}"
                                                    name="country">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">State/Region</label>
                                                <input type="text" id="state" class="form-control"
                                                    placeholder="Enter state/region" value="{{ $profile->state }}"
                                                    name="state">
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

    @include('food_home.layouts.footer')

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    @include('food_home.layouts.scripts')
    <script>
        function handleUploadClick() {
            document.getElementById('profilePicInput').click();
        }
        document.getElementById('profilePicInput').addEventListener('change', function() {
            const fileInput = this;
            const form = document.getElementById('profilePicForm');

            if (fileInput.files && fileInput.files[0]) {
                form.submit();
            }
        });
        // -----Country Code Selection
        $("#mobile_code").intlTelInput({
            initialCountry: "{{ $profile->country_code ?: 'in' }}",
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });
        // Handle the change event to update the hidden field
        $("#mobile_code").on("countrychange", function(e) {
            var selectedCountry = $("#mobile_code").intlTelInput("getSelectedCountryData");
            if (selectedCountry) {
                $("#selected_country_code").val(selectedCountry.iso2);
            } else {
                console.log("Error: Unable to retrieve country data");
            }
        });

        // Get current location button click event
        $("#getLocationBtn").on("click", function() {
            getLocation();
        });

        // Function to get the user's current location
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        // Call function to get detailed address using the obtained latitude and longitude
                        getDetailedAddress(position.coords.latitude, position.coords.longitude);
                    },
                    function(error) {
                        console.log("Error getting location: " + error.message);
                    }
                );
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        // Function to get detailed address using latitude and longitude from OSM Nominatim
        function getDetailedAddress(latitude, longitude) {
            var apiUrl = 'https://nominatim.openstreetmap.org/reverse?format=json&lat=' + latitude + '&lon=' + longitude;

            // Make an API request to get the detailed address
            $.ajax({
                url: apiUrl,
                method: 'GET',
                success: function(response) {
                    if (response.display_name) {
                        var parts = response.display_name.split(', ');
                        var municipality = parts[1];
                        // $("#address_1").val(response.address || '');
                        $("#address_2").val(municipality || '');
                        $("#postcode").val(response.address.postcode || '');
                        $("#area").val(response.address.county || '');
                        $("#country").val(response.address.country || '');
                        $("#state").val(response.address.state || '');

                        // Use the detailed address as needed
                    } else {
                        console.log("No results found");
                    }
                },
                error: function(error) {
                    console.log("Error getting address: " + error.statusText);
                }
            });
        }
    </script>
</body>
</html>
