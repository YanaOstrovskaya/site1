@extends('layouts.app')
@section('content')
<h1>{{$product->name}}</h1>
<div class="col-md-6">
<img src="{{url($product->imagePath)}}">
@foreach(json_decode($product->gallery) as $img)
<img src="{{asset($img)}}" alt="{{$product->name}}">
@endforeach
</div>
<div class="col-md-6">
<p style="float: right;">
	<b>Название: </b>{{$product->name}}<br>
	<b>Цена: </b>
	@if($product->salePrice=='')
	<span class="big">{{$product->price}} грн</span>
	@else
	<span class="big">{{$product->salePrice}} грн </span>
	<span class="mini">{{$product->price}} грн</span>
	@endif
	<form action="" id="buy">
		<input type="number" min="1" name="qty" value="1">
		<input type="hidden" name="product_id" value="{{$product->id}}">
		<input type="submit" value="Add to Cart">
	</form>
	<b>Категория: </b><a href="{{url('category/'.$product->category->slug)}}">{{$product->category->name}}</a><br>
	@if($product->manufacture)
	<b>Производитель: </b>{{$product->manufacture->name}}<br>
	@endif
</p>
</div>
<div class="row">
	<div class="col-md-12">
<h5>Описание</h5>
<p>{!!$product->description!!}</p>
</div>
</div>
@endsection