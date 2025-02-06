@include('componentes.header')
<body class="hold-transition register-page">
    <div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Mini</b>Project</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form id="registration">
            <div class="input-group mb-3">
                <input type="text" name="name" id="name" class="form-control" placeholder="Full name">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <span id="name-error" class="text-danger"></span>
            <div class="input-group mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <span id="email-error" class="text-danger"></span>
            <div class="input-group mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <span id="password-error" class="text-danger"></span>
            <div class="input-group mb-3">
                <input type="password" name="repassword"  id="repassword" class="form-control" placeholder="Retype password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <span id="repassword-error" class="text-danger"></span>
            <div class="input-group mb-3">
                <select name="roles" id="roles" class="form-control">
                    <option value="">Select Role</option>
                    <option value="1">Admin</option>
                    <option value="2">Manager</option>
                    <option value="3">User</option>
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user-circle"></span>
                    </div>
                </div>
            </div>
            <span id="roles-error" class="text-danger"></span>
            <div class="row">
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="{{ route('login') }}" class="text-center">I already have a member</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
</body>
@include('componentes.footer')
<script type="text/javascript">

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $("#registration").submit(function(e){

        e.preventDefault();

        $.ajax({

            type:"POST",
            dataType: "JSON",
            url:"{{ route('reg.create') }}",
            data: $('form').serialize(),

           success:function(data){

                if($.isEmptyObject(data.error)){

                    alert(data.message);
                    window.location.href = "{{ route('login')}}";
                    
                }else{

                    $('#name-error').text(data.error[0]);
                    $('#email-error').text(data.error[1]);
                    $('#password-error').text(data.error[2]);
                    $('#repassword-error').text(data.error[3]);
                    $('#roles-error').text(data.error[4]);
                    //printErrorMsg(data.error);

                }

           }

        });

    

    });

</script>
