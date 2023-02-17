@extends('user.layouts.master');
@section('content')
<div class="" style="center">
    <form method="POST" action="{{ route('user.store.order') }}">
        @csrf
        <div class="card">
            <div class="card-header"><strong>Order</strong>medicine</div>
            <div class="card-body card-block">
                <div class="form-group"><label for="name" class=" form-control-label">Name</label><input value="{{$user->name}}" readonly type="text" name="name" id="name" placeholder="{{$user->name}}" class="form-control"></div>
                <div class="form-group"><label for="medicine" class=" form-control-label">medicine Name</label><input value="{{$drug->name}}" readonly type="text" name="drugName" id="product" placeholder="{{$drug->name}}" class="form-control"></div>
                <div class="form-group"><label for="price" class=" form-control-label">Price</label><input type="text" value="{{$drug->price}}" readonly name="price" id="price" placeholder="{{$drug->price}}" class="form-control"></div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input readonly name="address" value="{{$user->address}}" id="address" rows="5" placeholder="{{$user->address}}" class="form-control">
                </div>
                <div class="row form-group">
                    <div class="col-8">
                        <div class="form-group"><label for="count" class=" form-control-label">quantity</label><input type="text" name="quantity" id="count" placeholder="number of it" class="form-control"></div>
                        <div class="form-group">
                            <div style="text-align:center ">
                                <button type="submit" class="btn btn-dark mb-2">confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
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
    </form>
</div>
@endsection