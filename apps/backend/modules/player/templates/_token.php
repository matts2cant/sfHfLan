<div class="control-group sf_admin_form_row sf_admin_text">
  <label class="control-label" for="token">Token</label>
  <div class="controls">
    <?php echo $form->getObject()->getToken(); ?>
  </div>
</div>
<div class="control-group sf_admin_form_row sf_admin_text">
  <label class="control-label" for="edit_url">Edit URL</label>
  <div class="controls">
    <a href="http://www.hf-lan.fr/inscriptions/edit/<?php echo $form->getObject()->getToken(); ?>">
      http://www.hf-lan.fr/inscriptions/edit/<?php echo $form->getObject()->getToken(); ?>
    </a>
  </div>
</div>
<div class="control-group sf_admin_form_row sf_admin_text">
  <label class="control-label" for="token">Cancel URL</label>
  <div class="controls">
    <a href="http://www.hf-lan.fr/inscriptions/cancel/<?php echo $form->getObject()->getToken(); ?>">
      http://www.hf-lan.fr/inscriptions/cancel/<?php echo $form->getObject()->getToken(); ?>
    </a>
  </div>
</div>