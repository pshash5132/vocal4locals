<!-- all-category-section -->
@php
    $categories = categories();
@endphp
<section class="all-category-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="search-category-wrap">

                    <div class="dropdown all-category">
                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                          All Category
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{route('product-list',['category'=>$category->slug])}}">
                                    <div class="icon-wrap">
                                        <i class="{{$category->icon}}"></i>
                                    </div>
                                    {{$category->name}}
                                </a>
                                <ul class="dropdown-menu submenu">
                                    @foreach ($category->subCategories as $subCategory)
                                    <li>
                                        <a class="dropdown-item" href="{{route('product-list',['subcategory'=>$subCategory->slug])}}">

                                            {{$subCategory->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach

                        </ul>
                    </div>



                    <div class="search-wrap">
                        <select name="search_type" id="search_type">
                            <option value="products">All Products</option>
                            <option value="services">All Services</option>
                        </select>
                        <form action="{{route('product-list')}}">

                            <input type="search" name="search" class="form-control" placeholder="Search" />
                            <input type="submit" value="search" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
