<?php    /**
 * Returns every date between two dates as an array
 * @param string $startDate the start of the date range
 * @param string $endDate the end of the date range
 * @param string $format DateTime format, default is Y-m-d
 * @return array returns every date between $startDate and $endDate, formatted as "Y-m-d"
 */

   // Puts all dates between start and enddate in an array...
function dateRange( $first, $last, $step = '+1 day', $format = 'Y/m/d' ) {
	$dates = array();
	$current = strtotime( $first );
	$last = strtotime( $last );
	while( $current <= $last ) {
		$dates[] = date( $format, $current );
		$current = strtotime( $step, $current );
	}
	return $dates;
}   

// Jämför listan över alla cyklar med listan över ej tillgängliga cyklar (och listar alla tillgängliga cyklar i $avail_bikes)
        function getavail($a,$b) {
            if ($a===$b) {
                return 0;
            }
            return ($a>$b)?1:-1;
        }
        

        
        
        
?>