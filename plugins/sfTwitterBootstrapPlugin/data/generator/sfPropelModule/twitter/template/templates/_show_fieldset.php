<?php $catalogue = $this->getI18nCatalogue() ?>
<?php foreach ($this->configuration->getValue('show.display') as $name => $field): ?>
<?php echo $this->addCredentialCondition(sprintf(<<<EOF

<div class="control-group sf_admin_row">
  <label class="control-label">[?php echo __('%s', array(),'%s') ?]</label>
  <div class="controls">
    <div class="input-plain">[?php echo %s ?]</div>
  </div>
</div>

EOF
, $field->getConfig('label', '', true),
  $catalogue,
  $this->renderField($field)
), $field->getConfig()) ?>
<?php endforeach ?>
