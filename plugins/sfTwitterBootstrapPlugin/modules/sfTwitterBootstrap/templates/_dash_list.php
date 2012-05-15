<?php
  use_helper('I18N');
  /** @var Array of menu items */ $items = $sf_data->getRaw('items');
?>

<div class="bd">
  <ul class="dash-icon-list">
    <?php foreach ($items as $key => $item): ?>
      <?php if (sfTwitterBootstrap::hasPermission($item, $sf_user)):?>
        <li>
          <div class="icon">
            <a href="<?php echo url_for($item['url']) ?>" title="<?php echo __($item['name']); ?>">
              <?php echo image_tag($item['image'], array('alt' => __($item['name']))); ?>
              <h5><?php echo __($item['name']); ?></h5>
            </a>
          </div>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</div>
