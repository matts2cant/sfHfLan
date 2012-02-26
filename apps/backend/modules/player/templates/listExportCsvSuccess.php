<?php
$outstream = fopen($outstream, 'w');

$vars = array(
  'options'   => $options,
  'delimiter' => $delimiter,
  'enclosure' => $enclosure,
  'outstream' => $outstream,
  'charset'   => $charset,
  'lines'     => $lines);

// header
if ( count($lines) > 0 )
  include_partial('player/csv_headers',$vars);

// content
foreach ( $lines as $line )
{
  unset($line['id']);
  include_partial('player/csv_line',array_merge(array('line' => $line),$vars));
}

fclose($outstream);