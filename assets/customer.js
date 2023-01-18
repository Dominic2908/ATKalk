import './styles/customer.css';
//import './app.js';

$(document).ready(function() {
    $("#sam_addr_new_cust").click(function(){
    	getAddress();
  });
});

function getAddress(){
		var custStreet = $("#customer_street").val();
		var custNumber = $("#customer_number").val();
		var custPLZ = $("#customer_postalcode").val();
		var custCity= $("#customer_city").val();
		var custLand = $("#customer_country").val();
    	$("#customer_streetInvoice").val(custStreet);
    	$("#customer_numberInvoice").val(custNumber);
    	$("#customer_postlalcodeInvoice").val(custPLZ);
    	$("#customer_cityInvoice").val(custCity);
    	$("#customer_countryInvoice").val(custLand);
}
