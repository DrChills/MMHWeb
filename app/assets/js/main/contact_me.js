/*
  Jquery Validation using jqBootstrapValidation
   example is taken from jqBootstrapValidation docs 
  */
jQuery(function() {

 jQuery("#contactForm input, #contactForm textarea").jqBootstrapValidation(
    {
     preventSubmit: true,
     submitError: function($form, event, errors) {
      // something to have when submit produces an error ?
      // Not decided if I need it yet
     },
     submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour
       // get values from FORM
       var name = jQuery("input#name").val();  
       var email = jQuery("input#email").val(); 
       var message = jQuery("textarea#message").val();
        var firstName = name; // For Success/Failure Message
           // Check for white space in name for Success/Fail message
        if (firstName.indexOf(' ') >= 0) {
	   firstName = name.split(' ').slice(0, -1).join(' ');
         }        
	 jQuery.ajax({
                url: "http://midlandsmarqueehire.com/template/contact.php",
            	type: "POST",
            	data: {name: name, email: email, message: message},
            	cache: false,
            	success: function() {  
            	// Success message
            	//   jQuery('.success').html("<div class='alert alert-success'>");
            	//   jQuery('.success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            	//	.append( "</button>");
            	//  jQuery('.success > .alert-success')
            	//	.append("<strong>Your message has been sent. </strong>");
 		          //  jQuery('.success > .alert-success')
 			        //  .append('</div>');
 		  //clear all fields
 		  jQuery('#contactForm').trigger("reset");
      //redirect to thank you page 
      window.location.replace("http://midlandsmarqueehire.com/thank-you.php");    


 	      },
 	   error: function() {		
 		// Fail message
 		 jQuery('.success').html("<div class='alert alert-danger'>");
            	jQuery('.success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            	 .append( "</button>");
            	jQuery('.success > .alert-danger').append("<strong>Sorry "+firstName+" it seems that my mail server is not responding...</strong> Could you please email me directly to <a href='mailto:info@midlandsmarqueehire.com'>info@midlandsmarqueehire.com</a> ? Sorry for the inconvenience!");
 	        jQuery('.success > .alert-danger').append('</div>');
 		//clear all fields
 		jQuery('#contactForm').trigger("reset");
 	    },
           });
         },
         filter: function() {
                   return jQuery(this).is(":visible");
         },
       });

      jQuery("a[data-toggle=\"tab\"]").click(function(e) {
                    e.preventDefault();
                    jQuery(this).tab("show");
        });
  });
 

/*When clicking on Full hide fail/success boxes */ 
jQuery('#name').focus(function() {
     jQuery('.success').html('');
  });