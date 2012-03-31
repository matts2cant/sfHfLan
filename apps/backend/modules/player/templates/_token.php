<div class="sf_admin_form_row sf_admin_enum sf_admin_form_field_pc_type">
  <div>
    <label for="player_pc_type">Token</label>
    <div class="content">
      <?php echo $form->getObject()->getToken(); ?>
    </div>
  </div>
</div>
<div class="sf_admin_form_row sf_admin_enum sf_admin_form_field_pc_type">
  <div>
    <label for="player_pc_type">Edit URL</label>
    <div class="content">
      <a href="http://www.hf-lan.fr/inscriptions/edit/<?php echo $form->getObject()->getToken(); ?>">
        http://www.hf-lan.fr/inscriptions/edit/<?php echo $form->getObject()->getToken(); ?>
      </a>
    </div>
  </div>
</div>
<div class="sf_admin_form_row sf_admin_enum sf_admin_form_field_pc_type">
  <div>
    <label for="player_pc_type">Cancel URL</label>
    <div class="content">
      <a href="http://www.hf-lan.fr/inscriptions/cancel/<?php echo $form->getObject()->getToken(); ?>">
        http://www.hf-lan.fr/inscriptions/cancel/<?php echo $form->getObject()->getToken(); ?>
      </a>
    </div>
  </div>
</div>