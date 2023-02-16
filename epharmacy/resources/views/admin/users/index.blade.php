@extends("admin.layout.master") ;
@section("title")
@section("title")
<h1>All users </h1>
@endsection

@section("content")
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">users</strong>
        </div>
        @if(Session::has("msg"))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            {{Session::get("msg")}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-success">
                    <tr style="text-align: center">
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">password</th>
                        <th scope="col" colspan="3">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr style="text-align: center">
                        <th scope="row">{{$user["id"]}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password }}</td>
                        <td><a href="{{ route('users.show' , $user['id'] ) }}" class="btn btn-outline-info">show</a></td>
                        <td><a href="{{ route('users.edit' ,$user['id']  ) }}" class="btn btn-outline-success">Edit</a></td>
                        <form method="post" action="{{route('users.destroy' , $user->id) }}">
                            @csrf
                            @method("delete")
                            <td>
                                <input class="btn btn-outline-danger" type="submit" value="Delete">
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection