@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                @if($categories->count() > 0)
                                @foreach($categories as $category)
                                <ul>
                                    <li>{{$category->title}}</li>
                                    @if(count($category->childs))
                                    @include('manageChild',['childs' => $category->childs])
                                    @endif
                                </ul>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3>Add New Category</h3>
            <form method="post" action="{{route('add.category')}}">
                {{csrf_field()}}
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="mb-3">
                    <label>Title*</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" alue="{{old('title')}}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>

                <div class="mb-3">
                    <label>Category*</label>
                    <select type="text" name="parent_id" class="form-select">
                        <option value="">None</option>
                        @if($allCategories)
                        @foreach($allCategories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                        @endif
                    </select>
                    <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success" value="Add New">
                </div>

            </form>


        </div>
    </div>
</div>
@endsection