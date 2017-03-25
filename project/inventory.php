<form method='POST' action="add_inventory.php"> 
Product ID: <input type='text' name='ProductID'><br><br>          
Product Name: <input type='text' name='PName'><br><br>
Description: <input type='text' name='Des'><br><br>
Price:<input type="text" name="price" onkeypress='validate(event,1)'><br><br>
Quantity: <input type="text" name="quan" onkeypress='validate(event,2)'><br><br>
Image: <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
<input type="submit" value="Submit"><br><br>
</form> 


<script>
  //Script from stacksocial
  function validate(evt,ty) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = ""; 
  if(ty==1){
        regex = /[0-9]|\./;
    }
  else{
      regex = /[0-9]/;
    }
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>