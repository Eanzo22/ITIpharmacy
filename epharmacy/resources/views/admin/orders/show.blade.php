@extends("admin.layout.master") ;
@section("title")
<h1> information of <strong>{{$order["name"]}}</strong></h1>
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
                        <td scope="row">{{$order["id"]}}</td>
                    </tr>
                    <tr>
                        <th scope="col">user name</th>
                        <td scope="row">
                            <a href="{{route('users.show' , $order->user->id )}}">{{$order->user->name}} </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">drug name</th>
                        <td scope="row"> <a href="{{route('drugs.show' , $order->drug->id)}}"> {{$order->drug->name}} </a></td>
                    </tr>
                    <tr>
                        <th scope="col">quantity</th>
                        <td scope="row">{{$order["quantity"]}}</td>
                    </tr>
                    <tr>
                        <th scope="col">price</th>
                        <td scope="row">{{$order["price"]}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <form method="post" action="{{route('orders.destroy' , $order->id) }}">
                                @csrf
                                @method("delete")
                                <input class="btn btn-outline-danger" type="submit" value="Delete">
                            </form>
                            <a href="{{ route('orders.edit' ,$order['id'] ) }}" class="btn btn-outline-success">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
