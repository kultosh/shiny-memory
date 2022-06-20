
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="shiny-memory">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="shiny-memory">
    <title>Shiny Memory</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .container-sm {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 40%;
            -moz-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }

        @media only screen and (max-width: 768px) {
            h3 {
                font-size: 20px;
            }

            #admin-login-form {
                /* margin-left: -69px; */
                margin-top: 100px !important;
            }
        }

        @media only screen and (max-width: 667px) {
            h3 {
                font-size: 12px;
            }
        }

        @media only screen and (max-width: 540px) {
            h3 {
                font-size: 20px;
            }

            #admin-login-form {
                margin-right: 50px !important;
                margin-left: -100px !important;
            }
        }

        @media only screen and (max-width: 504px) {
            input, input::-webkit-input-placeholder {
                font-size: 12px;
            }
        }

        @media only screen and (max-width: 440px) {
            input, input::-webkit-input-placeholder {
                font-size: 9px;
            }

            h3 {
                font-size: 20px;
            }

            #admin-login-form {
                margin-right: 20px !important;
                margin-left: -110px !important;
            }
        }

        @media only screen and (max-width: 375px) {
            h3 {
                font-size: 20px;
            }

            #admin-login-form {
                margin-right: 20px !important;
                margin-left: -95px !important;
            }
        }

        @media only screen and (max-width: 280px) {
            h3 {
                font-size: 15px;
            }

            #admin-login-form {
                margin-right: 20px !important;
                margin-left: -75px !important;
            }
        }
    </style>
</head>
<body>
    <div class="mt-5 pt-5" id="admin-login-form">
        <div class="row mt-5">
            <div class="col-md-6 offset-3">
                <form class="form-horizontal" action="{{route('admin.login')}}" method="POST">
                    @csrf
                    <div class="card card-info">
                        <div class="card-header bg-dark text-white">
                            @include('admin.layouts.message')
                            <h3 class="card-title text-center">LogIn</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group ">
                            <label for="inputEmail3" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email_login" id="inputEmail3" placeholder="abc@gmail.com" required>
                            </div>
                            <div class="form-group ">
                            <label for="inputPassword3" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password_login" id="inputPassword3" placeholder="Password" required>
                            </div>
                        </div> 
                        <div class="card-footer">
                            <div class="float-right">
                                <button class="btn btn-primary" type="submit">Sign In</button><br>
                            </div>
                        </div>   
                    </div>               
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>