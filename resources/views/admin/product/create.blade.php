@extends('admin.master')
@section('css')
    
@endsection
@section('title')
    {{'create product'}}
@endsection
@section('title_page')
{{'create product'}}
@endsection
@section('content')
<!-- Form for creating a new category -->
<form action="{{url('admin/product/store')}}" method="POST" enctype="multipart/form-data">
@csrf

    <div class="container">
  
      
  
      <div class="form-group">
        <label for="category-name-en">{{ 'product name'}}:</label>
        <input type="text" class="form-control @error('name_en') is-invalid @enderror" required id="category-name-en" name="name" >
      </div>
      @error('name_')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
  <label for="category-name-en">{{ 'price'}}:</label>
  <input type="text" class="form-control @error('name_en') is-invalid @enderror" required id="category-name-en" name="price" >
</div>

<div class="form-group">
  <label for="category-popular">{{'Popular'}}:</label>
  <input type="checkbox" class="form-control" id="category-popular" name="popular">
</div>

<div class="form-group">
  <label for="category-popular">{{'status'}}:</label>
  <input type="checkbox" class="form-control" id="category-popular" name="status">
</div>
<div class="form-group">
  <label for="category-popular">{{'number'}}:</label>
  <input type="number" name="number" placeholder=""value='1'>
</div>

<div class="form-group">
  <label for="description">{{ 'description'}} :</label>
  <textarea class="form-control @error('description') is-invalid @enderror" required id="category-description-ar" name="description" cols="30" rows="10"></textarea>
</div>
@error('description')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

     
      <div class="form-group">
        <label for="category-image">{{'image'}}:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" required id="category-image" name="image">
      </div>
  @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="form-group">
    <input type="category_id" name="category_id" placeholder="0"value='{{$category_id}}' hidden>
  </div>
      
    
      
      <button type="submit" class="btn btn-outline-primary">{{'Create'}}</button>
    </div>
  </form>
     
@endsection



@section('js')
    
@endsection