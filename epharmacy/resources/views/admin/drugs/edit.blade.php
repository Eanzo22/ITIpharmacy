@extends("admin.layout.master")
@section("title" , "Edit drug")

@section("content")
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>edit drug {{$drug->name}}</strong>
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
            <form action="{{route('drugs.update' , $drug->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('put')
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">id</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="id" placeholder="id" class="form-control @error('id') is-invalid @enderror " value="{{$drug->id}} ">
                        @error("id")
                        <small class="form-text text-muted"> {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">name</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder=" name" class="form-control" value="{{$drug->name}} ">
                        @error("name")
                        <small class="form-text text-muted">{{$message}} </small>
                        @enderror()
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">quantity</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="quantity" name="quantity" placeholder="quantity" class="form-control" value="{{$drug->quantity}} "> <small class="help-block form-text">Please enter your quantity</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">price</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="quantity" name="price" placeholder="price" class="form-control" value="{{$drug->price}} "> <small class="help-block form-text">Please enter your price</small></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">company</label></div>
                    <div class="col-12 col-md-9">
                        <select name="company" id="select" class="form-control">
                            @foreach($companies as $company)
                            <option value="{{$company->id}}" @if ( $company->id == $drug->company_id ) selected @endif>{{$company->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" name="edit">
                        <i class="fa fa-dot-circle-o"></i> edit
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