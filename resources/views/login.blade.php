<!DOCTYPE html>
<html lang="en">
<head>
    <title>ToBeDone</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/loginstyle.css') }}" />
</head>
<body class="bg justify-content-center">
    <div class="title text-center">
        <img src="{{ asset('img/tobedone logo.png') }}" alt="">
    </div>
    <div class="container bg-secondary justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <form action="/tasks" method="GET">
                    {{ csrf_field() }}
                    <div class="form-group mt-3 font-weight-bold">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" id="email">
                    </div>
                    <div class="form-group mt-3 font-weight-bold">
                        <label for="pass">Password</label>
                        <input class="form-control" type="password" id="pass">
                    </div>
                    <div class="form-group row">
                        <div class="col">                                              
                            <button class="btn-dark text-light font-weight-bold" type="submit">Sign In</button>
                            
                        </div>
                        <div class="col">
                            <button class="btn-dark text-light font-weight-bold" type="submit">Register</button>                      
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
