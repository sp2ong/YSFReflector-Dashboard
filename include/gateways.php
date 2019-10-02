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
        language: {
    "sProcessing":   "Przetwarzanie...",
    "sLengthMenu":   "&nbsp;&nbsp;Pokaż _MENU_ pozycji",
    "sZeroRecords":  "Nie znaleziono pasujących pozycji",
    "sInfoThousands":  " ",
    "sInfo":         "&nbsp;&nbsp;Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "sInfoEmpty":    "&nbsp;&nbsp;Pozycji 0 z 0 dostępnych",
    "sInfoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
    "sInfoPostFix":  "",
    "sSearch":       "Szukaj:",
    "sUrl":          "",
    "oPaginate": {
	"sFirst":    "Pierwsza",
	"sPrevious": "Poprzednia",
	"sNext":     "Następna",
	"sLast":     "Ostatnia"
	},
    "sEmptyTable":     "Brak danych",
    "sLoadingRecords": "Wczytywanie...",
    "oAria": {
	"sSortAscending":  ": aktywuj, by posortować kolumnę rosnąco",
	"sSortDescending": ": aktywuj, by posortować kolumnę malejąco"
	}
	    },
        "aaSorting": [[0,'desc']]
      } );
    });
   </script>
</div>
