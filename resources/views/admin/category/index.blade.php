@extends('admin.master')
@section('css')
    
@endsection
@section('title')
   
@endsection
@section('title_page')
@endsection
@section('content')

<div class="card">
<div class="card-header">
    <a href="" class="btn btn-outline-primary">{{trans('category_trans.create')}} </a>
  </div>
 <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>#</th>
        <th>{{'name'}}</th>
        <th>{{'image'}}</th>
        <th>{{'status'}}</th>
        <th>{{'popular'}}</th>
        <th>{{'Actions'}}</th>
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
              <span class="badge badge-success">{{'show'}}</span>
                  
            @else
             <span class="badge badge-danger">{{'hidden'}}</span>
                  
              @endif
            </td>
 
            <td>  @if ($category->is_popular==1)
              <span class="badge badge-success">{{'popular'}}</span>
                  
            @else
             <span class="badge badge-danger">{{'not popular'}}</span>
                  
              @endif</td>
            <td> <a href=""  class="btn btn-outline-success">{{'Show'}}</a>
               <a href="" class="btn btn-outline-warning">{{'Edit'}}</a>
               <a href="" class="btn btn-outline-danger">{{'Delete'}}</a>
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