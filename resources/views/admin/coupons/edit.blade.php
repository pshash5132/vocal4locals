<section class="section">
    <div class="section-header">
        <h1>Coupon update</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Coupon update</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.'.$folder.'.update',$data->id) }}">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input  type="text" name="name"  value="{{$data->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input  type="text" name="code"  value="{{$data->code}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input  type="text" name="quantity"  value="{{$data->quantity}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Max Use Per Person</label>
                                        <input  type="text" name="max_use"  value="{{$data->max_use}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input  type="text" name="start_date"   value="{{$data->start_date}}" class="form-control datepicker">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input  type="text" name="end_date"  value="{{$data->end_date}}" class="form-control datepicker">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Discount Type</label>
                                        <select name="discount_type" id="inputState" class="form-control">
                                            <option {{$data->discount_type == "amount"?"SELECTED":""}}  value="amount">Ammount</option>
                                            <option {{$data->discount_type == "percent"?"SELECTED":""}}  value="percent">Percentage (%)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Discount Value</label>
                                        <input type="text" name="discount" value="{{$data->discount}}" class="form-control">
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="inputState">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary"> Update </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
