<section class="section">
    <div class="section-header">
        <h1>{{$folder}}</h1>
    </div>
        <div class="mb-3">

            <a href="{{route('admin.products-variant.index',['product'=>$product->id])}}" class="btn btn-primary">Back</a>
        </div>


    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product  : {{$product->name}}</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.'.$folder.'.create',['product'=>$product->id])}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
                        </div>
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
                            url: "{{route('admin.products-variant.changeStatus')}}",
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