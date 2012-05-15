[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

<div id="sf_admin_container">

  <h2 class="mbl">
    [?php echo <?php echo $this->getI18NString('show.title') ?> ?]

    [?php if(true == sfTwitterBootstrap::getProperty('top_link_to_fieldset')): ?]
      [?php foreach ($configuration->getFormFields($form, 'show') as $fieldset => $fields): ?]
        [?php if ('NONE' != $fieldset): ?]
          [?php $fieldset_name = __($fieldset, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]
            <small>- <a class="link-to-fieldset" href="#[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]">[?php echo $fieldset_name ?]</a></small>
        [?php endif; ?]
      [?php endforeach; ?]
    [?php endif; ?]
  </h2>

  <div id="sf_admin_content">
    [?php include_partial('show', array('form' => $form, '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'configuration' => $configuration, 'helper' => $helper)) ?]
  </div>

</div>
