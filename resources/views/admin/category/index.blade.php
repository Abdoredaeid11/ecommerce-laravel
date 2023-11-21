@extends('admin.master')
@section('css')
    
@endsection
@section('title')
    {{trans('admin_stitle_page_trans.Dashboard')}}
@endsection
@section('title_page')
    {{trans('admin_stitle_page_trans.Dashboard')}}
@endsection
@section('content')

<div class="card">
<div class="card-header">
    <a href="{{route('categories.create')}}" class="btn btn-outline-primary">{{trans('category_trans.create')}} </a>
  </div>
 <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>#</th>
        <th>{{trans('category_trans.name')}}</th>
        <th>{{trans('category_trans.image')}}</th>
        <th>{{trans('category_trans.status')}}</th>
        <th>{{trans('category_trans.popular')}}</th>
        <th>{{trans('category_trans.Actions')}}</th>
      </tr>
      </thead>
      <tbody>
        @php
          $id=1;  
        @endphp
@foreach ($categories as $category)
    
        <tr>
            
            <td>{{$id++}}</td>
            <td>{{$category->name}}</td>
            <td><img src="{{Storage::url($category->image)}}" width="100" height="100" alt=""></td>
            <td>
              @if ($category->is_showing==1)
              <span class="badge badge-success">{{trans('category_trans.show')}}</span>
                  
            @else
             <span class="badge badge-danger">{{trans('category_trans.hidden')}}</span>
                  
              @endif
            </td>
 
            <td>  @if ($category->is_popular==1)
              <span class="badge badge-success">{{trans('category_trans.popular')}}</span>
                  
            @else
             <span class="badge badge-danger">{{trans('category_trans.not popular')}}</span>
                  
              @endif</td>
            <td> <a href="{{route('categories.show',$category->id)}}"  class="btn btn-outline-success">{{trans('category_trans.Show')}}</a>
               <a href="{{route('categories.edit',$category->id)}}" class="btn btn-outline-warning">{{trans('category_trans.Edit')}}</a>
               <a href="" class="btn btn-outline-danger">{{trans('category_trans.Delete')}}</a>
            </td>

          </tr>
          @endforeach

      
      </tbody>
     
    </table>
  </div>
</div>
    
   
@endsection



@section('js')
    
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable();
      /*$('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });*/
    });
  </script>
@endsection