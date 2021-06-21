<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ToBeDone</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    </head>

    <body class="bg">
        <div class="font-weight-bold bg-secondary sidenav">
            <div class="profile bg-dark">
                <img src="{{ asset('img/'.$user->picture) }}" alt="">
            </div>
            <div class="username bg-dark text-center text-light text-weight-bold">
                {{$user->name}}
            </div>
            <div class="details bg-dark">
                <form class="logout" id="logout" action="/" method="GET">
                    {{ csrf_field() }}
    
                    <button type="submit" class="btn btn-danger">
                        <i class="text-light fa fa-sign-out"></i>
                    </button>
                </form>
                <div class="coins text-center text-light text-weight-bold">
                    <div class="template">
                        <i class="text-warning fa fa-bitcoin"></i> {{$user->coins}}
                    </div>
                </div>
            </div>
            <a class="bg-dark text-danger" href="/items">Shop</a>
            <a class="mt-3" href="/tasks">All Tasks</a>
            @foreach ($categories as $category)
                <div class="categories row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <a href="/tasks/{{ $category->name }}">{{ $category->name }}</a>
                    </div>
                    <div class="text-right col-sm-offset-3 col-sm-6">
                        <form  id="delete" action="/category/{{ $category->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
        
                            <button type="submit" class="btn btn-secondary">
                                <i class="text-dark fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
            <form action="/category" method="POST">
                {{ csrf_field() }}

                <div class="container mt-3 form-group">
                    <input type="text" name="name" id="category-name" class="form-control">
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="bg-danger text-light btn btn-default">
                        <i class="fa fa-plus"></i> Add Category
                    </button>
                </div>
            </form>
            <div class="text-light logo">
                <img src="{{ asset('img/tobedonenavlogo.png') }}" alt="">
            </div>
        </div>

        <div class="main text-light">@yield('content')</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>