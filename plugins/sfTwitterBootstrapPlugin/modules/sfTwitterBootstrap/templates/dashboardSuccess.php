<?php
  use_helper('I18N');
  /** @var Array of menu items */ $items = $sf_data->getRaw('items');
  /** @var Array of categories, each containing an array of menu items and settings */ $categories = $sf_data->getRaw('categories');
?>
<h2 class="mbl">Dashboard</h2>
<?php include_partial('flashes'); ?>
<?php if (count($items)): ?>
  <?php include_partial('dash_list', array('items' => $items)); ?>
<?php endif; ?>

<?php if (count($categories)): ?>
  <?php foreach ($categories as $name => $category): ?>
    <?php if (sfTwitterBootstrap::hasPermission($category, $sf_user)): ?>
    <div class="mod dash">
        <div class="inner">
          <div class="hd">
              <h3 class="plm"><?php echo __(isset($category['name']) ? $category['name'] : $name); ?></h3>
         </div>
         <?php include_partial('dash_list', array('items' => $category['items'])); ?>
       </div>
    </div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php elseif (!count($items)): ?>
  <?php echo __('sfTwitterBootstrap is not configured.'); ?>
<?php endif; ?>
