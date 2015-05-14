$(document).ready(function() {
	$(".shortlist").on('click', function() {
		var item = {};
		
		var idElement = $(this).parent().children(".id:first");
		
		var name = idElement.next().next().html().replace("Name: ", "");
		var productId = idElement.html().replace("ID: ", "");
		var price = idElement.next().next().next().next().next().next().html().replace("Price: ", "");
		price = price.substr(0, price.indexOf(" per"));
		var quantity = $(this).parent().children("input:last").val();

		if(quantity !== 0) {
			item["name"] = name;
			item["productId"] = productId;
			item["price"] = price;
			item["quantity"] = quantity;

			$(this).parent().children("input:last").val("0");
			// console.log(item);

			addToCart(item);
		} else {
			alert("Already added to the list");
		}
	});

	$(".remove").on('click', function() {
		var item = {};
		
		var idElement = $(this).parent().children(".id:first");
		
		var name = idElement.next().next().html().replace("Name: ", "");
		var productId = idElement.html().replace("ID: ", "");
		var price = idElement.next().next().next().next().next().next().html().replace("Price: ", "");
		price = price.substr(0, price.indexOf(" per"));

		item["name"] = name;
		item["productId"] = productId;
		item["price"] = price;

		removeFromCart(item);

	})

	function addToCart(item) {
		$.ajax({
			url: './backend/addToCart.php',
			method: 'GET',
			contentType: 'json',
			data: item,
			success: function(msg) {
				if(msg.indexOf("success") >= 0) {
					console.log("Successfully added");
				}
			},
			error: function() {
				alert("Could not add the item");
			}
		})
	}

	function removeFromCart(item) {
		$.ajax({
			url: './backend/removeFromCart.php',
			method: 'GET',
			contentType: 'json',
			data: item,
			success: function(msg) {
				if(msg.indexOf("success") >= 0) {
					console.log("Successfully removed");
				}
			},
			error: function() {
				alert("Could not add the item");
			}
		})
	}
});