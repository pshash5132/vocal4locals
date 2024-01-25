<section class="section">
    <div class="section-header">
        <h1>Slider</h1>

    </div>

    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>About</h4>
                        @if (!$about)

                            <div class="card-header-action">
                                <a href="{{route('admin.about.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
                            </div>
                        @endif
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
    @endpush
</section>
