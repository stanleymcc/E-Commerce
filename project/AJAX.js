//Use for object based AJAX methods
var object = {
    id: "temp",
    name: "temp"
};
//Use for objectArray based AJAX methods
var objectArray = [];
//Use for array based AJAX mathods
var array = [];

//TestAjax Usage
$(document).ready(function(){
        //var file_name = "./PHP/LoadClassInfo.php";
        //TestAjax.getObject(file_name);

        //Wait for all Ajax Requests to be completed
        $(document).ajaxStop(function(){
            //console.log(object);
            //console.log(object.id);
            //console.log(object.name);
        });
});

// TestAjax Class
//
// Methods:
//        var getObject(file_name); //Exprects string literal file_name "something.php"
//        var getObjectArray(file_name); //Exprects string literal file_name "something.php"
//        var getArray(file_name); //Exprects string literal file_name "something.php"
//        var sendObject(file_name, object); //Exprects string literal file_name "something.php", object
//        var sendArray(file_name, objectArray);  //Exprects string literal file_name "something.php", objectArray
var TestAjax = (function(){
        //Description: Receive an object array over AJAX
        //Data Format:
        //
        //  object = {
        //      id: parsed_array['id'],
        //      name: parsed_array['name']
        //  };
        var getObject = function(file_name){
            var storeObject = {};

            $.ajax({
                type: "POST",
                url: file_name,
                data: storeObject
            })

            .fail(function(xhr, status, errorThrown){
                alert("TestAjax.getObject() failed!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            })

            .done(function(storeObject){
                var parsed_array = JSON.parse(storeObject);
                console.log("AJAX: Succesfully Received!");
                objectArray = parsed_array;
            })
        };

        //Description: Receive an object array over AJAX
        //Data Format:
        //
        //  global: objectArray = [];
        var getObjectArray = function(file_name){
            var storeArray;

            $.ajax({
                type: "GET",
                url: file_name,
                data: storeArray
            })

            .fail(function(xhr, status, errorThrown){
                alert("TestAjax.getObjectArray() failed!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            })

            .done(function(storeArray){
                var parsed_array = JSON.parse(storeArray);
                console.log("AJAX: Succesfully Sent!");
                //Store Objects
                for(var i = 0; i < parsed_array.length; i++){
                    objectArray.push(parsed_array[i]);
                }
            })
        };

        //Description: Receive an array over AJAX
        //Data Format:
        //
        // global: array = [];
        var getArray = function(file_name){
            var storeArray;

            $.ajax({
                type: "GET",
                url: file_name,
                data: storeArray
            })

            .fail(function(xhr, status, errorThrown){
                alert("TestAjax.getArray() failed!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            })

            .done(function(storeArray){
                var parsed_array = JSON.parse(storeArray);
                console.log("AJAX: Succesfully Sent!");
                //Store Objects
                for(var i = 0; i < parsed_array.length; i++){
                    array.push(parsed_array[i]);
                }
            })
        };

        //Description: Send an Object over AJAX
        //Data Format:
        //            var object = {
        //              id: "data1",
        //              name: "data2"
        //            };
        var sendObject = function(file_name, object){
            $.ajax({
                type: "POST",
                url: file_name,
                dataType : "json",
                data: {myJson: object}
            })

            .fail(function(xhr, status, errorThrown){
                //alert("TestAjax.sendObject() failed!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            })

            .done(function(json){
                console.log(json)
            })
        };

        //Description: Send an Object array over AJAX
        //Data Format:
        //           var array = [];
        //           var object = {
        //              id: "data1",
        //              name: "data2"
        //           };
        //           array.push(object);
        var sendArray = function(file_name, objectArray) {
            $.ajax({
                type: "POST",
                url: file_name,
                data: {myJsonArray: JSON.stringify(objectArray)}
            })

            .fail(function(xhr, status, errorThrown){
                alert("TestAjax.sendArray() failed!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            })

            .done(function(json){
                console.log("Succesfully"); 
            })
        };

        //Makes Methods accessible to outside world
        return{
            getObject: getObject,
            getObjectArray: getObjectArray,
            getArray: getArray,
            sendObject: sendObject,
            sendArray: sendArray
        };
})();