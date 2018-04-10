<html>
<head>
<title>Google Maps Address Parser - jQuery Plugin</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="parseaddress.jquery.js"></script>
<script src="http://maps.google.com/maps?file=api&v=2.x&key=ABQIAAAAU2JjzZGVyxxE7vZTsdFB1xSSwRPPsIoQEd-zoKGLyrdZf6rgiRQ5AmiMu8TJ3qrYSG3Yp9XdBqP54g" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){

   $("#submit").click(function(){
         
	       // use parseaddress plugin on an element, send response to callback function
	             $("#addressinput").parseaddress(callback);
		        
			   });

			      // function to execute on callback to do somethng with the returned address data
         var callback = function(cleanaddress) {
	 alert('here');
       console.log(cleanaddress['street']);
            console.log(cleanaddress['city']);
          console.log(cleanaddress['state']);
         console.log(cleanaddress['country']);
       console.log(cleanaddress['zip']);
             console.log(cleanaddress['lat']);
           console.log(cleanaddress['lon']);
	  }
									         
					 });
							 </script>
										 </head>

										 <body>
										    
										    <form>
										      <label>Address:</label>
										        <input type="text" name="address" id="addressinput" />
											</form>   
											   
											   </body>
											   </html>

