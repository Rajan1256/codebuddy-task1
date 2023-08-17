@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Category CRUD</h2>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($categorys as $category)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $category->title }}</td>
        <td>
            <form action="{{ route('categorys.destroy',$category->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('categorys.edit',$category->id) }}">Edit</a>
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $categorys->links() !!}

@endsection