/*
*Function to send add to cart request to server
*/
function add_to_cart(id)
{
  var product_id = $("#"+id+"-id").val();
  var quantity = $("#"+id+"-quantity").val();
  if(!cart_quantity_validation(quantity)){return;}

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
*Function to update cart item quantity
*/
function update_cart(quantity,product_id)
{
  if(!cart_quantity_validation(quantity)){return;}
  $.post("/update-cart",
        {
          id:product_id,
          quantity:quantity,
          "_token": $('meta[name="csrf-token"]').attr('content'),
        },
        function(data,status){
          //server response
          if ( data === '-1' ){ alert("Product out of stock"); $('#product-'+product_id+'-cart-quantity').val($('#product-'+product_id+'-cart-quantity').val()-1); return;}
          if ( data === '0' ){ alert("Please enter a valid number for the quantity!"); return;}
          refresh_cart_item_quantity(data);
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
    //$("#cart-contents").append('<tr><th>'+(count + 1)+'</th><td>'+response[count].item+'</td><td>'+response[count].product_id+'</td><td>'+response[count].quantity+'</td><td>'+response[count].price.toLocaleString()+'</td><td>'+response[count].total.toLocaleString()+'</td><td>'+response[count].image+'</td><td><span class="badge badge-sm badge-danger" onclick="remove_from_cart('+response[count].product_id+')">x</span></td></tr>');
    $("#cart-contents").append(cart_html(response[count].item,response[count].price.toLocaleString(),response[count].quantity,response[count].product_id,response[count].image));
    cartTotal += parseFloat(response[count].total);
  }
  $("#cart-total").text('Ksh. '+cartTotal.toLocaleString());
}

function refresh_cart_badge(data)
{
  var numberOfItemsInCart = data.length;
  if( numberOfItemsInCart < 1 )
  {
    $("#cart-badge").hide();
    return;
  }
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
    alert("Data: " + data + "\nStatus: " + status);
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

 /*
 *Function to return cart repeatable html
 */
 function cart_html(name,price,quantity,id,image)
 {
   var html ='<div class="row"><div class="col-xs-2"><img class="img-responsive" src="'+image+'" width="100" height="70"></div><div class="col-xs-4"><h4 class="product-name"><strong>'+name+'</strong></h4><h4><small></small></h4></div><div class="col-xs-6"><div class="col-xs-6 text-right"><h6><strong>Ksh. '+price+' <span class="text-muted">x</span></strong></h6></div><div class="col-xs-4"><input type="number" min="1" class="form-control input-sm" value="'+quantity+'"></div><div class="col-xs-2"><button type="button" class="btn btn-link btn-xs" onclick="remove_from_cart('+id+')"><span class="glyphicon glyphicon-trash"> </span></button></div></div></div><hr>';

   return html;
 }

 /*
 *Function to hide element
 */
 function hideElement(id)
 {
   $("#"+id).fadeOut('slow');
 }

 /*
 *Function to show hidden element
 */
 function showElement(id)
 {
   $("#"+id).fadeIn('slow');
 }

 /*
 *Function to validate cart inputs
 */
 function cart_quantity_validation(quantity)
 {
   if ( isNaN(parseInt(quantity)) || !isFinite(quantity) ){//data validation
     alert("Please enter a valid number for the quantity!");
     return false;
   }

   if( quantity < 1 ){alert("Quantity cannot be less than one");return false;}

   return true;
 }

 /*
 *Function to refresh cart item quantity with new data from server
 */
 function refresh_cart_item_quantity(data)
 {
   var responseObj = JSON.stringify(data);
   var response = JSON.parse(responseObj);
   var cartTotal = 0;
   for ( var count=0; count<response.length; count++ ){

     cartTotal += parseFloat(response[count].total);
   }
   $("#cart-total").text('Ksh. '+cartTotal.toLocaleString());
 }
