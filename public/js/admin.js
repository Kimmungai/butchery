//submit form
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
*Function to remove.d-none from elements
*/
function show_sec(showObject,hideObject,user_type)
{
  for( var x=0; x < showObject.length; x++ )
  {
    $("#"+showObject[x]).removeClass('d-none');
  }

  for ( var x=0; x < hideObject.length; x++ )
  {
    $("#"+hideObject[x]).addClass('d-none');
  }

  $('#user_type').val(user_type);
}

/*
*Function to dynamically add departments
*/
function refresh_departments(supermarket_id,elementsToAddDepts)
{
  $.get("/supermarket-departments/"+supermarket_id+"",
        {
        },
        function(data,status){
          for( var x = 0; x < elementsToAddDepts.length; x++  )
          {
            $("#"+elementsToAddDepts[x]).html('');
            $("#"+elementsToAddDepts[x]).append('<option selected disabled>Choose one</option>');

            append_departments(data,elementsToAddDepts[x]);
          }
      });
}

/*
*Function to append departments to an element
*/
function append_departments(departments,element)
{
  var responseObj = JSON.stringify(departments);
  var response = JSON.parse(responseObj);

  for( var i=0; i < response.length; i++ )
  {
    $("#"+element).append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
  }
}

/*
*Function to open url
*/
function open_url(url)
{
  window.open(url,'_self');
}
