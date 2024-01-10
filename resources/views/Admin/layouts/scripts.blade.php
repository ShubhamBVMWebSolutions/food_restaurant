
<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
{{-- <!-- JQVMap -->
<script src="{{asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLTE/dist/js/pages/dashboard.js')}}"></script>


<script>
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
    $(document).ready(function() {

$('#ingrediantsSelect').select2({
    tags: true,
    tokenSeparators: [',', ' '],
    multiple: true,
        ajax: {
        url: '{{ route("categories.index") }}',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
            var formattedData = data.map(function(item) {
            return {
                id: item.id,
                text: item.ingredient
            };
        });
        return {
            results: formattedData
            };
        },
        cache: true
    }
});

// Triggered when a new tag is created
$('#ingrediantsSelect').on('select2:selecting', function(e) {
    var tag = e.params.args.data.text;
    $.ajax({
        url:'/add-ingrediants',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            tag:tag
        },
        success:function (response) {
            console.log(response);
        },
        success:function(error){
            console.error('Error Updating the Tag',error);
        }
    });

    if (!$('#ingrediantsSelect option:contains("' + tag + '")').length) {
        $('#ingrediantsSelect').append(new Option(tag, tag, true, true));
    }
});
});
</script>
