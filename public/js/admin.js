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
