<?php slot('title', 'hf.lan &raquo; Blog'); ?>

<div class="page-header">
  <h1>Blog</h1>
</div>

<?php include_partial('blog/list', array('blogArticles' => $pager->getResults())); ?>

<?php if ($pager->haveToPaginate()): ?>
<div class="pagination pagination-centered">
  <ul>
    <?php if ($pager->getPage() != $pager->getFirstPage()): ?>
      <li class=""><a href="<?php echo url_for('blog/list') ?>?page=<?php echo $pager->getPreviousPage(); ?>">&laquo;</a></li>
    <?php endif; ?>

    <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <li class="active"><a href="#"><?php echo $page ?></a></li>
      <?php else: ?>
      <li class=""><a href="<?php echo url_for('blog/list') ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
      <?php endif; ?>
    <?php endforeach; ?>

    <?php if ($pager->getPage() != $pager->getLastPage()): ?>
      <li class=""><a href="<?php echo url_for('blog/list') ?>?page=<?php echo $pager->getNextPage(); ?>">&raquo;</a></li>
    <?php endif; ?>
  </ul>
</div>
<?php endif ?>