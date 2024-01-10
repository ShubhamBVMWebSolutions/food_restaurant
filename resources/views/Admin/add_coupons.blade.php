<!DOCTYPE html>
<html lang="en">
@include('Admin.layouts.head')
<style>
    .custom-spin {
      color: #1f5142;
      transition: transform 3s linear;
    }

    .custom-spin:hover {
      transform: rotate(360deg);
    }
    #card-footer {
      text-align: center;
    }

    #card-footer input {
      margin: 0 auto;
    }
  </style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

@include('Admin.layouts.nav')

@include('Admin.layouts.asidebar')

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8" style="position: relative;left: 15%;padding-top: 5%;padding-bottom: 5%;">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Coupons</h3>

                  <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;right: 244%;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                                </button>
                            </div>
                                <i class="fas fa-money-bill" style="position: relative;left:215%;padding-top:8px; cursor:pointer;" onclick="add_New_Coupon()"></i>
                        </div>
                  </div>
                </div>
                <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap" id="coupons_records">
                            <thead>
                            <tr>
                                <th>Coupon_Code</th>
                                <th>Coupon_Type</th>
                                <th>Coupon_Valid_From</th>
                                <th>Coupon_Valid_Till</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- Content Header (Page header) -->

        <section class="content">
            <div class="container-fluid">
            </div>
        </section>
    </div>
  @include('Admin.layouts.footer')

  <div class="modal fade" id="add_new_coupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add A New Coupon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Add a new Coupon</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                        <form action="#" method="post" id="couponForm">
                            @csrf
                            {{-- {{route('add_new_coupon')}} --}}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name...." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-sm-2 col-form-label">Type </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="coupon_type" id="coupon_type" required>
                                        <option value="" selected disabled>Select a Coupon Type</option>
                                        <option value="fixed_price">Fixed Price Coupon </option>
                                        <option value="percent">Percent Coupon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="coupon_discription" class="col-sm-2 col-form-label"> Discription</label>
                                <div class="col-sm-10">
                                    <input type="text" name="coupon_discription" class="form-control" id="coupon_discription" value="" placeholder="ex;- Get Flat 10% off" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="coupon_value" class="col-sm-2 col-form-label">Value</label>
                                <div class="col-sm-10">
                                    <input type="number" name="coupon_value" class="form-control" id="coupon_value" placeholder="Enter the Value of this coupon" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="start_date" class="col-sm-2 col-form-label">Valid From</label>
                                <div class="col-sm-10">
                                    <input type="date" name="start_date" class="form-control" id="start_date" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="end_date" class="col-sm-2 col-form-label">Valid Till</label>
                                <div class="col-sm-10">
                                    <input type="date" name="end_date" class="form-control" id="end_date" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cart_amount" class="col-sm-2 col-form-label">Min Amount</label>
                                <div class="col-sm-10">
                                    <input type="number" name="cart_amount" class="form-control" id="cart_amount" placeholder="Enter Minimum Cart Balance required to avail this coupon">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="generate_coupon_code" class="col-sm-12 col-form-label">Generate A Coupon Code <i class="fa fa-cog custom-spin" id="generate_coupon_code" onclick="generate_code()" style="color: #1f5142;" title="Generate_Coupon_Code"></i></label>
                            </div>
                        </div>

                        <div class="card-footer" id="card-footer">

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary" onclick="add_new_coupon(event)">Add Coupon </button>
        </div>
      </div>
    </div>
  </div>

  {{-- Edit Model --}}
  <div class="modal fade" id="edit_coupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Coupon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Edit Coupon</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                        <form action="#" method="post" id="editForm">
                            @csrf
                            {{-- {{route('add_new_coupon')}} --}}
                        <div class="card-body">
                            <input type="hidden" name="id" id="id" value="">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_name" name="name" value="" placeholder="Name...." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-sm-2 col-form-label">Type </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="coupon_type" id="edit_coupon_type" required>
                                        <option value="" selected disabled>Select a Coupon Type</option>
                                        <option value="fixed_price">Fixed Price Coupon </option>
                                        <option value="percent">Percent Coupon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="coupon_discription" class="col-sm-2 col-form-label"> Discription</label>
                                <div class="col-sm-10">
                                    <input type="text" name="coupon_discription" class="form-control" id="edit_coupon_discription" value="" placeholder="ex;- Get Flat 10% off" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="coupon_value" class="col-sm-2 col-form-label">Value</label>
                                <div class="col-sm-10">
                                    <input type="number" name="coupon_value" class="form-control" id="edit_coupon_value" value="" placeholder="Enter the Value of this coupon" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="start_date" class="col-sm-2 col-form-label">Valid From</label>
                                <div class="col-sm-10">
                                    <input type="date" name="start_date" class="form-control" value="" id="edit_start_date" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="end_date" class="col-sm-2 col-form-label">Valid Till</label>
                                <div class="col-sm-10">
                                    <input type="date" name="end_date" class="form-control" value="" id="edit_end_date" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cart_amount" class="col-sm-2 col-form-label">Min Amount</label>
                                <div class="col-sm-10">
                                    <input type="number" name="cart_amount" class="form-control" value="" id="edit_cart_amount" placeholder="Enter Minimum Cart Balance required to avail this coupon">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary" onclick="update_coupon(event)">Update Coupon </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./wrapper -->
@include('Admin.layouts.scripts')
<script>
    $(document).ready(function() {
        updateTable();
    });

    function add_New_Coupon() {
        var modal =$('#add_new_coupon');
        modal.modal('show');
    }

    function generate_code() {
        var name = document.getElementById('name').value;
        var prefix = Math.floor(Math.random() * 100);
        var suffix = Math.floor(Math.random() * 100);
        var generatedCode =( prefix + name + suffix).toUpperCase();
        var inputElement = document.createElement('input');
        inputElement.type = 'text';
        inputElement.name = 'coupon_code';
        inputElement.value = generatedCode;
        inputElement.readOnly = true;
        var cardFooter = document.getElementById('card-footer');
        cardFooter.innerHTML = '';
        document.getElementById('couponForm').appendChild(inputElement);
        cardFooter.appendChild(inputElement);
    }

    function add_new_coupon(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route("add_new_coupon") }}',
            data: $('#couponForm').serialize(),
            success: function(response) {
                if (response.success) {
                    $('#add_new_coupon').modal('hide');
                    updateTable();
                } else {
                    console.log('Form submission failed');
                }
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    }

    function updateTable() {
        $.ajax({
            type: 'GET',
            url: '{{ route("get_coupons_data") }}',
            success: function(data) {

                updateTableWithData(data);
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    }
    function updateTableWithData(data) {
        var tableBody = $('#coupons_records tbody');
        tableBody.empty();
        for (var i = 0; i < data.length; i++) {
            var coupon = data[i];
            var newRow = '<tr>' +
                '<td>' + coupon.coupon_code + '</td>' +
                '<td>' + coupon.coupon_type + '</td>' +
                '<td>' + coupon.coupon_valid_from + '</td>' +
                '<td>' + coupon.coupon_valid_till + '</td>' +
                '<td>'+
                    '<i class="fas fa-edit"onclick=edit_coupon(' + coupon.id + '); style="font-size:18px;cursor: pointer;"></i>'
                    +
                    '<i class="far fa-trash-alt" onclick=delete_coupon(' + coupon.id + '); style="font-size:18px;color:red;margin-left:10px;cursor: pointer;"></i>'
                    '</td>' +
                '</tr>';
            tableBody.append(newRow);
        }
    }

    function edit_coupon(id) {
        $.ajax({
            type: 'GET',
            url: '/get-coupon-data/' + id,
            success: function (data) {
                $('#edit_name').val(data.name);
                $('#id').val(data.id);
                $('#edit_coupon_type').val(data.coupon_type);
                $('#edit_coupon_value').val(data.coupon_value);
                $('#edit_coupon_discription').val(data.coupon_discription);
                $('#edit_start_date').val(data.coupon_valid_from);
                $('#edit_end_date').val(data.coupon_valid_till);
                $('#edit_cart_amount').val(data.cart_value);

                var modal = $('#edit_coupon');
                modal.modal('show');
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    }

    function update_coupon(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route("update_coupon") }}',
            data: $('#editForm').serialize(),
            success: function(response) {

                if (response) {
                    $('#edit_coupon').modal('hide');
                    updateTable();
                } else {
                    console.log('Form submission failed');
                }
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    }


    function delete_coupon(id) {
        if (confirm('This Action Will Permanently Remove This Coupon .Are you sure you want to continue')) {
            $.ajax({
                url : '/delete-coupon/' +id,
                method :'POST',
                dataType : 'json',
                data :{_token:'{{csrf_token()}}'},
                success:function(response){
                    updateTable();
                    alert(response.message);

                },
                error:function (error) {
                console.error('Error occurred:', error);
                alert('An Error Occured! Please Try Again After Some Time ');
                }
            });
        }
    }
</script>
</body>
</html>
