[?php use_helper('I18N'); ?]

<?php if ($actions = $this->configuration->getValue('list.actions')): ?>
  <div class="fRight">
  <?php foreach ($actions as $name => $params): ?>
    <?php if ('_new' == $name): ?>
      <?php echo $this->addCredentialCondition('[?php echo $helper->linkToNew('.$this->asPhp($params).') ?]', $params)."\n" ?>
    <?php else: ?>

      <?php
        $params['params'] = is_array($params['params']) ? array_merge($params['params'], array('class' => 'btn')) : array('class' => 'btn');
        if(sfTwitterBootstrap::getProperty('use_icons_in_button', false))
        {
          $params['label'] = isset($params['icon']) ? '<i class="'.$params['icon'].'"></i> ' . $params['label'] : $params['label'];
        }
        echo $this->addCredentialCondition($this->getLinkToAction($name, $params, false), $params)."\n"
      ?>

    <?php endif; ?>
  <?php endforeach; ?>
  </div>
<?php endif; ?>

<?php if ($this->configuration->hasFilterForm()
      // don't display "more filters" if we have the same filter.display and list.display
       && ! (
          0 == count(array_diff($this->configuration->getFilterDisplay(), $this->configuration->getListDisplay()))
          && 0 == count(array_diff($this->configuration->getListDisplay(), $this->configuration->getFilterDisplay()))
        )
      ): ?>
  <div id="modal-more-filters" class="modal hide fade modal-filters">

    [?php if ($filters->hasGlobalErrors()): ?]
      [?php echo $filters->renderGlobalErrors() ?]
    [?php endif; ?]

    <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" method="post">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3>[?php echo __('More filters') ?]</h3>
      </div>
      <div class="modal-body">
        <table class="table" cellspacing="0">
          <tbody>
            [?php foreach ($configuration->getFormFilterFields($filters) as $name => $field): ?]
            [?php if ((isset($filters[$name]) && $filters[$name]->isHidden()) || (!isset($filters[$name]) && $field->isReal())) continue ?]
              [?php $modalId = $filters[$name]->getWidget()->generateId('filters_field_modal_' . $name); ?]
              [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field_modal', array(
                'name'       => $name,
                'attributes' => $field->getConfig('attributes', array(
                  'class' => sfTwitterBootstrap::guessLengthFromType($field->getType()),
                  'id'    => $modalId
                )),
                'label'      => $field->getConfig('label'),
                'help'       => $field->getConfig('help'),
                'form'       => $filters,
                'field'      => $field,
              )) ?]
            [?php endforeach; ?]
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        [?php echo $filters->renderHiddenFields() ?]
        <a id="close-modal-filters" href="#" class="btn btn-info">[?php echo __('Close window') ?]</a>
        [?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('class' => 'btn', 'query_string' => '_reset', 'method' => 'post')) ?]
        <input type="submit" class="btn btn-primary" value="[?php echo __('Filter', array(), 'sf_admin') ?]" />
      </div>
    </form>
  </div>

  [?php
    $icon = '';
    if(sfTwitterBootstrap::getProperty('use_icons_in_button', false))
    {
      $icon = '<i class="icon-plus-sign icon-white"></i> ';
    }
  ?]

  <div class="fRight" style="margin-right: 4px">
    <a id="more-filters" href="#more-filters" class="btn btn-info">[?php echo $icon . __('More filters') ?]</a>
  </div>
<?php endif; ?>
