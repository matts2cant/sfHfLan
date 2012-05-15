<div class="form-actions">
<?php foreach (array('new', 'edit') as $action): ?>
<?php if ('new' == $action): ?>
[?php if ($form->isNew()): ?]
<?php else: ?>
[?php else: ?]
<?php endif; ?>
<?php foreach ($this->configuration->getValue($action.'.actions') as $name => $params): ?>
<?php if ('_delete' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDeleteBtn($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_list' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToList('.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_save' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToSave($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_save_and_add' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToSaveAndAdd($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>

<?php else: ?>

[?php if (method_exists($helper, 'linkTo<?php echo $method = ucfirst(sfInflector::camelize($name)) ?>')): ?]
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkTo'.$method.'($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>

[?php else: ?]
  <?php
    $params['params'] = is_array($params['params']) ? array_merge($params['params'], array('class' => 'btn mlm')) : array('class' => 'btn mlm') ;
    if(sfTwitterBootstrap::getProperty('use_icons_in_button', false))
    {
      $params['label'] = isset($params['icon']) ? '<i class="'.$params['icon'].'"></i> ' . $params['label'] : $params['label'];
    }
    echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params)
  ?>

[?php endif; ?]

<?php endif; ?>
<?php endforeach; ?>
<?php endforeach; ?>
[?php endif; ?]
</div>
