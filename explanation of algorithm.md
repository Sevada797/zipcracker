Hi I wanted to explain here my algorithm, which took me a day or two to write (because I was having several ideas and didn't know what to choose, also most of the time was spent on debugging ) <br>here - the algorithm is basically this code


```
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

?>
```

Before I explain each step, I want you to imagine for a moment that you want to make<br>
a program which takes 2 inputs, 1st length, 2nd chars and makes all possible combinations with it<br>
<b>How will you do it? Consider that you can't guess the users input and it will always be random length and chars</b><br><br>
OK let me help you, for being able to imagine this, at first let's imagine a simpler task, can you write for me script that generates all 4 digit numbers?<br>
Easy right? 4 for loops and it's done look code below
```
<?php
for ($a=0;$a<10;$a++) {
for ($b=0;$b<10;$b++) {
for ($c=0;$c<10;$c++) {
for ($d=0;$d<10;$d++) {
echo $a.$b.$c.$d."\n";
}}}}
?>
```

But now if we want to generate same thing with random(user input=random) length and chars, we are getting problem here,
we don't know how many loops to set up, characters still wouldn't be a problem if we had the length, but sadly in our task it's random.

<b>My solution:</b> My solution for escaping this "unknown count of loops" problem, is to loop true all possible combinations number.
Let me explain, for ex. if we have
```
chars: a,b,c
length: 2
```
our combination of all chars would be chars**length (chars power up length)
and by looping true it now we need to generate each of the possible combinations with our each loop.
Yes we came to the hard part, how to generate each possible combination.

<b>I noticed parallels between binary and simple text here look</b>
```
COMBINATIONS FOR chars=a,b && length=3:
aaa, aab, aba, abb, baa, bab, bba, bbb
BINARY for numbers 1, 2, 3, 4 ... 8
000, 001, 010, 011, 100, 101, 110, 111
```
<b>Wait what? this is actually really cool!!</b><br>
Now let's use this to generate our algorithm...

I will continue this later, now sleep


