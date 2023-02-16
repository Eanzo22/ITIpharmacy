@extends('user.layouts.master');
@section('content')
     <form>
                        <div class="card">
                            <div class="card-header"><strong>Edit</strong><small> order{{ $orderID }}</small></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="medicineName" class=" form-control-label">medicineName</label><input type="text" name="medicinename" id="medicineName" placeholder="" class="form-control"></div>
                                <div class="form-group"><label for="price" class=" form-control-label">price</label><input type="text" name="price" id="price" placeholder="" class="form-control"></div>
                                <div class="form-group"><label for="address" class=" form-control-label">address</label><textarea  id="address"  name="address" rows="5" placeholder="" class="form-control"></textarea></div>
                                <div class="form-group"><label for="count" class=" form-control-label">count</label><input type="text" id="count" placeholder="" class="form-control"></div>
                                    <div style="text-align:center ">
                                        <button type="submit" class="btn btn-dark mb-2">confirm</button>
                                        <button type="reset" class="btn btn-dark mb-2">reset</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </form>
@endsection
