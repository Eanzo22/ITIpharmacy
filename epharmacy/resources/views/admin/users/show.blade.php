@extends("admin.layout.master") ;
@section("title")
<h1> information of <strong>{{$user["name"]}}</strong></h1>
@endsection

@section("content")
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">information </strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th scope="col">id</th>
                        <td scope="row">{{$user["id"]}}</td>
                    </tr>
                    <tr>
                        <th scope="col">name</th>
                        <td scope="row">{{$user["name"]}}</td>
                    </tr>
                    <tr>
                        <th scope="col">email</th>
                        <td scope="row">{{$user["email"]}}
                    </tr>
                    <tr>
                        <th scope="col">password</th>
                        <td scope="row">{{$user["password"]}}
                    </tr>
                    </tr>
                    <tr>
                        <th scope="col">address</th>
                        <td scope="row">{{$user["address"]}}
                    </tr>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <form method="post" action="{{route('users.destroy' , $user->id) }}">
                                @csrf
                                @method("delete")
                                <input class="btn btn-outline-danger" type="submit" value="Delete">
                            </form>
                            <a href="{{ route('users.edit' ,$user['id'] ) }}" class="btn btn-outline-success">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection