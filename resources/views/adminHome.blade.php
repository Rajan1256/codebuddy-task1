@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    Hello {{ Auth::user()->name }}.
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><strong>No</strong></th>
                                <th><strong>Nama</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Go to User Dashboard</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $key => $userdata)
                            <tr>
                                <th>{{$key+1}}</th>
                                <th>{{$userdata->name}}</th>
                                <th>{{$userdata->email}}</th>
                                <th><a href="{{ route('displaydashboard', ['userId' => $userdata->id]) }}" class="btn btn-info">Move</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection