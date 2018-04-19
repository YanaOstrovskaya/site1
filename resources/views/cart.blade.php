@if(session('cart'))
	<table class="table modal-dialog">
		<thead>
			<tr>
				<th>Название</th>
				<th>Цена</th>
				<th>Sale</th>
				<th>Количество</th>
				<th>Картинка</th>
			</tr>
		</thead>
		<tbody>
			@foreach(session('cart') as $product)
			<tr>
				<td>{{$product['name']}}</td>
				<td>{{$product['price'] * $product['qty']}}</td>
				<td>{{$product['salePrice'] * $product['qty']}}</td>
				<td>{{$product['qty']}}</td>
				<td><img src="{{asset($product['imagePath'])}}" class="img-responsive" style="width: 100px;"></td>
			</tr>
			@endforeach
			<tr>
				<td colspan="5">Общая сумма: {{session('totalSum')}}</td>
			</tr>
		</tbody>
	</table>
@else
	Your cart is empty
@endif