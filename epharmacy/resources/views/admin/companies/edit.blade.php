@extends("admin.layout.master")
@section("title" , "Edit company")

@section("content")
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>edit company {{$company->name}}</strong>
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
            <form action="{{route('companies.update' , $company->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('put')
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">id</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="id" placeholder="id" class="form-control @error('id') is-invalid @enderror " value="{{$company->id}} ">
                        @error("id")
                        <small class="form-text text-muted"> {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">name</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder=" name" class="form-control" value="{{$company->name}} ">
                        @error("name")
                        <small class="form-text text-muted">{{$message}} </small>
                        @enderror()
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