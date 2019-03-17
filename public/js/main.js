/*
*Function to send add to cart request to server
*/
function add_to_cart(id)
{
  var product_id = $("#"+id+"-id").val();
  var quantity = $("#"+id+"-quantity").val();

  if ( isNaN(parseInt(quantity)) || !isFinite(quantity) ){//data validation
    alert("Please enter a valid number for the quantity!");
    return;
  }

  if( quantity < 1 ){alert("Quantity cannot be less than one");return;}

  $.post("/add-to-cart",
        {
          id:product_id,
          quantity:quantity,
          "_token": $('meta[name="csrf-token"]').attr('content'),
        },
        function(data,status){
          //server response
          if ( data === '-1' ){ alert("Product out of stock"); return;}
          if ( data === '0' ){ alert("Please enter a valid number for the quantity!"); return;}

          refresh_cart(data);
      });

}
/*
*Function to send remove from cart request to server
*/
function remove_from_cart(id)
{
  var product_id = id;

  $.post("/remove-from-cart",
        {
          id:product_id,
          "_token": $('meta[name="csrf-token"]').attr('content'),
        },
        function(data,status){
          //server response
          refresh_cart(data);
      });

}

/*
*Function to refresh cart with new data from server
*/
function refresh_cart(data)
{
  refresh_cart_badge(data);
  var responseObj = JSON.stringify(data);
  var response = JSON.parse(responseObj);
  $("#cart-contents").html('');
  var cartTotal = 0;
  for ( var count=0; count<response.length; count++ ){
    $("#product-"+response[count].product_id+"-id").val(response[count].product_id);
    $("#product-"+response[count].product_id+"-quantity").val(response[count].quantity);
    $("#cart-contents").append('<tr><th>'+(count + 1)+'</th><td>'+response[count].item+'</td><td>'+response[count].product_id+'</td><td>'+response[count].quantity+'</td><td>'+response[count].price.toLocaleString()+'</td><td>'+response[count].total.toLocaleString()+'</td><td>'+response[count].image+'</td><td><span class="badge badge-sm badge-danger" onclick="remove_from_cart('+response[count].product_id+')">x</span></td></tr>');
    cartTotal += parseFloat(response[count].total);
  }
  $("#cart-total").text(cartTotal.toLocaleString());
}

function refresh_cart_badge(data)
{
  var numberOfItemsInCart = data.length;
  $("#cart-badge").text(numberOfItemsInCart);
}

function submitForm(id)
{
  $("#"+id).submit();
}

//prevent multiple submit
function prevent_multiple_submit(formId)
{
    $("#"+formId+"-btn").attr('disabled','true');
}

/*
*Function to send payment request to mpesa
*/
function process_mpesa_payment( userId, orderId )
{
  //remove in prod
  /*var url = "http://"+location.host+"/thank-you";
  window.open(url, '_self');
  return;*/
  var url = "http://"+location.host+"/mpesa-payment"
  $.post(url,
  {
    userId: userId,
    orderId: orderId,
    _token: $('meta[name="csrf-token"]').attr('content')
  },
  function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
  });
}

$(document).ajaxStart(function(){
  $("#ajax-loader").addClass('d-block');
});

$(document).ajaxStop(function(){
  $("#ajax-loader").removeClass('d-block');
});

//Pusher even listener

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('ceb9fed3db8c5ea23d79', {
 cluster: 'ap2',
 forceTLS: true
});

var channel = pusher.subscribe('my-channel');
channel.bind('mpesa', function(data) {

  complete_transaction(data);

});
 /*
 *Function to complete transaction
 */

 function complete_transaction(transactionData)
 {
   //decode data
   var dataObject = JSON.stringify(transactionData);
   dataObject = JSON.parse(dataObject);
   alert(dataObject.data.response);

   if( dataObject.data.status ) //check if transaction was successful
   {
     var url = "http://"+location.host+"/complete-payment"
     window.open(url, '_self');
   }

 }
