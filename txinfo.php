<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include "config/config.php";
include "include/tools.php";
include "include/functions.php";
$configs = getYSFReflectorConfig();
$logLines = getShortYSFReflectorLog();
$reverseLogLines = $logLines;
array_multisort($reverseLogLines,SORT_DESC);
$lastHeard = getLastHeard($reverseLogLines, True);
$listElem = $lastHeard[0];
if (strlen($listElem[1]) !== 0) {
	echo "<tr>";
	echo"<td nowrap>$listElem[0]</td>";
	if (defined("SHOWQRZ") && $listElem[1] !== "??????????" && !is_numeric($listElem[1])) {
		echo"<td nowrap><b><font color=green><a target=\"_new\" href=\"https://qrz.com/db/$listElem[1]\">".str_replace("0","&Oslash;",$listElem[1])."</a></font><b></td>";
	} else {
		if (defined("GDPR"))
			echo"<td nowrap>".str_replace("0","&Oslash;",substr($listElem[1],0,3)."***")."</td>";
		else
			echo"<td nowrap><b><font color=blue>>".str_replace("0","&Oslash;",$listElem[1])."</font></b></td>";
	}
	echo"<td nowrap>$listElem[2]</td>";
	if (defined("GDPR"))
		echo"<td nowrap>".str_replace("0","&Oslash;",substr($listElem[3],0,3)."***")."</td>";
	else
		echo"<td nowrap><b><font color=green>".str_replace("0","&Oslash;",$listElem[3])."</font></b></td>";
	$UTC = new DateTimeZone("UTC");
	$d1 = new DateTime($listElem[0], new DateTimeZone(TIMEZONE));
	$d2 = new DateTime('now', new DateTimeZone(TIMEZONE));
	$diff = $d2->getTimestamp() - $d1->getTimestamp();
	echo"<td nowrap><b><font color=red>$diff s</font></b></td>";
	echo "</tr>";
} else {
	echo"<tr><td colspan=\"5\"></tr>";
}
?>
