<div class="form-actions">
<?php foreach ($this->configuration->getValue('show.actions') as $name => $params): ?>
<?php if ('_delete' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDeleteBtn($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_edit' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEditBtn($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_list' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToList('.$this->asPhp($params).') ?]', $params) ?>

<?php else: ?>

[?php if (method_exists($helper, 'linkTo<?php echo $method = ucfirst(sfInflector::camelize($name)) ?>')): ?]
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkTo'.$method.'($'.$this->getSingularName().'), '.$this->asPhp($params).') ?]', $params) ?>

[?php else: ?]
  <?php
    $params['params'] = is_array($params['params']) ? array_merge($params['params'], array('class' => 'btn mlm')) : array('class' => 'btn mlm') ;
    echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params)
  ?>

[?php endif; ?]

<?php endif; ?>
<?php endforeach; ?>
</div>
