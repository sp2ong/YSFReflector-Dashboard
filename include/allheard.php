<?php
?>
  <div class="panel panel-default">
  <!-- Standard-Panel-Inhalt -->
  <div class="panel-heading-custom2 panel-heading"><b>Dzisiaj aktywne stacje</b></div>
  <!-- Tabelle -->
  <div class="table-responsive">  
  <table id="allHeard" class="table table-condensed table-striped">
  <thead>
    <tr>
      <th>Czas (<?php echo TIMEZONE;?>)</th>
      <th>Znak</th>
      <th>Cel</th>
      <th>Bramka</th>
      <th>Czas nadawania (s)</th>
    </tr>
  </thead>
  <tbody>
<?php
for ($i = 0; $i < count($allHeard); $i++) {
		$listElem = $allHeard[$i];
		echo"<tr>";
		echo"<td>$listElem[0]</td>";
		
		if (defined("GDPR"))
			echo"<td nowrap>".str_replace("0","&Oslash;",substr($listElem[1],0,3)."***")."</td>";
		else
			echo"<td nowrap><b><font color=blue>".str_replace("0","&Oslash;",$listElem[1])."</font><b></td>";
		//echo"<td>$listElem[1]</td>";
		echo"<td>$listElem[2]</td>";
		if (defined("GDPR"))
			echo"<td nowrap>".str_replace("0","&Oslash;",substr($listElem[3],0,3)."***")."</td>";
		else
			echo"<td nowrap><b><font color=green>".str_replace("0","&Oslash;",$listElem[3])."</font></b></td>";
		echo"<td><b><font color=brown>$listElem[4]</font></b></td>";
		echo"</tr>\n";
	}

?>
  </tbody>
  </table>
  </div>
<script>
    $(document).ready(function(){
      $('#lh').dataTable( {
        language: {
    "sProcessing":   "Przetwarzanie...",
    "sLengthMenu":   "Pokaż _MENU_ pozycji",
    "sZeroRecords":  "Nie znaleziono pasujących pozycji",
    "sInfoThousands":  " ",
    "sInfo":         "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
    "sInfoEmpty":    "Pozycji 0 z 0 dostępnych",
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
