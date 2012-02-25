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
  target = new Date('<?php echo $event->getStartsAt(); ?>');
  console.log(target);
  $('#defaultCountdown').countdown({until: target});
</script>
<?php endif;?>