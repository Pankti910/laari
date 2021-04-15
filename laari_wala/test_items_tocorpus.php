<?php

$con=mysqli_connect("localhost","root","","project");
if($con){
    //$qry="insert into items values(105,'Bhel','$s_arr',30)";
    //$qr1="delete from items where i_name='Bhel'";
    
    //laari_name
    $sel_qry="select laari_name from items";
    $iname_res=mysqli_query($con,$sel_qry);
    $i=0;
    while($iname_temp=mysqli_fetch_array($iname_res)){
        $iname_corups[$i]=$iname_temp[0];
        $i=$i+1;
    }
    //laari_name

    //items
    $sel_qry="select items from items";
    $tags_res=mysqli_query($con,$sel_qry);
    $i=0;
    while($temp=mysqli_fetch_object($tags_res)){
        $tag_corpus[$i]=unserialize($temp->items);
        $i=$i+1;
    }
    //items
     
    //LAARINAMES TO MAIN CORPUS
    $i=0;
     while($i!=count($iname_corups)){
         if($i==0){
             $corpus[$i]=strtolower($iname_corups[$i]);
             $i=$i+1;
         }
         else{
             //checking the main corpus
             $j=0;
             $f=0;
             while($j!=count($corpus)){
                 if($iname_corups[$i]==$corpus[$j]){
                  $f==1;   
                 }
                 $j=$j+1;
             }
             //checking the main corpus

             //inserting inside the corpus
             if($f==1){
                 $i=$i+1;
             }
             else{
                 $corpus[$i]=strtolower($iname_corups[$i]);
                 $i=$i+1;
             }
             //inserting inside the corpus
         }
     }
    //LAARINAME CORPUS TO TEST_CORPUS


    //TAG_CORPUS TO TEST_CORPUS
    $i=0;
     while($i!=count($tag_corpus)){
         $j=0;
         //Accessing each element
         while($j!=count($tag_corpus[$i])){
            $k=0;
            $f=0;
            //checking the corpus
            while($k!=count($corpus)){
                if($tag_corpus[$i][$j]==$corpus[$k]){
                    $f=1;
                }
                $k=$k+1;
            }
            //checking the corpus

            //inserting
            if($f==1){
                $j=$j+1;
            }
            else{
                $index=count($corpus);
                $corpus[$index]=strtolower($tag_corpus[$i][$j]);
                $j=$j+1;
            }
         }
         //Accessing each element
         $i=$i+1;
     }
    //TAG_CORPUS TO  TEST_CORPUS
     
     //$corpus is for database tokens 
     //$defile is for file tokens(already present inside file)

    //writing inside file
    $de_data=file_get_contents("Test_corpus.json");
    $de_file=(array)json_decode($de_data,true);
    if(count($de_file)==0){
        echo "Entered if";
        $en_file=json_encode($corpus);
        file_put_contents("Test_corpus.json",$en_file);
    }
    else{
        echo "entered else";
        //checking repetida words
        $i=0;
        while($i!=count($corpus)){
                $j=0;
                $f=0;
                while($j!=count($de_file)){
                    if($corpus[$i]==$de_file[$j]){
                        $f=1;
                    }
                    $j=$j+1;
                }
                //flag y insert
                if($f==1){
                    $i=$i+1;   
                }
                else{
                  $de_file[]=strtolower($corpus[$i]);
                  $i=$i+1;
                }
                //flag y insert
        }
        $en_file=json_encode($de_file);
        file_put_contents("Test_corpus.json",$en_file);
        //checking repetida words
    }
    //writing inside a file
}
else{
    echo "not connected";
}

?>