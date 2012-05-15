
[?php if (true == sfTwitterBootstrap::getProperty('top_link_to_fieldset') && 'NONE' != $fieldset): ?]
  <a name="[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]"></a>
[?php endif; ?]

<fieldset id="sf_fieldset_[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]" [?php if ('NONE' == $fieldset): ?]class="no-legend"[?php endif; ?]>
  [?php if ('NONE' != $fieldset): ?]
    <legend>[?php echo __($fieldset, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</legend>
  [?php endif; ?]

  [?php foreach ($fields as $name => $field): ?]
    [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
    [?php include_partial('<?php echo $this->getModuleName() ?>/form_field', array(
      'name'       => $name,
      'attributes' => $field->getConfig(
        'attributes',
        array('class' => sfTwitterBootstrap::guessLengthFromType($field->getType()))
      ),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
    )) ?]
  [?php endforeach; ?]
</fieldset>
