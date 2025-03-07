@extends('frontend.layouts.header')
@section('title', "Financial Services in Pune | Lowest Loan Interest in PCMC - Jfinserv")

<script>
    $("document").ready(function(){
        setTimeout(function(){
        $(".alert-danger").remove();
        }, 3000 ); // 3 secs

        setTimeout(function(){
        $(".alert-success").remove();
        }, 60000 );
    });
</script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@section('content')


 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                    <?php  if(session('email_id')){
                        $email = session('email_id');
                        $user_id = session('user_id');
                        $auth_id = session('auth_id');
                    } ?>
                    {{-- <h3><i class="fa fa-lock fa-4x"></i></h3> --}}
                    <img style="background-color: white;" class="img-profile rounded-circle" width="100" height="100"  src="{{ asset('theme') }}/jixlogo.png">
                    <h2 class="text-center">Reset Password</h2>
                    <p>It's a good idea to use a strong password that you don't use elsewhere.  </p>
                    @if (session('status'))
                        <div class="alert alert-dismissable alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-dismissable alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('error') }}
                        </div>
                    @endif
                  <div class="panel-body">

                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="{{route('update_password')}}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                            <input id="pass" name="password" placeholder="New Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,12}$"  title="Password should have 1 uppercase, 1 lowercase, 1 number, 1 special character and minimum 8 and max 12 characters" class="form-control"  type="password" required>
                            </div>
                        </div>
                        <input type="hidden" id="email" name="email" value="<?php echo $email; ?>"/>
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>"/>
                        <input type="hidden" id="auth_id" name="auth_id" value="<?php echo $auth_id; ?>"/>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                            <input id="cpass" name="cpassword" placeholder="Confirmed Password" class="form-control"  type="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                        </div>

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

@endsection