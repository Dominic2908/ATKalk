import './styles/offer.css';

$(document).ready(function() {
    $('#offer_order_list_number').attr('readonly', true);
    
   
});

function initRouteToController(){
	 var url = Routing.generate('offer');
	 $.ajax({
            type: 'POST',
            url: url,
            data: jason,
        }).done(function (response) {
       
        console.log("Hallo Welt");
              
    });
}