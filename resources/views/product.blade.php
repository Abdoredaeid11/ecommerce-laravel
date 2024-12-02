@extends('layouts.master')




@section('content')
<div class="product-section mt-150 mb-150">
    <div class="container">

      
        
       
        <div class="row product-lists" style="position: relative; height: 1147.38px;">
            @foreach ($products as $item)
                
            
            <div class="col-lg-4 col-md-6 text-center strawberry" >
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img style="max-height: 250px;min-height:250px" src="{{url('assets/img/products',$item->image)}}" alt=""></a>
                    </div>
                    <h3>{{$item->name}}</h3>
                    <p class="product-price"><span>Per one peace</span> {{$item->price}}$ </p>
                    <a href="{{url('/order',$item->id)}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection