   
//que_ans.php


    function likebtn(val,userid,answer_uid,chnageid)
    {
      if(val.className=="fa fa-thumbs-o-up")
      {

                var action="like";
        var xmlhttp=new XMLHttpRequest();
                  //alert(chnageid);
                 xmlhttp.onreadystatechange=function()
                 {
                 if(xmlhttp.readyState==4)
                 {

               document.getElementById(chnageid).innerHTML=xmlhttp.responseText;
              }
              };
                xmlhttp.open("POST","action.php?action="+action+"&userid="+userid+"&answer_uid="+answer_uid,false);
                xmlhttp.send();
                val.className="fa fa-thumbs-up";
                val.classList.remove("fa fa-thumbs-o-up");

  
      }
      else if(val.className=="fa fa-thumbs-up")
      {


                var action="notlike";
        var xmlhttp=new XMLHttpRequest();
                 xmlhttp.onreadystatechange=function()
                 {
                 if(xmlhttp.readyState==4)
                 {

               document.getElementById(chnageid).innerHTML=xmlhttp.responseText;
              }
              };
                xmlhttp.open("POST","action.php?action="+action+"&userid="+userid+"&answer_uid="+answer_uid,false);
                xmlhttp.send();
                val.className="fa fa-thumbs-o-up";
                val.classList.remove("fa fa-thumbs-up");         
      }
   
    }


