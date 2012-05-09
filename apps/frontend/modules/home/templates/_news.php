<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#1" data-toggle="tab">News</a></li>
    <li><a href="#2" data-toggle="tab">Règlements</a></li>
    <li><a href="#3" data-toggle="tab">Chat</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="1">
      <?php include_partial('blog/list', array('blogArticles' => $blogArticles)); ?>
      <ul class="pager">
        <li><a class="other" href="<?php echo url_for('blog/list'); ?>">Autres articles</a></li>
      </ul>

    </div>
    <div class="tab-pane" id="2">
      <?php include_component("rules", "list"); ?>
    </div>
    <div class="tab-pane" id="3">
      <?php include_partial("chat/chat");?>
    </div>
  </div>
</div>