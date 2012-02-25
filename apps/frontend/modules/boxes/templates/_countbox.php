<?php use_stylesheet('sidebox.css'); ?>
<?php use_stylesheet('countbox.css'); ?>
<?php use_javascript('jquery.countdown.js'); ?>

<div id="countbox" class="sidebox">
  <h2>Prochaine LAN</h2>
  <?php if($event): ?>
    <div id="defaultCountdown"></div>
  <?php else: ?>
    <div>La date de la prochaine hf.lan n'est pas encore fixée.</div>
  <?php endif; ?>
  <div class="clear"></div>
</div>
<?php if($event):?>
<script type="text/javascript">
  <?php
    $time = strtotime($event->getStartsAt());
    $Y = intval(strftime("%Y", $time));
    $M = intval(strftime("%m", $time))-1;
    $D = intval(strftime("%d", $time));
    $h = intval(strftime("%H", $time));
    $m = intval(strftime("%M", $time));
    $s = intval(strftime("%S", $time));

    $str = "$Y, $M, $D, $h, $m, $s, 00";
  ?>
  console.log("<?php echo $str;?>");
  console.log(new Date(<?php echo $str;?>));
  var target = new Date(<?php echo $str;?>);
  $('#defaultCountdown').countdown({until: target});
</script>
<?php endif;?>