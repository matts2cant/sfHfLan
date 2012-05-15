[?php include_stylesheets_for_form($form) ?]
[?php include_javascripts_for_form($form) ?]

<div class="sf_admin_show form-horizontal">

  <?php if($this->configuration->hasShowPartial()) : ?>
    <div class="sf_admin_right_column">
    <?php foreach($this->configuration->getShowPartial() as $partial): ?>
      [?php include_partial('<?php echo $partial ?>', array('form' => $form, '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper, 'configuration' => $configuration)) ?]
    <?php endforeach; ?>
    </div>
    <div class="sf_admin_with_right_column">
  <?php endif; ?>

  [?php foreach ($configuration->getFormFields($form, 'show') as $fieldset => $fields): ?]

    [?php if (true == sfTwitterBootstrap::getProperty('top_link_to_fieldset') && 'NONE' != $fieldset): ?]
      <a name="[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]"></a>
    [?php endif; ?]

    <fieldset id="sf_fieldset_[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]" [?php if ('NONE' == $fieldset): ?]class="no-legend"[?php endif; ?]>
      [?php if ('NONE' != $fieldset): ?]
        <legend>[?php echo __($fieldset, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</legend>
      [?php endif; ?]

      [?php include_partial('<?php echo $this->getModuleName() ?>/show_fieldset', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]

    </fieldset>
  [?php endforeach; ?]

  [?php include_partial('show_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'configuration' => $configuration, 'helper' => $helper)) ?]

  <?php if($this->configuration->hasShowPartial()) : ?>
    </div>
  <?php endif; ?>
</div>
