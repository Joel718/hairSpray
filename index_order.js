$(document).ready(function(){

    function place_order() {
        $("#place_order"). click(function(e){
            var action = "Place Order";
            $.ajax({
                type: 'POST',
                url: 'index.php',
                data: {action: action},
                succes:function(data) {
                    
                }
            })
                
            });
        }
    });

