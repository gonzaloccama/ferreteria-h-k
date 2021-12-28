{{--<div class="wrap-search center-section">--}}
{{--    <div class="wrap-search-form">--}}
{{--        <form action="{{ route('product.search') }}" id="form-search-top" name="form-search-top">--}}
{{--            <input type="text" name="search" value="{{ $search }}" placeholder="Search here...">--}}
{{--            <button form="form-search-top" type="submit">--}}
{{--                <i class="fa fa-search" aria-hidden="true"></i>--}}
{{--            </button>--}}
{{--            <div class="wrap-list-cate">--}}
{{--                <input type="hidden" name="product_cat" value="{{ $product_cat }}" id="product-cat">--}}
{{--                <input type="hidden" name="product_cat_id" value="{{ $product_cat_id }}" id="product_cat_id">--}}
{{--                <a href="#" class="link-control">{{ str_split($product_cat, 12)[0] }}</a>--}}
{{--                <ul class="list-cate">--}}
{{--                                        <li class="level-1">-Smartphone & Table</li>--}}
{{--                                        <li class="level-2">Batteries & Chargens</li>--}}
{{--                    <li class="level-0">All Category</li>--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <li class="level-1" data-id="{{ $category->id }}">{{ $category->name }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="search-style-2">
    <form action="{{ route('product.search') }}" id="form-search-top" name="form-search-top">
        <input type="hidden" name="product_cat" value="{{ $product_cat }}" id="product-cat">
        <input type="hidden" name="product_cat_id" value="{{ $product_cat_id }}" id="product_cat_id">

        <select class="select-active" name="product_cat_id">
            <option>{{ $product_cat }}</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="text" name="search" value="{{ $search }}" placeholder="Buscar artículos...">
    </form>
</div>
