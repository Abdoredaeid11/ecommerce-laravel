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
    <a href="/admin/category/create " class="btn btn-outline-primary">{{'create category'}} </a>
  </div>
 <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>#</th>
        <th>{{'name'}}</th>
        <th>{{'image'}}</th>
        <th>{{'description'}}</th>
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
            <td><img src="{{url('assets/img/category',$category->image)}}" width="100" height="100" alt=""></td>
            
 
            <td>{{$category->description}}</td>
            <td> <a href="{{url('/admin/product/index',$category->id)}}"  class="btn btn-outline-success">{{'Show Products'}}</a>
               <a href="{{url('/admin/category/edit',$category->id)}}" class="btn btn-outline-warning">{{'Edit'}}</a>
               <a href="{{url('/admin/category/delete',$category->id)}}" class="btn btn-outline-danger">{{'Delete'}}</a>
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