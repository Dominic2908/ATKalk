import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
	static targets = [ "customer", "output" ]
	connect() {
		this.element.addEventListener('click',() => {
			console.log(this.customerTarget.id);
			console.log('/offer/' + this.customerTarget.id);
			$.ajax({  
	           	url:        '/offer',  
	           	type:       'POST',   
	           	dataType:   'json',  
				data: {
					id: this.customerTarget.id,
					},    			
	           	async:      true,  
               
               success: function(data) {  
               
                  console.log(data["street"]);
                  
                  document.getElementById("offer_Customer_street").value(data["street"]);
                  
               },  
               error : function(xhr, textStatus, errorThrown) {  
                  alert('Ajax request failed.');  
               }  
            });  
            console.log(this.outputTarget);
         }); 
  	}
}