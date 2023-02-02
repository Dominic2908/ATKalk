import './styles/offer.css';

$(document).ready(function() {
	$('#offer_order_list_number').attr('readonly', true);
	$('#offer_Customer_id').hide();
	initajaxCustomer();
	initPrototype();
});

function initajaxCustomer() {
	$('.customer_offer').click(function(event) {

		$.ajax({
			url: '/offer',
			type: 'POST',
			dataType: 'json',
			data: {
				id: event.target.id,
			},
			async: true,

			success: function(data) {
				console.log(data["id"]);
				let varId = data["id"];
				$('#offer_customer_id').val(varId);
				$('#offer_Customer_salutation').val(data["salutation"]);
				$('#offer_Customer_name').val(data["name"]);
				$('#offer_Customer_prename').val(data["prename"]);
				$('#offer_Customer_mail').val(data["mail"]);
				$('#offer_Customer_customerNumber').val(data["customerNumber"]);
				$('#offer_Customer_street').val(data["street"]);
				$('#offer_Customer_number').val(data["number"]);
				$('#offer_Customer_postalcode').val(data["postalcode"]);
				$('#offer_Customer_city').val(data["city"]);
				$('#offer_Customer_country').val(data["country"]);
				$('#offer_Customer_streetInvoice').val(data["streetInvoice"]);
				$('#offer_Customer_numberInvoice').val(data["numberInvoice"]);
				$('#offer_Customer_postlalcodeInvoice').val(data["postlalcodeInvoice"]);
				$('#offer_Customer_cityInvoice').val(data["cityInvoice"]);
				$('#offer_Customer_countryInvoice').val(data["countryInvoice"]);

			},
			error: function(xhr, textStatus, errorThrown) {
				alert('Ajax request failed.');
			}
		});
	});
}

function initPrototype() {
	jQuery('.add-another-collection-widget').click(function(e) {
		var list = jQuery(jQuery(this).attr('data-list-selector'));
		// Try to find the counter of the list or use the length of the list
		var counter = list.data('widget-counter') || list.children().length;

		// grab the prototype template
		var newWidget = list.attr('data-prototype');
		// replace the "__name__" used in the id and name of the prototype
		// with a number that's unique to your emails
		// end name attribute looks like name="contact[emails][2]"
		newWidget = newWidget.replace(/__name__/g, counter);
		// Increase the counter
		counter++;
		// And store it, the length cannot be used if deleting widgets is allowed
		list.data('widget-counter', counter);

		// create a new list element and add it to the list
		var newElem = jQuery(list.attr('data-widget-tags')).html(newWidget);
		newElem.appendTo(list);
	});
}