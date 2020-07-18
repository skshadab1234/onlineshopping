
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
<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="fashe-colorlib/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/select2/select2.min.js"></script>
	
	<script type="text/javascript" src="fashe-colorlib/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="fashe-colorlib/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="fashe-colorlib/vendor/sweetalert/sweetalert.min.js"></script>

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
							getplace();
							getovercart();
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
							getplace();
							getovercart();
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
							getplace();
							getovercart();
						}
					}
				});
			});

			getDetails();
			getTotal();
			getplace();
			getovercart();

		});

		function getDetails() {
			$.ajax({
				type: 'POST',
				url: 'cart_details.php',
				dataType: 'json',
				success: function(response) {
					$('#tbody').html(response);
					getCart();
					getovercart();

				}
			});
		}


		function getplace() {
			$.ajax({
				type: 'POST',
				url: 'place_o.php',
				dataType: 'json',
				success: function(response) {
					$('#tbody1').html(response);
					getCart();
							getovercart();
				}
			});
		}

	function getovercart() {
			$.ajax({
				type: 'POST',
				url: 'cart_overview.php',
				dataType: 'json',
				success: function(response) {
					$('#overview').html(response);
							getDetails();
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


		function add_new(){
			var emailid = $("#email").val();

			if (emailid == '') {
				document.getElementById("message").innerHTML = "Please Fill The Form";

			}
			else{
			$.ajax({
				url: 'newsletter.php',
				type: 'POST',
				data: { emailid:emailid },
				success: function(response){
					$('#message').html(response);
					$("#email").val('');
				}
			});
		}
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		getFav();
	});

	function add_fav(){
      var id = $("#favoriate").val();
      $.ajax({
        url: "wishlist_add.php",
        type: "post",
        data: {id:id},
        success: function(data,status){
          getFav();
        }
      });
    }

 


function getFav() {
		$.ajax({
			type: 'POST',
			url: 'wishlist_fetch.php',
			dataType: 'json',
			success: function(response) {
				$('#wishlist_menu').html(response.list);
				$('.wishlist_count').html(response.count);

			}
		});
	}

	  function remove_fav(){
      var id = $("#rem_favoriate").val();
        $.ajax({
        url: "wishlist_delete.php",
        type: "post",
        data: {id:id},
        success: function(data,status){
          getFav();
        }
      });
      
    }
</script>