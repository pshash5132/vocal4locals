<section class="section">
    <div class="section-header">
        <h1>{{$folder}}</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$folder}} Table</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.'.$folder.'.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
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
                            url: "{{route('admin.offer.changeStatus')}}",
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
