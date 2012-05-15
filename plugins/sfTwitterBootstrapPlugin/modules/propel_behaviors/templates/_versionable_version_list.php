<?php
  use_helper('I18N');
  $object   = $form->getObject();
  $is_first = true;
?>

<section id="versions">
  <h3><?php echo __('History') ?></h3>
  <dl class="versions">
  <?php foreach($object->getLastVersions(10) as $version): ?>
    <dt class="item-record version-title<?php echo !$is_first ? ' other' : ' first' ?>">
      <?php echo $version->getVersion(); ?>
      -
    <?php if(strlen($version->getVersionComment())): ?>
      <strong><?php echo $version->getVersionComment() ?><strong>
    <?php else: ?>
      <em><small><?php echo __('No version comment') ?></small></em>
    <?php endif; ?>
    </dt>
    <?php $is_first = false; ?>
    <dd class="item-information">
        <?php echo __('%time_ago% ago', array("%time_ago%" => time_ago_in_words($version->getVersionCreatedAt('U'))));?>
    </dd>
    <?php if($version->getVersion() > 1): ?>

      <?php $diff = $object->compareVersions($version->getVersion()-1, $version->getVersion());
        foreach($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
        <?php foreach($fields as $name => $field): ?>
          <?php if (isset($diff[sfInflector::camelize($name)])) : ?>
            <dd class="version-field"><?php echo __('Field <strong>%fieldlabel%</strong> changed', array('%fieldlabel%' => __($field->getConfig('label')))); ?></dd>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>

    <?php endif; ?>
  <?php endforeach; ?>
  </dl>
</section>
