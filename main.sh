function crack()
{
fn=$(ls -1 | wc -l)
echo "Wordlist: "$1
echo "Filename: "$fname
echo "-----------------------------"
while read p; do
echo "Trying password: "$p
unzip -P $p $fname
if (($(ls -1 | wc -l)>fn))
then
echo "Password found: "$p
break
fi
done <$1
}

clear
echo Started Zip-cracker
read -p "Enter filename to crack(Ex. some.zip): " fname
read -p "Enter wordlist directory (type '!gen' to generate one): " wlist


if (($wlist=="!gen"))
then
read -p "Enter how many letters 'word' should be: " len
read -p "Enter characters(Ex. 4,a,b,@): " chars
echo Generating wordlist...
export chars=$chars
export fname=$fname
export len=$len
php passgen.php
echo "Wordlist generated (saved as wlist)"
read -p "To crack with this wordlist type 1 anything else will exit: " inp1
if (($inp1==1))
then
crack "wlist"
else
exit
fi
else
clear
crack $wlist
fi
