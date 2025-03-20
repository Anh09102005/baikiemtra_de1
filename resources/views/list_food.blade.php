@extends('master')
@section('content')
<div class="container mt-3">
  <a class="btn btn-success" href="{{ route('food.create') }}">Thêm món hàng mới</a>
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>            
  <table class="table table-bordered">
    <thead>
      <label>Danh sách này có: {{ $foods->count() }} món</label>
      <tr>
        <td>STT</td>
        <td>id</td>
        <td>image</td>
        <td>name</td>
        <td>desciption</td>
        <td>price</td>
        <td>category</td>
        <td class="text-center" colspan="3">Action</td>
      </tr>
    </thead>
    <tbody>
      <?php 
        $stt = 0;
        ?>
        @foreach($foods as $key => $value)
        <tr>
          <td>{{ $stt++ }}</td>
            <td>{{ $value->id }}</td>
            <td><img src="{{ asset('storage/images/'.$value->image) }}" style="width: 40px; height : 40px"></td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->price }}</td>
            <td>{{ $value->category->name }}</td>
            <td>
              <form class="text-center" action="{{ route('food.show', ['food' => $value->id]) }}" method="get">
                <button > <i class="bi bi-eye text-info"></i>Xem</button>
              </form>
            </td>
            <td  >
              <form class="text-center" action="{{ route('food.edit', ['food' => $value->id]) }}" method="get">
                <button > <i class="bi bi-eye text-info"></i>Sửa</button>
              </form>
            </td>
            <td>
              <form class="text-center" action="{{ route('food.destroy', ['food' => $value->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" > <i class="bi bi-eye text-danger"></i>Xoá</button>
              </form>
            </td>
           
        </tr>
        @endforeach
        
    </tbody>
  </table>
</div>
@endsection