 <!-- Vendor JS Files -->
 <script src="{{asset('Yummy/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('Yummy/assets/vendor/aos/aos.js')}}"></script>
 <script src="{{asset('Yummy/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
 <script src="{{asset('Yummy/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
 <script src="{{asset('Yummy/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
 <script src="{{asset('Yummy/assets/vendor/php-email-form/validate.js')}}"></script>
 <!-- Template Main JS File -->
 <script src="{{asset('Yummy/assets/js/main.js')}}"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
<script>
      function CancleAndLogout() {
        window.location.href = "{{ route('logout') }}";
  }

  function saveAndLogout() {
    var formData = $('#reviewForm').serialize();
    $.ajax({
            url: "{{ route('submit_review') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                window.location.href = "{{ route('logout') }}";
            },
            error: function(error) {
                console.error(error);
            }
        });
  }






    function handleFileInputChange() {
        var input = document.getElementById('profilePicInput');
        var preview = document.getElementById('imagePreview');

        var file = input.files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }

    function handleFoodUploadClick() {
        var input = document.getElementById('profilePicInput');
        input.click();
        input.addEventListener('change', handleFileInputChange);
    }

</script>
