@extends('admin.master')
@section('css')
    
@endsection
@section('title')
    {{'edit product'}}
@endsection
@section('title_page')
    {{'Edit Page'}}
@endsection
@section('content')
<!-- Form for creating a new category -->
<form action="{{url('admin/product/update',$product->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

    <div class="container">
  
      <div class="form-group">
        <label for="category-name-ar">{{'name'}} :</label>
        <input type="text" class="form-control @error('name_ar') is-invalid @enderror" required id="r" name="name" value="{{$product->name}}">
      </div>

      <div class="form-group">
        <label for="category-name-ar">{{'price'}} :</label>
        <input type="text" class="form-control @error('name_ar') is-invalid @enderror" required id="r" name="price" value="{{$product->price}}">
      </div>
     

<div class="form-group">
  <label for="category-popular">{{'Popular'}}:</label>
  <input type="checkbox" class="form-control" id="category-popular" name="popular" {{$product->popular==1 ? 'checked' :''}}>
</div>

<div class="form-group">
  <label for="category-popular">{{'status'}}:</label>
  <input type="checkbox" class="form-control" id="category-popular" name="status" {{$product->status==1 ? 'checked' :''}}>
</div>
<div class="form-group">
  <label for="category-popular">{{'number'}}:</label>
  <input type="number" name="number" placeholder=""value='{{$product->number}}'>
</div>
  
      

      <div class="form-group">
        <label for="category-image">{{'image'}}:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" required id="category-image" name="image" value="{{$product->image}}">
        <div class="input-group mb-3 col">
          <img src="{{url('assets/img/products',$product->image)}}" width="100" height="100" alt="">
        </div>
      </div>
  @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      
      <div class="form-group">
        <label for="category-description-en">{{'description'}} :</label>
        <textarea class="form-control @error('description') is-invalid @enderror" required id="category-description-en" name="description" cols="30" rows="10" >{{$product->description}}</textarea>
      </div>
  @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
        
      <button type="submit" class="btn btn-outline-primary">{{'Update Product'}}</button>
    </div>
  </form>
     
@endsection



@section('js')
    
@endsection