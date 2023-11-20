@extends('layouts.master')

@section('content')

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">اقسام</span> الموقع</h3>
                    <p>متعة التسوق معنا </p>
                </div>
            </div>
        </div>

        <div class="row">
         
            
                @foreach ($category as $item)
                <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{url('/products',$item->id)}}"><img  style="max-height: 250px;min-height:250px" src="{{url($item->image)}}" alt=""></a>
                    </div>
                    <h3>{{$item->name}}</h3>
                    <a href="cart.html" class="cart-btn"></a>
                     </div>
                    </div>
                 @endforeach

            
        </div>
    </div>
</div>
    
@endsection