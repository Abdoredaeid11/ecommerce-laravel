@extends('admin.master')
@section('css')
    
@endsection
@section('title')
    {{'edit category'}}
@endsection
@section('title_page')
    {{'Edit Page'}}
@endsection
@section('content')
<!-- Form for creating a new category -->
<form action="{{url('admin/category/update',$category->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

    <div class="container">
  
      <div class="form-group">
        <label for="category-name-ar">{{'name'}} :</label>
        <input type="text" class="form-control @error('name_ar') is-invalid @enderror" required id="r" name="name" value="{{$category->name}}">
      </div>
      @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  
      

      <div class="form-group">
        <label for="category-image">{{'image'}}:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" required id="category-image" name="image" value="{{$category->image}}">
        <div class="input-group mb-3 col">
          <img src="{{url('assets/img/category',$category->image)}}" width="100" height="100" alt="">
        </div>
      </div>
  @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      
      <div class="form-group">
        <label for="category-description-en">{{'description'}} :</label>
        <textarea class="form-control @error('description') is-invalid @enderror" required id="category-description-en" name="description" cols="30" rows="10" >{{$category->description}}</textarea>
      </div>
  @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
        
      <button type="submit" class="btn btn-outline-primary">{{'Update category'}}</button>
    </div>
  </form>
     
@endsection



@section('js')
    
@endsection