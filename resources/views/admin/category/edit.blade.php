@extends('admin.master')
@section('css')
    
@endsection
@section('title')
    {{trans('admin_stitle_page_trans.edit-category')}}
@endsection
@section('title_page')
    {{trans('admin_stitle_page_trans.edit-category')}}
@endsection
@section('content')
<!-- Form for creating a new category -->
<form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

    <div class="container">
  
      <div class="form-group">
        <label for="category-name-ar">{{trans('admin_stitle_page_trans.Arabic Category name')}} :</label>
        <input type="text" class="form-control @error('name_ar') is-invalid @enderror" required id="category-name-ar" name="name_ar" value="{{$category->getTranslation('name','ar')}}">
      </div>
      @error('name_ar')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  
      <div class="form-group">
        <label for="category-name-en">{{trans('admin_stitle_page_trans.English Category name')}}:</label>
        <input type="text" class="form-control @error('name_en') is-invalid @enderror" required id="category-name-en" name="name_en" value="{{$category->getTranslation('name','en')}}" >
      </div>
      @error('name_en')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
      <div class="form-group">
        <label for="category-slug">{{trans('admin_stitle_page_trans.Category slug')}}:</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" required id="category-slug" name="slug" value="{{$category->slug}}" >
      </div>
      @error('slug')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <div class="form-group">
        <label for="category-image">{{trans('admin_stitle_page_trans.Category image')}}:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" required id="category-image" name="image" value="{{$category->image}}">
        <div class="input-group mb-3 col">
          <img src="{{Storage::url($category->image)}}" width="100" height="100" alt="">
        </div>
      </div>
  @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <div class="form-group">
        <label for="category-description-ar">{{trans('admin_stitle_page_trans.Arabic Category description')}} :</label>
        <textarea class="form-control @error('description_ar') is-invalid @enderror" required id="category-description-ar" name="description_ar" cols="30" rows="10" >{{$category->getTranslation('description','ar')}}</textarea>
      </div>
  @error('description_ar')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <div class="form-group">
        <label for="category-description-en">{{trans('admin_stitle_page_trans.English Category description')}} :</label>
        <textarea class="form-control @error('description_en') is-invalid @enderror" required id="category-description-en" name="description_en" cols="30" rows="10" >{{$category->getTranslation('description','en')}}</textarea>
      </div>
  @error('description_en')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <div class="form-group">
        <label for="category-popular">{{trans('admin_stitle_page_trans.Popular category')}}:</label>
        <input type="checkbox" class="form-control" id="category-popular" name="popular" {{$category->is_popular==1 ? 'checked' :''}}>
      </div>

      <div class="form-group">
        <label for="category-shname">{{trans('admin_stitle_page_trans.Show category')}}:</label>
        <input type="checkbox" class="form-control" id="category-popular" name="show" {{$category->is_showing==1 ? 'checked' :''}}>
      </div>

      
      
      
  
      <div class="form-group">
        <label for="category-title-ar">{{trans('admin_stitle_page_trans.Arabic Category title')}}:</label>
        <input type="text" class="form-control @error('title_ar') is-invalid @enderror" required id="category-title-ar" name="title_ar" value="{{$category->getTranslation('meta_title','ar')}}" >
      </div>
  @error('title_ar')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <div class="form-group">
        <label for="category-title-en">{{trans('admin_stitle_page_trans.English Category title')}}:</label>
        <input type="text" class="form-control @error('title_en') is-invalid @enderror" required id="category-title-en" name="title_en" value="{{$category->getTranslation('meta_title','en')}}" >
      </div>
  @error('title_en')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <div class="form-group">
        <label for="category-meta-description-ar">{{trans('admin_stitle_page_trans.Arabic Category meta description')}}:</label>
        <textarea class="form-control @error('meta_description_ar') is-invalid @enderror" required id="category-meta-description-ar" name="meta_description_ar" cols="30" rows="10" >{{$category->getTranslation('meta_description','ar')}}</textarea>
      </div>
  @error('meta_description_ar')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <div class="form-group">
        <label for="category-meta-description-en">{{trans('admin_stitle_page_trans.English Category meta description')}} :</label>
        <textarea class="form-control @error('meta_description_en') is-invalid @enderror" required id="category-meta-description-en" name="meta_description_en" cols="30" rows="10" >{{$category->getTranslation('meta_description','en')}}</textarea>
      </div>
      @error('meta_description_en')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <div class="form-group">
        <label for="category-meta-description-en">{{trans('admin_stitle_page_trans.meta keywords')}} :</label>
        <textarea class="form-control @error('meta_keywords') is-invalid @enderror" required id="category-meta-description-en" name="meta_keywords" cols="30" rows="10"     >{{$category->meta_keywords}}</textarea>
      </div>
  @error('meta_keywords')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <button type="submit" class="btn btn-outline-primary">{{trans('admin_stitle_page_trans.Create category')}}</button>
    </div>
  </form>
     
@endsection



@section('js')
    
@endsection