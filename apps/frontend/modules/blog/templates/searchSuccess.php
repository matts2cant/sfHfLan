<?php slot('title', 'hf.lan &raquo; Recherche'); ?>

<div class="page-header">
  <h1>Recherche</h1>
</div>

<?php include_partial('blog/list', array('blogArticles' => $pager->getResults())); ?>

<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
  <!--<a href="<?php echo url_for('blog/list') ?>?page=1"><<</a>-->
  <a href="<?php echo url_for('blog/list') ?>?page=<?php echo $pager->getPreviousPage(); ?>">&laquo;</a>
  <?php foreach ($pager->getLinks() as $page): ?>
  <?php if ($page == $pager->getPage()): ?>
    <?php echo $page ?>
    <?php else: ?>
    <a href="<?php echo url_for('blog/list') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
    <?php endif; ?>
  <?php endforeach; ?>
  <a href="<?php echo url_for('blog/list') ?>?page=<?php echo $pager->getNextPage(); ?>">&raquo;</a>
  <!--<a href="<?php echo url_for('blog/list') ?>?page=<?php echo $pager->getLastPage(); ?>">>></a>-->
</div>
<?php endif ?>