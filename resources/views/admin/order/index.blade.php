@php
    $path = request()->path();
    $segments = explode('/', $path);
    $lastSegment = end($segments);
@endphp
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
                            {{-- <a href="{{route('admin.'.$folder.'.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-xl-3 col-xl-3 col-lg-3 col-md-3 mb-3">
                            <label>From </label>
                            <input type="date" class="form-control " autocomplete="off" name="date_from" id="date_from" value="{{$from_date}}" placeholder="from">
                        </div>
                        <div class="col-xl-3 col-xl-3 col-lg-3 col-md-3 mb-3">
                            <label>To </label>
                            <input type="date" class="form-control " name="date_to" autocomplete="off" id="date_to" value="{{$to_date}}" placeholder="to">
                        </div>
                        </div>
                        {{ $dataTable->table() }}
                    </div>
                    <input type="hidden" id="lastSegment" value="{{ $lastSegment }}">

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
            $(document).on('change','#date_from',function () {
                var table = $('#order-table').DataTable();
                table.destroy();
                filter();
            })

            $(document).on('change','#date_to',function () {
                var table = $('#order-table').DataTable();
                table.destroy();
                filter();
            })

            function filter(){
        
                var date_from = $('#date_from').val();
                var date_to = $('#date_to').val();
                var lastSegment = $('#lastSegment').val();
                if(lastSegment == 'monthly-order-report'){
                    var route = '{{route("admin.order.monthlyorderreport")}}';
                    var columnData = [
                        {data: 'id'},
                        {data: 'invoice_id'},
                        {data: 'date'},
                        {data: 'customer'},
                        {data: 'sub_total'},
                        {data: 'discount_amount'},
                        {data:'amount'},
                        {data:'coupon'},
                        {data:'payment_method'},
                        {data:'order_status'},
                        {data:'payment_status'},
                    ];
                }else{
                    var route = "{{route('admin.order.index')}}";
                    var columnData = [
                        {data: 'id'},
                        {data: 'invoice_id'},
                        {data: 'date'},
                        {data: 'customer'},
                        {data: 'sub_total'},
                        {data: 'discount_amount'},
                        {data:'amount'},
                        {data:'order_status'},
                        {data:'payment_status'},
                        {data:'action'},
                    ];
                }
                $('#order-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ordering: false,
                    
                    ajax: {
                        url: route,
                        type: 'GET',
                        data: {
                            date_from: date_from,
                            date_to: date_to
                        },
                    },
                    columns: columnData,
                    "columnDefs": [
                        { "className": "text-center", "targets": "_all" }
                    ],
                });
            }
            
        </script>
    @endpush
</section>
