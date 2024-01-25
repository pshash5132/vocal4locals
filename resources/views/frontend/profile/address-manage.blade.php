<div class="app-management-main cmn-bg-tab">
    <div class="row">
        @foreach ($addresses as $address)

            <div class="col-lg-6">
                <div class="app-management">
                    <h3>{{$address->name}}</h3>
                    <p class="p-14-dark">{!!$address->address!!}.</p>
                    <p class="p-14-dark"><a href="mailto:{{$address->email}}" class="p-14-dark">{{$address->email}}</a></p>
                    <p class="p-14-dark"><a href="tel:{{$address->contact}}" class="p-14-dark">{{$address->contact}}</a></p>
                    <div class="tab-wrap">
                        <div>
                            @if ($address->is_default)
                            <p class="tag">Default</p>

                            @endif
                            <p class="tag">{{$address->address_type}}</p>
                        </div>
                        <div>
                            <p class="tag r-10 deleteAddress" data-url="{{route('user.user-address.destroy',$address->id)}}" data-bs-toggle="modal" data-bs-target="#delete-address"><img src="{{asset('frontend')}}/assets/images/delete-icon.svg" alt="Delete" /></p>
                            <p class="tag r-10 editAddress" data-bs-toggle="modal" data-bs-target="#myModal" data-url="{{route('user.user-address.show',$address->id)}}" ><img src="{{asset('frontend')}}/assets/images/edit.svg" alt="Edit" /></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>



