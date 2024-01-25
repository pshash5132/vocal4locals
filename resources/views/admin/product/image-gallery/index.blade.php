<section class="section">
    <div class="section-header">
        <h1>{{$folder}}</h1>

    </div>
    <div class="mb-3">

        <a href="{{route('admin.product.index')}}" class="btn btn-primary">Back</a>
    </div>
    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product: {{$product->name}}</h4>

                    </div>
                    <div class="card-body">
                         <form action="{{route('admin.products-image-gallery.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image" >Image<code>[Multiple Image Supported]</code></label>
                                <input type="file" class="form-control" multiple name="images[]"/>
                                <input type="hidden"  name="product_id" value="{{$product->id}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>

                         </form>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Images</h4>

                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
        <script>
            $(document).ready(function(){
                $('body').on('click','.change-status',function(){
                    let isChecked = $(this).is(':checked');
                    let id = $(this).data('id')
                    $.ajax({
                            type: 'PUT',
                            url: "{{route('admin.product.changeStatus')}}",
                            data:{
                                status:isChecked,id
                            },
                            success: function(res) {
                                toastr.success(res.message)
                            },
                            error: function(xhr, status, error) {
                                console.log(error)
                            }
                        })
                })
            })
        </script>
    @endpush
</section>
