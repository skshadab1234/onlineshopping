<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script>
	$(function() {
		// Datatable
		$('#example1').DataTable()
		$('#example2').DataTable()
		$('#example3').DataTable()

		//CK Editor
		CKEDITOR.replace('editor1')
	});
</script>
<!--Magnify -->
<script src="magnify/magnify.min.js"></script>
<script>
	$(function() {
		$('.zoom').magnify();
	});
</script>
<!-- Custom Scripts -->
<script>
	$(function() {
		$('#navbar-search-input').focus(function() {
			$('#searchBtn').show();
		});

		$('#navbar-search-input').focusout(function() {
			$('#searchBtn').hide();
		});

		getCart();

		$('#productForm').submit(function(e) {
			e.preventDefault();
			var product = $(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'cart_add.php',
				data: product,
				dataType: 'json',
				success: function(response) {
					$('#callout').show();
					$('.message').html(response.message);
					if (response.error) {
						$('#callout').removeClass('callout-success').addClass('callout-danger');
					} else {
						$('#callout').removeClass('callout-danger').addClass('callout-success');
						getCart();
					}
				}
			});
		});

		$('#productForm1').submit(function(e) {
			e.preventDefault();
			var product1 = $(this).serialize();
			$.ajax({
				type: 'POST',
				url: 'cart_add.php',
				data: product1,
				dataType: 'json',
				success: function(response) {
					$('#callout').show();
					$('.message').html(response.message);
					if (response.error) {
						$('#callout').removeClass('callout-success').addClass('callout-danger');
					} else {
						$('#callout').removeClass('callout-danger').addClass('callout-success');
						getCart();
					}
				}
			});
		});
		$(document).on('click', '.close', function() {
			$('#callout').hide();
		});

	});


	function getCart() {
		$.ajax({
			type: 'POST',
			url: 'cart_fetch.php',
			dataType: 'json',
			success: function(response) {
				$('#cart_menu').html(response.list);
				$('.cart_count').html(response.count);

			}
		});
	}
</script>
<script>
	$(function() {
		$('#add').click(function(e) {
			e.preventDefault();
			var quantity = $('#quantity').val();
			quantity++;
			$('#quantity').val(quantity);
		});
		$('#minus').click(function(e) {
			e.preventDefault();
			var quantity = $('#quantity').val();
			if (quantity > 1) {
				quantity--;
			}
			$('#quantity').val(quantity);
		});

	});
</script>
<script>
	var total = 0;
	$(function() {
		$(document).on('click', '.cart_delete', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			$.ajax({
				type: 'POST',
				url: 'cart_delete.php',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					if (!response.error) {
						getDetails();
						getCart();
						getTotal();
					}
				}
			});

		});


		$(document).on('click', '.minus', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			var qty = $('#qty_' + id).val();
			if (qty > 1) {
				qty--;
			}
			$('#qty_' + id).val(qty);
			$.ajax({
				type: 'POST',
				url: 'cart_update.php',
				data: {
					id: id,
					qty: qty,
				},
				dataType: 'json',
				success: function(response) {
					if (!response.error) {
						getDetails();
						getCart();
						getTotal();
					}
				}
			});
		});


		$(document).on('click', '.add', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			var qty = $('#qty_' + id).val();
			qty++;
			$('#qty_' + id).val(qty);
			$.ajax({
				type: 'POST',
				url: 'cart_update.php',
				data: {
					id: id,
					qty: qty,
				},
				dataType: 'json',
				success: function(response) {
					if (!response.error) {
						getDetails();
						getCart();
						getTotal();
					}
				}
			});
		});

		getDetails();
		getTotal();

	});

	function getDetails() {
		$.ajax({
			type: 'POST',
			url: 'cart_details1.php',
			dataType: 'json',
			success: function(response) {
				$('#tbody1').html(response);
				getCart();
			}
		});
	}

	function getTotal() {
		$.ajax({
			type: 'POST',
			url: 'cart_total.php',
			dataType: 'json	',
			success: function(response) {
				delivery1 = response;

			}
		});
	}
</script>