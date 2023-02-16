@extends("admin.layout.master") ; 
@section("title")
<h1 > information of  <strong>{{$drug["name"]}}</strong></h1>
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
                    <td scope="row">{{$drug["id"]}}</td>
                </tr>
                <tr>
                    <th scope="col">name</th>
                    <td scope="row">{{$drug["name"]}}</td>
                </tr>
                <tr>
                    <th scope="col">quantity</th>
                    <td scope="row">{{$drug["quantity"]}}</tr>
                </tr>
                <tr>
                    <th scope="col">company</th>
                    <td>
                        <a href = "{{route('companies.show' , $drug->company->id)}}"> {{$drug->company->name ?? ""}} </a>
                    </td>
                </tr>
                <tr>
                    <th scope="col">categories</th>
                    <td>
                        <ul style = "list-style-position: inside;">
                            @foreach ($drug->categories as $category)
                                <li style = "margin-top : 2px"> <a href="{{ route('categories.show' ,$category['id'] ) }}" >{{$category->name}} </a></li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                    <form method="post" action="{{route('drugs.destroy' , $drug->id) }}">
                            @csrf
                            @method("delete")
                            <input class="btn btn-outline-danger" type="submit" value="Delete">
                        </form>
                    <a href="{{ route('drugs.edit' ,$drug['id'] ) }}" class="btn btn-outline-success">Edit</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection