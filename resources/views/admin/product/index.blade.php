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
    <a href="{{url('admin/product/create',$category_id)}}" class="btn btn-outline-primary">{{'Create Product'}} </a>
  </div>
  
 <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>#</th>
        <th>{{'name'}}</th>
        <th>{{'image'}}</th>
        <th>{{'status '}}</th>
        <th>{{'popular'}}</th>
        <th>{{'Actions'}}</th>
      </tr>
      </thead>
      <tbody>
        @php
          $id=1;  
        @endphp
@foreach ($products as $product)
    
        <tr>
            
            <td>{{$id++}}</td>
            <td>{{$product->name}}</td>
            <td><img src="{{url('assets/img/products',$product->image)}}" width="100" height="100" alt=""></td>
            
            <td>  @if ($product ->status==1)
              <span class="badge badge-success">{{'hidden'}}</span>
                  
            @else
             <span class="badge badge-danger">{{'not hidden'}}</span>
                  
              @endif</td>
            <td>  @if ($product ->popular==1)
              <span class="badge badge-success">{{'popular'}}</span>
                  
            @else
             <span class="badge badge-danger">{{'not popular'}}</span>
                  
              @endif</td>
            <td> <a href="{{url('/admin/product/index',$product ->id)}}"  class="btn btn-outline-success">{{'Show'}}</a>
               <a href="{{url('/admin/product/edit',$product ->id)}}" class="btn btn-outline-warning">{{'Edit'}}</a>
               <a href="{{url('/admin/product/delete',$product ->id)}}" class="btn btn-outline-danger">{{'Delete'}}</a>
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