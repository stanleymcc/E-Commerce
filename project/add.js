

$(document).ready(function(){
    $('.submission').click(function(){
       var formData = {
        'id' : [] , 
        'quantity' : [],
        };
       var item_quantities = $("input[name*='item']").each(function(){var current = $(this).val()});
       console.log(item_quantities);
       
        formData.quantity = item_quantities; 
       
       //
       var id = $("div[class='product-id']").each(function(){var current = $(this).val()});
     //  console.log(id); 
       formData.id = id; 
       
       
       
       console.log(formData); 
       TestAjax.sendArray('receive.php', formData);
       
    //console.log(formData.id); 
/*    $.ajax({
        type : 'POST',
        url : 'add_cart.php',
        data : formData,
        dataType : json,
        encode : true 
    })  
    
    .done(function(data){
        console.log(data); 
    })
        event.preventDefault(); 

       */ 
    });
     
});