@include('componentes.header')

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Mini</b>Project</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="LoginForm">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span id="email-error" class="text-danger"></span>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span id="password-error" class="text-danger"></span>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            <!-- <a href="{{ route('dashboard') }}"  class="btn btn-primary btn-block">Sign In</a> -->
          </div>
          <!-- /.col -->
        </div>
        <span id="invalid-date" class="text-danger"></span>
      </form>

      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new member</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</body>

@include('componentes.footer')
<script type="text/javascript">

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $("#LoginForm").submit(function(e){

        e.preventDefault();

        $.ajax({

            type:"POST",
            dataType: "JSON",
            url:"{{ route('login') }}",
            data: $('form').serialize(),

           success:function(data){

                if(data.error == 0){
                  $('#invalid-date').text(data.message);
                }

                if($.isEmptyObject(data.error)){

                    if(data.roles == 1){

                      window.location.href = "{{ route('admin')}}";

                    }else if(data.roles == 2){

                      window.location.href = "{{ route('manager')}}";

                    }else if(data.roles == 3){

                      window.location.href = "{{ route('user')}}";

                    }
                    
                }else{

                    $('#email-error').text(data.error[0]);
                    $('#password-error').text(data.error[1]);
                    //printErrorMsg(data.error);

                }

           }

        });

    

    });

</script>


