<?php use_stylesheet('sidebox.css'); ?>
<?php use_javascript('jquery.countdown.js'); ?>

<div id="countbox" class="sidebox">
  <h2>Prochaine LAN</h2>
  <div id="defaultCountdown"></div>
</div>
<?php if($event):?>
<script type="text/javascript">
  target = new Date('<?php echo $event->getStartsAt(); ?>');
  console.log(target);
  $('#defaultCountdown').countdown({until: target});
</script>
<?php endif;?>