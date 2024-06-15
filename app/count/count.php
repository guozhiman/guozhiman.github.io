<?php require '../../global.php';?>
document.writeln("<?php
$item = $db->get_one("SELECT value FROM {$XQ_PRE}config WHERE name='webcount'");
$count=$item['value'];
$javastr='';
$leng=strlen($count);
for($i=1;$i<=8-$leng;$i++)
{
$javastr=$javastr."<img src='".XQ_PATH."app/count/".$XQ['count']."/0.gif' border=0 align='absmiddle' ></img>";
}
for($i=0;$i<$leng;$i++)
{
$javastr=$javastr."<img src='".XQ_PATH."app/count/".$XQ['count']."/".substr($count,$i,1).".gif' border=0 align='absmiddle'></img>";
}
echo $XQ['countl'].$javastr.$XQ['countr'];
//
$db->query("UPDATE LOW_PRIORITY {$XQ_PRE}config SET value=value+1 WHERE name='webcount'", 'UNBUFFERED');
//
?>");