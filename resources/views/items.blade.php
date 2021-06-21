@extends('layouts.app')

@section('content')

    <div class="container-fluid pl-5">
        <h1 class="display-1 font-weight-bold">
            <div class="mb-5 mt-3">Shop</div>   
        </h1>
        
        <div class="backshop bg-secondary p-3">
            <div>
                <h2 class="shoptitlefont-weight-bold text-dark p-3">LIBRARY:</h2>
            </div>
            <div class="row">
                @foreach ($items as $item) 
                    @if($item->status == 1)    
                        <div class="col-sm-2 mb-4">
                            <div class="itemcard">
                                <img src="{{ asset('img/'.$item->imgvalue) }}" alt="Card image cap">
                                <div class="card-body text-center bg-secondary">
                                    <h5 class="card-title text-dark font-weight-bold">
                                        {{ $item->name }}
                                    </h5>
                                    <form action="/changeprofile/{{ $item->id }}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger">
                                            USE
                                        </button>
                                        <input type="text" name="user" value={{ $user->id }} hidden>
                                    </form>     
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div>
                <h2 class="shoptitlefont-weight-bold text-dark p-3">ICONS:</h2>
            </div>
            <div class="row">
                @foreach ($items as $item) 
                    @if($item->status == 0)    
                        <div class="col-sm-2 mb-4">
                            <div class="itemcard">
                                <img class="card-img-top" src="{{ asset('img/'.$item->imgvalue) }}" alt="Card image cap">
                                <div class="card-body text-center bg-secondary">
                                    <h5 class="card-title text-dark font-weight-bold">
                                        {{ $item->name }}
                                    </h5>
                                    <form action="/buyitem/{{ $item->id }}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger" @if($user->coins < $item->price) {{ 'disabled' }} @endif>
                                            <i class="text-warning fa fa-bitcoin"></i> {{ $item->price }}
                                        </button>
                                        <input type="text" name="user" value={{ $user->id }} hidden>
                                    </form>     
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>     

    </div>


    
@endsection