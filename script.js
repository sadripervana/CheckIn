
function ajax(){
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status ==200)
    {
      
      alert(this.responseText);
    }
  };
  ajax.open("POST","text.txt", true);
  ajax.send();
}

function change(){
  setTimeout(function(){
    location.reload(); }, 10); 
  var form = $('#ajaxform');
  var mydata = $("#ajaxform").serialize();
  console.dir($("#ajaxform").serialize());
  $.ajax({
    type: form.attr('method'),
    url: form.attr('action'),
    dataType: "json",
    data: mydata,
  });
}


