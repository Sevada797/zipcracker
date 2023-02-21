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
return implode("", array_reverse($arr));
}

$chars=getenv('chars');
$length=getenv('len');
$file=getenv('fname');
//echo "chars is " . $chars;
//echo "length is " . $length;
$longtxt="000000000000000000000000000000";
$zeros=$longtxt;
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

$mynum=substr($zeros, 0, $y-strlen(algo0($i, $x))) . algo0($i, $x);
$mynum=str_split($mynum);
$d=0;
foreach ($mynum as $l) {
$text[$d%$y]=$chars[intval($l)];
if (($d%$y)==($y-1)) {
write();
}
$d++;
}

}
//9=chars length=$x
//3txt length
/*for(i in range(9**3)):

If (i<(3+1)) {
txt[i%3]=chars[0];
}
else {
mynum=substr(zeros, 0, 3-string((i-3)/3).length)+string((i-3)/3)
mynum=explode("", mynum)
txt[i%3]= chars[mynum[i%3]]
*/

//y=textlen=3
//x=chars=2, d1=0,d2=3, d3=6
//           i1=0 i2=1 i2=2

?>
