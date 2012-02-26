<?php
$line = array_keys($lines[0]);
if ( $options['ms'] )
foreach ( $line as $key => $value )
$line[$key] = @iconv($charset['db'], $charset['ms'], $value);

fputcsv($outstream, $line, $delimiter, $enclosure);
ob_flush();