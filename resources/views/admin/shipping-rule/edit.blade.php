<section class="section">
    <div class="section-header">
        <h1>{{$folder}}</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$folder}}</h4>

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.'.$folder.'.update',$data->id) }}">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label>Name</label>
                                <input  type="text" name="name"  value="{{$data->name}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="cost-type">Type</label>
                                <select name="type" id="cost-type" class="form-control">
                                    <option {{$data->type=="flat_cost"?"selected":""}} value="flat_cost">Flat Cost</option>
                                    <option {{$data->type=="min_cost"?"selected":""}} value="min_cost">Minimum order amount</option>
                                </select>
                            </div>


                            <div class="form-group mincost d-none">
                                <label>Minimum Amount</label>
                                <input  type="text" name="min_cost"  value="{{$data->min_cost}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Shipping Amount</label>
                                <input  type="text" name="cost"  value="{{$data->cost}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Start KM</label>
                                <input  type="text" name="start_km"  value="{{$data->start_km}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>End KM</label>
                                <input  type="text" name="end_km"  value="{{$data->end_km}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputState">status</label>
                                <select name="status" id="inputState" class="form-control">
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
@push("scripts")
    <script>
        $(document).ready(function(){
            $("#cost-type").change(function(){
                if($(this).val()!="min_cost"){
                    $('.mincost').addClass('d-none');
                }else{
                    $('.mincost').removeClass('d-none');
                }
            })
        })
    </script>
@endpush
