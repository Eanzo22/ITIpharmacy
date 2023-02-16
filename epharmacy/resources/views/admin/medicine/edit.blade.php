@extends('admin.layouts.master');
@section('content')
 <form>
                        <div class="card">
                            <div class="card-header"><strong>Edit</strong>medicine</div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="medicine" class=" form-control-label">medicine Name</label><input type="text" name="medicineName" id="product" placeholder="Enter the product name" class="form-control"></div>
                                <div class="form-group"><label for="price" class=" form-control-label">Price</label><input type="text" name="price" id="price" placeholder="aaccepts double too" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">company</label><input type="text" name="company" id="company" placeholder="Enter street name" class="form-control"></div>
                                <div class="row form-group">
                                    <div class="col-8">
                                        <div class="form-group"><label for="count" class=" form-control-label">count</label><input type="text" name="count" id="count" placeholder="number of it" class="form-control"></div>
                                    </div>
                                    <div class="col-8">
                                    <label for="file">Upload your image :-</label>
                                    <input type="file" id="file" class="form-control-file" name="image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div style="text-align:center ">
                                        <button type="submit" class="btn btn-dark mb-2">submit</button>
                                        <button type="reset" class="btn btn-dark mb-2">reset</button>
                                    </div>
                                </div>
                        </div>
                    </form>
@endsection
