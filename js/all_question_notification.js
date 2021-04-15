
$(document).ready(function(){
load();

});



function load()
{
	setInterval('notification_count()',1000);
}
function notification_count()
{
    var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    // document.getElementById("demo").innerHTML = this.responseText;
    $(".badge-dark").text(this.responseText);
    }
  };
  xmlhttp.open("GET", "seprate_notification.php.php",false);
  xmlhttp.send();
  xmlhttp.abort();

}



