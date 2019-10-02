<?php
?>
  <div class="panel panel-default">
  <!-- Standard-Panel-Inhalt -->
  <div class="panel-heading-custom2 panel-heading"><b>Podłączeni do YSF Reflector</b></div>
  <!-- Tabelle -->
  <div class="table-responsive"> 
  <table id="gateways" class="table table-condensed table-striped">
  	<thead>
    <tr>
      <th>Czas (<?php echo TIMEZONE;?>)</th>
      <th>Znak</th>
    </tr>
    </thead>
    <tbody>
<?php
	//$gateways = getConnectedGateways($logLines);
	$gateways = getLinkedGateways($logLines);
	foreach ($gateways as $gateway) {
		
		echo "<tr>";
		echo "<td>".convertTimezone($gateway['timestamp'])."</td>";
		
		if (defined("GDPR"))
			echo"<td nowrap><font color=bule>".str_replace("0","&Oslash;",substr($gateway['callsign'],0,3)."***")."</font></td>";
		else
			echo"<td nowrap><b><font color=blue>".str_replace("0","&Oslash;",$gateway['callsign'])."</font></b></td>";
		echo "</tr>";
	}
?>
  </tbody>
  </table>
  </div>
  <script>
    $(document).ready(function(){
      $('#gateways').dataTable( {
        "aaSorting": [[1,'asc']]
      } );
    });
   </script>
</div>
