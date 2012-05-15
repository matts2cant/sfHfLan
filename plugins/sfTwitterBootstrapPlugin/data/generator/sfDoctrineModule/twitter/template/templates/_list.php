<?php if ($this->configuration->hasFilterForm()): ?>
[?php use_stylesheets_for_form($filters) ?]
[?php use_javascripts_for_form($filters) ?]
[?php if ($filters->hasGlobalErrors()): ?]
    [?php echo $filters->renderGlobalErrors() ?]
[?php endif; ?]
<?php endif; ?>

  <div class="sf_admin_list">
    <?php if(sfTwitterBootstrap::getProperty('display_top_pagination', false)): ?>
      [?php include_partial('<?php echo $this->getModuleName() ?>/pagination', array('pager' => $pager)) ?]
    <?php endif; ?>

    <table class="table table-bordered table-striped mbn">
      <thead>
        <tr>
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
          <th class="blue" id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
<?php endif; ?>
          [?php include_partial('<?php echo $this->getModuleName() ?>/list_th_<?php echo $this->configuration->getValue('list.layout') ?>', array('sort' => $sort)) ?]
<?php if ($this->configuration->getValue('list.object_actions') || $this->configuration->hasFilterForm()): ?>
          <th class="blue" id="sf_admin_list_th_actions">[?php echo __('Actions', array(), 'sf_admin') ?]</th>
<?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php if ($this->configuration->hasFilterForm()): ?>
            [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('filters' => $filters, 'configuration' => $configuration)) ?]
        <?php endif; ?>

  [?php if (!$pager->getNbResults()): ?]
    <tr><td colspan="<?php echo ($this->configuration->getValue('list.batch_actions') ? 1 : 0) + count($this->configuration->getValue('list.display')) + ($this->configuration->getValue('list.object_actions') || $this->configuration->hasFilterForm() ? 1 : 0) ?>">[?php echo __('No result', array(), 'sf_admin') ?]</td></tr>
  [?php else: ?]

        [?php foreach ($pager->getResults() as $i => $<?php echo $this->getSingularName() ?>): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?]
          <tr class="sf_admin_row [?php echo $odd ?]">
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
            [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_batch_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
<?php endif; ?>
            [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_<?php echo $this->configuration->getValue('list.layout') ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
<?php if ($this->configuration->getValue('list.object_actions') || $this->configuration->hasFilterForm()): ?>
            [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
<?php endif; ?>
          </tr>
        [?php endforeach; ?]

  [?php endif; ?]
        </tbody>
    </table>

    [?php include_partial('<?php echo $this->getModuleName() ?>/pagination', array('pager' => $pager)) ?]
  </div>

<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
