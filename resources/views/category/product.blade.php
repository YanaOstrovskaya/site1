<div class="panel">
	<a href="{{url($product->category->slug.'/'.$product->slug)}}">
	<div class="gray">
		@if($product->salePrice!='')
		<p style="color:white;padding:5px">sale</p>
		@endif
		<img src="{{url($product->imagePath)}}" alt="{{$product->name}}" width="70%">
	</div>
<p>{{$product->name}}</p>
</a>
<p class="blue">
	@if($product->salePrice=='')
	<span class="big">{{$product->price}} грн</span>
	@else
	<span class="big">{{$product->salePrice}} грн </span>
	<span class="mini">{{$product->price}} грн</span>
	@endif
</p>
</div>