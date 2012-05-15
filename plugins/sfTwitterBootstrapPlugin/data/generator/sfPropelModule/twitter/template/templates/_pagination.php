
    [?php if ($pager->getNbResults()): ?]

    <div class="cf">
      <div class="table-result fLeft">
        [?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?]
        [?php if ($pager->haveToPaginate()): ?]
          [?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?]
          <span class="help-pagination">
            [?php
              $nb = $pager->getMaxPerPage();
              if($pager->getPage() == $pager->getLastPage())
              {
                // we calculate the modulo between the total result and the max_per_page to get the rest of the results
                $nb = $pager->getNbResults() % $pager->getMaxPerPage();
              }
              echo format_number_choice(__('[0] no item on this page|[1] 1 item on this page|(1,+Inf] %1% items on this page'), array('%1%' => $nb), $nb, 'sf_admin')
            ?]
          </span>
        [?php endif; ?]
      </div>

      [?php if ($pager->haveToPaginate()): ?]

        <div class="pagination fRight mts">
          <ul>
            <li class="first [?php if (1 == $pager->getPage()): ?]disabled[?php endif; ?]">
              <a title="[?php echo __('First page', array(), 'sf_admin') ?]" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1">&lArr;</a>
            </li>
            <li class="prev [?php if (1 == $pager->getPage()): ?]disabled[?php endif; ?]">
              <a title="[?php echo __('Previous page', array(), 'sf_admin') ?]" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]">&larr;</a>
            </li>

            [?php foreach ($pager->getLinks() as $page): ?]
              [?php if ($page == $pager->getPage()): ?]
                <li class="active"><a href="#">[?php echo $page ?]</a></li>
              [?php else: ?]
                <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a></li>
              [?php endif; ?]
            [?php endforeach; ?]

            <li class="next [?php if ($pager->getLastPage() == $pager->getPage()): ?]disabled[?php endif; ?]">
              <a title="[?php echo __('Next page', array(), 'sf_admin') ?]" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">&rarr;</a>
            </li>
            <li class="last [?php if ($pager->getLastPage() == $pager->getPage()): ?]disabled[?php endif; ?]">
              <a title="[?php echo __('Last page', array(), 'sf_admin') ?]" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">&rArr;</a>
            </li>
          </ul>
        </div>

      [?php endif; ?]

    </div>

    [?php endif; ?]


