#!/usr/bin/php
<?php
do {                            // skip HEADER
  $line = fgets(STDIN);
  echo $line;
} while (strpos($line,"END OF HEADER")>0);
while ( ! feof(STDIN) ) {
  $line = fgets(STDIN);
  if(substr($line,0,1)=="G") {
        $line=substr($line,1);
        $line=trim($line);
        $t=preg_split("/[\s]+/",$line);
        $tmp=$t[0];
        $tmp=str_pad($tmp,2,' ',STR_PAD_LEFT);
        $msg=$tmp." ".substr($t[1],2);
        for($i=2;$i<6;$i++){
                $tmp=$t[$i];
                $tmp=str_pad($tmp,3,' ',STR_PAD_LEFT);
                $msg.=$tmp;
        }
        $tmp=$t[6];
        $tmp=str_pad($tmp,3,' ',STR_PAD_LEFT).".0";
        $msg.=$tmp;
        for($i=7;$i<sizeof($t);$i++){
                $tmp=substr($t[$i],0,1);
                if($tmp == "-"){
                        $msg.=$t[$i];
                } else {
                        $msg.=" ".$t[$i];
                }
        }
        $tow=1;
//      echo "$msg\n";
  } else {
        $tow=0;
        $line=substr($line,1);
        $t=preg_split("/[\s]+/",$line);
        $msg="";
        for($i=0;$i<sizeof($t);$i++){
                $tmp=substr($t[$i],0,1);
                if($tmp == "-"){
                        $msg.=$t[$i];
                } else {
                        $msg.=" ".$t[$i];
                }
        }
  }
        $msg=str_replace("E","D",$msg);
        $msg=str_replace(" ."," 0.",$msg);
        $msg=str_replace("-.","-0.",$msg);
        if($tow==0) $msg="  ".$msg;
        echo $msg."\n";
}
?>
