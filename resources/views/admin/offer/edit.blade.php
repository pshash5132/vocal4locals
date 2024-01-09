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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.'.$folder.'.update',$offer->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">Offer Title:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $offer->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Offer Description:</label>
                                <textarea name="description" id="description" class="form-control">{{ $offer->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img src="{{asset($offer->image)}}" width="200" />
                                </div>
                                <label for="image">Offer Image:</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="products">Select Products:</label>
                                <select name="products[]" id="products" class="form-control" multiple required>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ in_array($product->id, $selectedProductIds) ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Offer</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
@push('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    // Initialize Select2 on the products dropdown
    $(document).ready(function() {
        $('#products').select2();
    });
</script>
@endpush
