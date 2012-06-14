<div class="page-header">
  <h1>Guestbook</h1>
</div>
<?php foreach($pager->getResults() as $message):?>
  <blockquote>
    <p><?php echo $message->getText(); ?></p>
    <small><?php echo $message->getAuthor(); ?>, <?php echo $message->getDateTimeObject('created_at')->format('d/m/Y'); ?></small>
  </blockquote>
  <hr/>
<?php endforeach;?>
<?php if(count($pager->getLinks()) > 1): ?>
<div class="pagination pagination-centered">
  <ul>
    <?php if ($pager->getPage() != $pager->getFirstPage()): ?>
    <li class=""><a href="<?php echo url_for('guestbook/index') ?>?page=<?php echo $pager->getPreviousPage(); ?>">&laquo;</a></li>
    <?php endif; ?>

    <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <li class="active"><a href="#"><?php echo $page ?></a></li>
      <?php else: ?>
      <li class=""><a href="<?php echo url_for('guestbook/index') ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
      <?php endif; ?>
    <?php endforeach; ?>

    <?php if ($pager->getPage() != $pager->getLastPage()): ?>
    <li class=""><a href="<?php echo url_for('guestbook/index') ?>?page=<?php echo $pager->getNextPage(); ?>">&raquo;</a></li>
    <?php endif; ?>
  </ul>
</div>
<?php endif; ?>
<form method="post" action="<?php echo url_for("guestbook/index"); ?>">
  <?php echo $form->renderHiddenFields(); ?>
  <table class="table">
    <tr>
      <th>
        Auteur <span class="red">*</span>
      </th>
      <td>
        <?php echo $form['author']; ?>
        <?php echo $form['author']->renderError() ?>
      </td>
      <th>
        Email
      </th>
      <td>
        <?php echo $form['email']; ?>
        <?php echo $form['email']->renderError() ?>
      </td>
    </tr>
    <tr>
      <th>
        Text <span class="red">*</span>
      </th>
      <td>
        <?php echo $form['text']; ?>
        <?php echo $form['text']->renderError() ?>
      </td>
      <th>
        Note<br/>
        <span class="small">Entre 0 et 20</span>
      </th>
      <td>
        <?php echo $form['note']; ?>
        <?php echo $form['note']->renderError() ?>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <?php echo $form['captcha']; ?>
        <?php echo $form['captcha']->renderError() ?>
      </td>
      <td colspan="2">
        <input class="btn btn-primary" type="submit" value="Signer le livre d'or"/>
      </td>
    </tr>
  </table>
</form>