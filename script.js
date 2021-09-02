function hide()
{
  var myobj = document.getElementById(this);
  myobj.remove();
}

var call = function(elementId)
{
 var valueOfInput = document.getElementById(elementId);
  valueOfInput.remove();
    alert(valueOfInput);
}
