@extends('Admin.main')

@section('title', 'Clients')

@section('content')

<div class="row pt-3">
    <div class="col-12">
        <a href="/client-create" class="btn btn-primary" style="width: 100px">Create</a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        @if(session('success'))
            
        <div class="alert alert-{{session('added')}} alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        
        @endif
    </div>
</div>


<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Clients Table</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Options</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                @foreach ($models as $model)
                <tbody>
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->login}}</td>
                    <td>{{$model->password}}</td>
                    <td><a href="/client/{{$model->id}}" class="btn btn-primary">Update</a></td>
                    <td>
                      <form action="/client/{{$model->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
    </div>
</div>

@endsection
