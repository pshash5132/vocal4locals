<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}">{{config('app.name')}}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('admin.dashboard')}}">{{config('app.name')}}</a>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class=active><a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
            </li> --}}
            <li class="{{setActive([
                'admin.dashboard',
                ])}}"><a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Starter</li>
            @if (Auth::user()->role == 'admin')


            <li class="dropdown {{setActive([
                'admin.vendor-profile.*',
                'admin.offer.*',
                'admin.shipping-rule.*',
                'admin.coupons.*',
                ])}}">
                <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>E-Commerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive([
                        'admin.shipping-rule.*',
                        ])}}"><a class="nav-link" href="{{route('admin.shipping-rule.index')}}">Shipping Rule</a>
                    </li>

                    <li class="{{setActive([
                        'admin.vendor-profile.*',
                        ])}}"><a class="nav-link" href="{{route('admin.vendor-profile.index')}}">Vendor</a>
                    </li>


                    <li class="{{setActive([
                        'admin.coupons.*',
                        ])}}"><a class="nav-link" href="{{route('admin.coupons.index')}}">Coupons</a>
                    </li>
                    <li class="{{setActive([
                        'admin.offer.*',
                        ])}}"><a class="nav-link" href="{{route('admin.offer.index')}}">Offers</a>
                    </li>
                </ul>
            </li>









            <li class="dropdown {{setActive([
                'admin.slider.index',
                'admin.inquirySlider.index',
                'admin.about.index',
                'admin.companyDetail.*'
                ])}}">
                <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Manage Website</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive([
                        'admin.slider.index',
                        ])}}"><a class="nav-link" href="{{route('admin.slider.index')}}">Home Slider</a></li>
                    <li class="{{setActive([
                        'admin.inquirySlider.index'
                        ])}}"><a class="nav-link" href="{{route('admin.inquirySlider.index')}}">Inquiry Slider</a></li>
                    <li class="{{setActive([
                        'admin.about.index'
                        ])}}"><a class="nav-link" href="{{route('admin.about.index')}}">About</a></li>
                    <li class="{{setActive([
                            'admin.companyDetail.index'
                            ])}}"><a class="nav-link" href="{{route('admin.companyDetail.index')}}">Company Details</a></li>

                </ul>
            </li>
            <li class="dropdown {{setActive([
                'admin.service-category.*',
                'admin.service-product.*',
                ])}}">
                <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Manage Service Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive([
                        'admin.service-category.*',
                        ])}}"><a class="nav-link" href="{{route('admin.service-category.index')}}">Service Category</a>
                    </li>
                    <li class="{{setActive([
                        'admin.service-product.*',
                        ])}}"><a class="nav-link" href="{{route('admin.service-product.index')}}">Service Products</a>
                    </li>


                </ul>
            </li>
            <li class="dropdown  {{setActive([
                'admin.inquiry.*',
                ])}}">
                <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Manage Inquiries</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive([
                        'admin.inquiry.hotel',
                        ])}}"><a class="nav-link" href="{{route('admin.inquiry.hotel')}}">Hotel</a>
                    </li>
                    <li class="{{setActive([
                        'admin.inquiry.cab',
                        ])}}"><a class="nav-link" href="{{route('admin.inquiry.cab')}}">Cab</a>
                    </li>
                    <li class="{{setActive([
                        'admin.inquiry.services',
                        ])}}"><a class="nav-link" href="{{route('admin.inquiry.services')}}">Service</a>
                    </li>

                </ul>
            </li>
            <li class="dropdown {{setActive([
                'admin.category.*',
                'admin.sub-category.*',
                ])}}">
                <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Manage Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive([
                        'admin.category.*',
                        ])}}"><a class="nav-link" href="{{route('admin.category.index')}}">Category</a>
                    </li>
                    <li class="{{setActive([
                        'admin.sub-category.*',
                        ])}}"><a class="nav-link" href="{{route('admin.sub-category.index')}}">Sub Category</a>
                    </li>


                </ul>
            </li>
            @endif

            <li class="dropdown {{setActive([
                'admin.brand.*',
                'admin.product.*',
                'admin.products-variant.*',
                'admin.products-image-gallery.*',
                ])}}">
                <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Manage Products</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive([
                        'admin.brand.*',
                        ])}}"><a class="nav-link" href="{{route('admin.brand.index')}}">Brand</a>
                    </li>
                    <li class="{{setActive([
                        'admin.product.*',
                        'admin.products-variant.*',
                        'admin.products-image-gallery.*',
                        ])}}"><a class="nav-link" href="{{route('admin.product.index')}}">Product</a>
                    </li>


                </ul>
            </li>




            <li class="dropdown {{setActive([
                'admin.order.*',
                ])}}">
                <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Manage Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive([
                        'admin.order.*',
                        ])}}"><a class="nav-link" href="{{route('admin.order.index')}}">All Orders</a>
                    </li>



                </ul>
            </li>

            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li> --}}

            <li>
                <a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank
                        Page</span>
                    </a>
                    </li>

        </ul>


    </aside>
</div>
