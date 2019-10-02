<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
// do not touch this includes!!! Never ever!!!
include "config/config.php";
include "include/tools.php";
include "include/functions.php";
include "include/init.php";
include "version.php";
?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">
    -->
    <meta name="viewport" content="width=device-width, initial-scale=0.6,maximum-scale=1, user-scalable=yes">
    <meta http-equiv="refresh" content="<?php echo REFRESHAFTER?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <!-- Das neueste kompilierte und minimierte CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optionales Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <!-- Das neueste kompilierte und minimierte JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Datatables -->
 	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  	<style>
 	    h4 {
 		display: inline
 		}	
            body{
                padding: 10px;
                }
 	</style>
    <title><?php echo getConfigItem("Info", "Name", $configs); ?> - YSFReflector-Dashboard</title>
<style>
.panel-default>.panel-heading-custom {
  font: 12pt arial, sans-serif; 
   background:#f0f4c3;
    color: black;
    border-color: #ddd;
    margin-bottom: 5px;
 }
.panel-default>.panel-heading-custom2 {
  font: 12pt arial, sans-serif; 
   background:#99a62b;
    color: black;
    border-color: #ddd;
    margin-bottom: 5px;
 }
.panel-default>.panel-heading-custom3 {
  font: 12pt arial, sans-serif; 
   background:#9dc209;
    color: black;
    border-color: #ddd;
 }
</style>
  </head>
  <body style="font: 10pt arial, sans-serif;">
<center> 
  <h3><p>.:&nbsp;&nbsp;<font color=brown><b><?php echo getConfigItem("Info", "Name", $configs); ?></b></font> YSF Reflector&nbsp;&nbsp;:.</p></h3>
</center>
<center>
<fieldset style="box-shadow:0 10px 10px #999;padding: 10px !important;margin: 15px !important;border:0.5px solid gray !important;background-color:#e0e0e0e0;width:1050px;text-align:left;margin-left:15px;margin-right:15px;margin-top:10px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<?php
checkSetup();
// Here you can feel free to disable info-sections by commenting out with // before include
include "include/txinfo.php";
//include "include/sysinfo.php";
//include "include/disk.php";
include "include/gateways.php";
include "include/lh.php";
include "include/allheard.php";
if (defined("SHOWOLDMHEARD")) {
   include "include/oldheard.php";
}
?>
	<div class="panel panel-info">
<?php
$lastReload = new DateTime();
$lastReload->setTimezone(new DateTimeZone(TIMEZONE));
echo "<center>YSFReflector-Dashboard V ".VERSION." - Modified by SP2ONG | Last Reload ".$lastReload->format('Y-m-d, H:i:s')." (".TIMEZONE.")";
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo '<!--Page generated in '.$total_time.' seconds.-->';	
?> <br>Get your own at: <a href="https://github.com/dg9vh/YSFReflector-Dashboard">https://github.com/dg9vh/YSFReflector-Dashboard</a></center>
	</div>
  </body>
</html>
