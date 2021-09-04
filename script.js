
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
