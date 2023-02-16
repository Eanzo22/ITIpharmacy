@extends("admin.layout.master") ;
@section("title")
@section("title")
<h1>All companies </h1>
@endsection

@section("content")
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">companies</strong>
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
                        <th scope="col">quantity</th>
                        <th scope="col">company</th>
                        <th scope="col" colspan="3">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr style="text-align: center">
                        <th scope="row">{{$company["id"]}}</th>
                        <td>{{$company->name}}</td>
                        <td><a href="{{ route('companies.show' , $company['id'] ) }}" class="btn btn-outline-info">show</a></td>
                        <td><a href="{{ route('companies.edit' ,$company['id']  ) }}" class="btn btn-outline-success">Edit</a></td>
                        <form method="post" action="{{route('companies.destroy' , $company->id) }}">
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