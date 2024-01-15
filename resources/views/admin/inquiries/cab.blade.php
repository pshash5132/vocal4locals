<section class="section">
    <div class="section-header">
        <h1>Inquiry</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Inquiries Table</h4>
                        <div class="card-header-action">

                        </div>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
    <input type="hidden" id="statusUpdateRoute" value="{{route('admin.inquiry.cab.changeStatus')}}"/>
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
        @include('admin.inquiries.inquiries_JS');
    @endpush
</section>
