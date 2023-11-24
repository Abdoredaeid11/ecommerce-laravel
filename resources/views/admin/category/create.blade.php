@extends('admin.master')
@section('css')
    
@endsection
@section('title')
    {{'create category'}}
@endsection
@section('title_page')
{{'create category'}}
@endsection
@section('content')
<!-- Form for creating a new category -->
<form action="/admin/category/store" method="POST" enctype="multipart/form-data">
@csrf

    <div class="container">
  
      
  
      <div class="form-group">
        <label for="category-name-en">{{ 'Category name'}}:</label>
        <input type="text" class="form-control @error('name_en') is-invalid @enderror" required id="category-name-en" name="name" >
      </div>
      @error('name_')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


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
      
    
      
      <button type="submit" class="btn btn-outline-primary">{{'Create'}}</button>
    </div>
  </form>
     
@endsection



@section('js')
    
@endsection