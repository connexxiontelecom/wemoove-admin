<!DOCTYPE html>
<html lang="en" class="h-100">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{config('app.name')}} | Login</title>
    <meta name="description" content="Some description for the page"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
    <link href="/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href="index.html"><img src="/images/logo-full.png"  alt=""></a>
                                </div>
                                <h4 class="text-center mb-4 text-white">Login</h4>
                                <form action="{{route('login')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Email</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="Email address">
                                        @error('email')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Password</strong></label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        @error('password')
                                            <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1 text-white">
                                                <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                                <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a class="text-white" href="#">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-white text-primary btn-block">Login</button>
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
<script src="/vendor/global/global.min.js" type="text/javascript"></script>
<script src="/js/custom.min.js" type="text/javascript"></script>
<script src="/js/deznav-init.js" type="text/javascript"></script>
</body>
</html>
