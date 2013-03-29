@layout('layouts.default')

@section('content')
@if ($success = Session::get('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Success!</strong> {{ $success }}
    </div>
@endif
@if ($error = Session::get('error'))
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Error!</strong> {{ $error }}
    </div>
@endif
@if ($warning = Session::get('warning'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Warning!</strong> {{ $warning }}
    </div>
@endif



<form method="post" action="{{ URL::to('cart') }}" class="form-horizontal">
    <h3>Cart Contents</h3>
    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <th width="6%"></th>
            <th width="40%">Name</th>
            <th width="8%">Qty.</th>
            <th width="12%">Price</th>
            <th width="12%">Sub-Total</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($cart_contents as $item)
                <?php
                    // the db_category is set in the options array for an item when it is added
                    // to the cart on the product view page (e.g. view/parts/part.blade.php
                    $cur_db_table = Basemodel::get_table_for_category($item['options']['db_category']);
                ?>
                <tr>
                    <!-- product image -->
                    <td class="align-center">
                        <!-- each item should have an image in its options array -->
                        <span class="span1 thumbnail">{{ $item['options']['image'] }}</span>
                    </td>

                    <td>
                        <!-- link to the item view page -->
                        <strong>{{ $item['options']['part_page_link'] }}</strong>

                        <!-- remove button -->
                        <span class="pull-right">
                            <a href="{{ URL::to('cart/remove/' . $item['rowid']) }}" rel="tooltip" title="Remove the product" class="btn btn-mini btn-danger"><i class="icon icon-white icon-remove"></i></a>
                        </span>

                        <!-- Check if this cart item has options like color, size, etc. -->

                    </td>
                    <td><input type="text" class="span1" value="{{ $item['qty'] }}" name="items[{{ $item['rowid'] }}]" /></td>
                    <td>{{ format_number($item['price']) }}</td>
                    <td>{{ format_number($item['subtotal']) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Your shopping cart is empty.</td>
                </tr>
            @endforelse



        </tbody>
    </table>

    @if (Cartify::cart()->total())
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="63%" colspan="3"></td>
            <td width="12%">Items</td>
            <td width="12%">{{ Cartify::cart()->total_items() }}</td>
        </tr>
        <tr>
            <td width="63%" colspan="3"></td>
            <td width="12%">Total</td>
            <td width="12%">{{ format_number(Cartify::cart()->total()) }}</td>
        </tr>
        </tbody>
    </table>
    <div class="pull-right">
        <a href="{{ URL::to('parts') }}" class="btn">Continue Shopping</a>
        <a href="{{ URL::to('checkout') }}" class="btn btn-info">Checkout</a>
    </div>

    <button type="submit" id="update" name="update" value="1" class="btn btn-success">Update</button>
    <button type="submit" id="empty" name="empty" value="1" class="btn btn-warning">Empty the Cart</button>
    @endif
</form>
@endsection