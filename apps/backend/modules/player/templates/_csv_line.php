<?php
if ( $options['ms'] )
foreach ( $line as $key => $value )
  $line[$key] = @iconv($charset['db'], $charset['ms'], $value);

fputcsv($outstream, $line, $delimiter, $enclosure);
ob_flush();