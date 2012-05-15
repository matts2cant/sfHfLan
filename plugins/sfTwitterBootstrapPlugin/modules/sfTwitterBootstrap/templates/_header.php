<?php
use_helper('I18N');

/** @var Array of menu items */ $items = $sf_data->getRaw('items');
/** @var Array of categories, each containing an array of menu items and settings */ $categories = $sf_data->getRaw('categories');
/** @var string|null Link to the module (for breadcrumbs) */ $module_link = $sf_data->getRaw('module_link');
/** @var string|null Link to the action (for breadcrumbs) */ $action_link = $sf_data->getRaw('action_link');

?>
<div class="navbar navbar-fixed-top <?php echo sfConfig::get('sf_environment'); ?>">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="brand" href="<?php echo url_for('@homepage') ?>"><?php echo sfTwitterBootstrap::getProperty('site'); ?></a>

<?php if ($sf_user->isAuthenticated()): ?>
        <?php include_partial('sfTwitterBootstrap/menu', array('items' => $items, 'categories' => $categories)); ?>
        <p class="logout pull-right">
          <?php echo link_to('<i class="icon-off icon-white"></i>', sfTwitterBootstrap::getProperty('logout_route'), array('title' => __('Logout'))) ?>
        </p>
        <p class="logged pull-right">
          <i class="icon-user icon-white"></i>&nbsp;
          <?php echo __('Logged in as') ?> <a href="#"><?php echo $sf_user->__toString(); ?></a>
        </p>
<?php endif; // if user is authenticated ?>
      </div>
    </div>
</div>

<?php if ($sf_user->isAuthenticated() && sfTwitterBootstrap::getProperty('include_path')): ?>
<ul class='breadcrumb mbs'>
  <li>
    <?php echo link_to(__(sfTwitterBootstrap::getProperty('breadcrumb_root_name')), sfTwitterBootstrap::getProperty('dashboard_url')) ?>
  </li>
  <?php if ($sf_context->getModuleName() != 'sfTwitterBootstrap' && $sf_context->getActionName() != 'dashboard'): ?>
    <li><span class="divider">/</span>
    <?php echo null !== $module_link ? link_to(__($module_link_name), $module_link) : ucfirst(__($module_link_name)); ?>
    <?php if (null != $action_link): ?><span class="divider">/</span>
      <?php echo link_to(ucfirst(__($action_link_name)), $action_link); ?>
    <?php endif ?></li>
  <?php endif; ?>
</ul>
<?php endif; // if breadcrumbs are enabled ?>

<?php include_component_slot('sf_twitter_bootstrap_permanent_slot') ?>
