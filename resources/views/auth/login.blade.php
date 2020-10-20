<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ben Health :: Login</title>

    <!-- vendor css -->
    <link href="../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
  </head>

  <body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="row no-gutters flex-row-reverse ht-100v">
      <div class="col-md-6 bg-gray-200 d-flex align-items-center justify-content-center">
        <div class="login-wrapper wd-250 wd-xl-350 mg-y-30">
          <h4 class="tx-inverse tx-center">Sign In</h4>
          <p class="tx-center mg-b-60">Welcome back! Please sign in.</p>
          <div class="form-group">
            <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email">
          </div><!-- form-group -->
          <div class="form-group">
            <input class="form-control" id="password" type="password"" name="password" placeholder="Enter your password">
            <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a><br>
            <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
          </div><!-- form-group -->
          <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>
          <div class="mg-t-60 tx-center">Not yet a member? <a href="/register" class="tx-info">Sign Up</a></div>
        </div><!-- login-wrapper -->
      </div><!-- col -->
      <div class="col-md-6 bg-br-primary d-flex align-items-center justify-content-center">
        <div class="wd-250 wd-xl-450 mg-y-30">
          <div class="signin-logo tx-28 tx-bold tx-white"><span class="tx-normal">[</span> ben <span class="tx-info">health</span> <span class="tx-normal">]</span></div>
          <div class="tx-white mg-b-60">Providing Dashboard data for Healthcare</div>
        </div><!-- wd-500 -->
      </div>
    </div><!-- row -->

    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
