<?php
//basex function
function algo0($k, $x) {
$arr=[];
while (true)
{
array_push($arr, $k%$x);
$k=($k-($k%$x))/$x;
if ($k==0) {
break;
}
}
return array_reverse($arr);
}

$chars=getenv('chars');
$length=getenv('len');
$file=getenv('fname');
$longtxt="000000000000000000000000000000";
//$zeros=$longtxt;
$zeros=str_split($longtxt);
$text=substr($longtxt, 0, $length);
$chars=explode(',',$chars);
$text=str_split($text);
$text=str_replace("0", $chars[0], $text);
$x=count($chars);
$y=count($text);
$mynum;
function write() {
$f=fopen('wlist','a');
fwrite($f, strval(implode('', $GLOBALS['text'])) . "\n");
fclose($f);
}

for($i=0;$i<$x**$y;$i++) {

$mynum=array_merge( array_slice($zeros, 0, $y-count(algo0($i, $x))) , algo0($i, $x) );
//$mynum=str_split($mynum);
$d=0;
foreach ($mynum as $l) {
$text[$d%$y]=$chars[intval($l)];
if (($d%$y)==($y-1)) {
write();
}
$d++;
}

}

?>
