@extends("admin.layout.master")
@section("title" , "Create drugs")

@section("content")
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>create drug Form</strong>
        </div>
        <!-- alert if success -->
        @if(Session::has("msg"))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            {{Session::get("msg")}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        @if($errors->all())
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Fail</span>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li> 
                    @endforeach
                </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif()
        <div class="card-body card-block">
            <form action="{{route('drugs.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">id</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="id" placeholder="id" class="form-control @error('id') is-invalid @enderror " value = "{{old('id')}} " >
                    @error("id")
                    <small class="form-text text-muted"> {{$message}}</small>
                    @enderror
                </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">name</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder=" name" class="form-control" value = "{{old('name')}} "> <small class="form-text text-muted">Please enter your name </small></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">quantity</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="quantity" name="quantity" placeholder="quantity" class="form-control" value = "{{old('quantity')}} "> <small class="help-block form-text">Please enter your quantity</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">price</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="price" name="price" placeholder="price" class="form-control" value = "{{old('price')}} "> <small class="help-block form-text">Please enter your price</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">company</label></div>
                    <div class="col-12 col-md-9">
                        <select name="company" id="select" class="form-control">
                            @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">image</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="image" name="image" placeholder="image" class="form-control"><small class="help-block form-text">Please enter your image</small></div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" name="add">
                        <i class="fa fa-dot-circle-o"></i> Add
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
@endsection