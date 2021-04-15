
	var rateIndex=-1;
	var uID=0;
	$(document).ready(function(){
		resetStar();
   
    if(localStorage.getItem("rateIndex")!=null)
    {
    	setStar(localStorage.getItem('rateIndex'));
    	uID=localStorage.getItem("uID");
    }

   $(".fa-star").on("click",function(){
   rateIndex=parseInt($(this).data('index'));
   localStorage.setItem('rateIndex',rateIndex);
   saveToDB();
   });
	$(".fa-star").mouseover(function(){
        resetStar();
        var currentIndex=parseInt($(this).data('index'));
     
        setStar(currentIndex);
       });
       
       $('.fa-star').mouseleave(function(){
         if(rateIndex!=-1)
         {
            setStar(rateIndex);
          }
       });
	});

  function setStar(max)
  {

         	for(var i=0;i<=max;i++)
         	{
               
        	$('.fa-star:eq('+i+')').css("color",'yellow');
         	}
  }
	function resetStar()
	{
		$(".fa-star").css("color",'gray');
	}

	function saveToDB()
	{
	   $.ajax({
			url:'test.php',
			method:'GET',
			dataType:'json',
			data:{"save":'1',"uID":uID,"rateIndex":rateIndex},
				success:function(response)
				{
					//alert(response);
					uID=response.uid;
					localStorage.setItem('uID',uID);
				}

		});
	}
