import './styles/offer.css';

$(document).ready(function() {
    $('#offer_order_list_number').attr('readonly', true);
    initajaxCustomer();
    
});

function initajaxCustomer(){
$('.customer_offer').click(function(event){
		
		$.ajax({  
	           	url:        '/offer',  
	           	type:       'POST',   
	           	dataType:   'json',  
				data: {
					id: event.target.id,
					},    			
	           	async:      true,  
               
               success: function(data) {  
               
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
               error : function(xhr, textStatus, errorThrown) {  
                  alert('Ajax request failed.');  
   			}  
        });  
    });
}