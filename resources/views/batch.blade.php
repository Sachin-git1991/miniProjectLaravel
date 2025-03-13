@include('componentes.header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      
      <span class="brand-text font-weight-light">Admin</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Session::get('userDetails.name') }}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @include('componentes.sidemenu')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Batch Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="batch_details">
                <div class="card-body">
                  <input type="hidden" name="batch_id" id="batch_id">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Name</label>
                    <select class="form-control" id="pud_id" name="pud_id">
                        <option value="">Select Product</option>
                        @foreach($product as $data)
                            <option value="{{$data->id}}">{{$data->product_name}}</option>
                        @endforeach
                    </select>
                    <span id="pud_id-error" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Batch Name</label>
                    <input type="text" class="form-control" id="batch_name" name="batch_name" placeholder="Enter the Brand Name" onkeypress="return onlyAlphabets(event,this);">
                    <span id="batch_name-error" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter the Quantity">
                    <span id="quantity-error" class="text-danger"></span>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Batch Table</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Batch Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped example1">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Product Name</th>
                    <th>Batch</th>
                    <th>Quantity</th>
                    <th>QR Code</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($qrdetails as $data)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->product_name }}</td>
                      <td>{{$data->batch_name}}</td>
                      <td>{{$data->quantity}}</td>
                      <td>{!! QrCode::size(100)->generate($data->quantity); !!}</td>
                      <td>
                        <a href="javascript:void(0)" class="batch_edit" data-id="{{$data->id}}">Edit</a> / <a href="javascript:void(0)" class="batch_delete" data-id="{{$data->id}}">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sl No</th>
                    <th>Product Name</th>
                    <th>Batch</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
</body>
@include('componentes.footer')
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
</script>
<script type="text/javascript">

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $("#batch_details").submit(function(e){

        e.preventDefault();

        var id = $("#batch_id").val();
        if(id == ''){
            batch_url = "{{ route('batch.store') }}"
        }else{
            batch_url = "{{ route('batch.update') }}"
        }

        $.ajax({

            type:"POST",
            dataType: "JSON",
            url:batch_url,
            data: $('form').serialize(),

           success:function(res){

            if($.isEmptyObject(res.error)){

              if(res == "success"){
                alert('Batch Add Successfully');
                setTimeout(function(){
                    location.reload();
                }, 2000);
              }
              else
              {
                alert('Batch Not Deleted');
                setTimeout(function(){
                  location.reload();
                }, 3000);
              }

            }else{

              $('#pud_id-error').text(res.error[0]);
              $('#batch_name-error').text(res.error[1]);
              $('#quantity-error').text(res.error[2]);
            //printErrorMsg(data.error);

            }


           }

        });

    });

    $(document).ready(function() {

      //js to edit an allowance
      $('.batch_edit').click(function(event) {
        var id = $(this).attr('data-id');
        $.ajax({
          type:"GET",
          url:"{{ route('batch.edit') }}",
          data:{ "id" : id },
          success:function(res)
          {
            $('#batch_id').val(res['id']);
            $('#pud_id').val(res['pud_id']);
            $('#batch_name').val(res['batch_name']);
            $('#quantity').val(res['quantity']);

          }
        });
      });

      //js to delete an allowance
      $('.batch_delete').click(function(){
        var id = $(this).attr('data-id');
        $.ajax({
          type:"GET",
          url:"{{ route('batch.delete') }}",
          data:{'id' : id},
          success:function(res){
            if(res == 1){
              alert('Batch Deleted Successfully');
              setTimeout(function(){
                  location.reload();
              }, 2000);
            }
            else
            {
              alert('Batch Not Deleted');
              setTimeout(function(){
                location.reload();
              }, 3000);
            }
          }

        });
      });

    });

    $(document).ready(function(){
        $("#batch_name").keypress(function(event){
            var inputValue = event.charCode;
            if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
                event.preventDefault();
            }
        });
    });



</script>
