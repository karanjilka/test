@extends('layouts.default')

@section('content')

<form id="productform" method="POST" action="{{url('test/create')}}">
  <div class="form-group">
    <label for="product_name">Product name</label>
    <input type="text" class="form-control" required id="product_name" name="product_name">
  </div>
  <div class="form-group">
    <label for="qty_in_stock">Qty in stock</label>
    <input type="number" class="form-control" required id="qty_in_stock" name="qty_in_stock">
  </div>
  <div class="form-group">
    <label for="price_per_item">Price per item</label>
    <input type="number" class="form-control" required id="price_per_item" name="price_per_item">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>

<table class="table product-rows">
	<thead>
		<tr>
			<th>Product name</th>
			<th>Quantity in stock</th>
			<th>Price per item</th>
			<th>Datetime submitted</th>
			<th>Total value number</th>
		</tr>
	</thead>
	 <tbody>
	 </tbody>
	 <tfoot>
	 <tr>
	 	<td colspan="4">
	 		<strong>Total :</strong>
	 	</td>
	 	<td class="maintotal" style="font-weight:bold;"></td>
	 </tr>
	 </tfoot>
 </table>
@stop

@section('script')
<script type="text/javascript">
(function($){
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
    $(document).ready(function(){
		var alldata = {!!$old_data!!}
		var main_total = 0;
		$.each(alldata, function (key, data) {
			var html = appendrow(data);
		    main_total = main_total + data.total_value;
		    $('.product-rows tbody').append(html);
		    $('.maintotal').text(main_total);
		});
		$('#productform').on('submit', function(e) {
		    e.preventDefault();
		    $.ajax({
		        type: "POST",
		        url: '/test',
		        data: $(this).serialize(),
		        success: function( data ) {
		        	//console.log(data);
		        	var html = appendrow(data);
		        	$('.product-rows tbody').append(html);
		        	main_total = main_total + data.total_value;
		        	$('.maintotal').text(main_total);
		    	}
			});
		});
		function appendrow(data){
			var html = '<tr>';
			html+='<td>'+data.product_name+'</td>';
			html+='<td>'+data.qty_in_stock+'</td>';
			html+='<td>'+data.price_per_item+'</td>';
			html+='<td>'+data.date_time+'</td>';
			html+='<td>'+data.total_value+'</td>';
			html+='</tr>';
			return html;
		}
    });
})(jQuery);
</script>
@stop
