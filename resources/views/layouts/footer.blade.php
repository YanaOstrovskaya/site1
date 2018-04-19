   </div>

   <div id="cart" class="modal fade" role="dialog">
   	<div class="modal-dialog modal-lg">
   		<div class="modal-content">
   			<div class="modal-header">
   				<button type="button" class="close" data-dismiss="modal">&times;</button>
   				<h4 class="modal-title">Ваша корзина</h4>
   			</div>
   			<div class="modal-body">
   				@include('cart')
   			</div>
   			<div class="modal-footer">
   				<button type="button" class="btn btn-success" data-dismiss="modal">Continue</button>
   				<button type="button" class="btn btn-danger clear-cart">Clear cart</button>
   				<a href="" class="btn btn-primary">Checkout</a>
   				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

   			</div>
   		</div>
   	</div>
   </div>
   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/script.js') }}"></script>
   @yield('script')
</body>
</html>