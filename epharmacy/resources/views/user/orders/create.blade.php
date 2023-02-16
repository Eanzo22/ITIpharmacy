@extends('user.layouts.master');
@section('content')
 <form method="POST" action="{{ route('orders.store') }}">
    @csrf
                        <div class="card">
                            <div class="card-header"><strong>Order</strong>medicine</div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="name" class=" form-control-label">Name</label><input type="text" name="name" id="name" placeholder="" class="form-control"></div>
                                <div class="form-group"><label for="medicine" class=" form-control-label">medicine Name</label><input type="text" name="medicineName" id="product" placeholder="Enter the product name" class="form-control"></div>
                                <div class="form-group"><label for="price" class=" form-control-label">Price</label><input type="text" name="price" id="price" placeholder="aaccepts double too" class="form-control"></div>
                                <div class="form-group"><label for="phone" class=" form-control-label">Phone</label><input type="text" name="phone" id="price" placeholder="aaccepts double too" class="form-control"></div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" rows="5" placeholder="Enter your exact address" class="form-control"></textarea>
                                </div>
                                <div class="row form-group">
                                    <div class="col-8">
                                        <div class="form-group"><label for="count" class=" form-control-label">count</label><input type="text" name="count" id="count" placeholder="number of it" class="form-control"></div>
                                <div class="form-group">
                                    <div style="text-align:center ">
                                        <button type="submit" class="btn btn-dark mb-2">confirm</button>
                                        <button type="reset" class="btn btn-dark mb-2">reset</button>
                                    </div>
                                </div>
                        </div>
                    </form>
@endsection
