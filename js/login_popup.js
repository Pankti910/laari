var clicked=false;
     function validate() {
  var inputsWithValues = 0;
  
  var myInputs = $(".loginchk");

  myInputs.each(function(e) {
    if ($(this).val()) {
      inputsWithValues += 1;
    }
  });
  
  if (inputsWithValues == myInputs.length) {
    $("#loginbtn").attr("disabled", false).css('opacity',1);
  } else {
    $("#loginbtn").attr("disabled", true).css('opacity',0.5);
  }
}




function login_google_set()
{
    clicked=true;
}

function onSignIn(googleUser)
{
 
  if(clicked)
  {

  var profile = googleUser.getBasicProfile();
  var firstname=profile.getGivenName();
  var lastname=profile.getFamilyName();
  var email=profile.getEmail();
   $.ajax({
    url:'google_login.php',
    method:'GET',
    data:{"fname":firstname,"lname":lastname,"email":email},
         success:function(response)
         {
            if(response==0)
            {
                 document.querySelector("#loginpopup").style.display="flex";
                 document.querySelector(".error").innerHTML="Something went wrong";
                $(".error").style.visibility = 'visible';

            }   
            else
            {
               location.reload(true);
                 document.querySelector("#loginpopup").style.display="none";
              
            }
    }
  
   });
 }
}
   function loginpop()
    {
    
        document.querySelector("#loginpopup").style.display="flex";
      }



$(document).ready(function(){

      document.querySelector("#closelogin").addEventListener("click",function(){

    document.querySelector("#loginpopup").style.display="none";
         })

 validate();

    
});



    function login_btn()
    {

         var xmlhttp=new XMLHttpRequest();
    var username=document.getElementById("username").value;
    var pwd=document.getElementById("pwd").value;
    if(username!='' && pwd!='')
    {
      xmlhttp.onreadystatechange=function()
      {
        if(xmlhttp.readyState==4)
          {
              var response=xmlhttp.responseText;
              if(response==0)
              {
                 document.querySelector("#loginpopup").style.display="flex";
                document.querySelector(".error").innerHTML="Check username and password";
                $(".error").style.visibility = 'visible';

              }
              else
              {
                   //window.location.href="que_ans.php?unique_number="+;
                location.reload(true);
                 document.getElementById("username").innerHTML='';
                  document.getElementById("pwd").innerHTML='';
                    document.querySelector("#loginpopup").style.display="none";
                   $(".error").style.visibility = 'hidden';

                  
              }
           }
      };
     
      xmlhttp.open("GET","simple_login.php?username="+username+"&pwd="+pwd,false);
      xmlhttp.send();
    }
    }