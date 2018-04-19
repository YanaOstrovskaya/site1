(function($, undefined){
$(function(){

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
//добавление в корзину
$('#buy').submit(function(e){
	e.preventDefault();
	var dataForm = $(this).serialize();
	//console.log(dataForm);
	$.ajax({
		type: 'POST',
		url: '/cart/add-to-cart',
		data: dataForm,
		success: function(result){
			$('#cart .modal-body').html(result);
			$('#cart').modal();
		}
	});
})

})
})(jQuery)