<span id="jwj_toolbar" class="sf_admin_pagination">
    [?php if (!$pager->isFirstPage()): ?]
  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1">
    <font id="jwj_admin_pagination_first">Primero</font>
  </a>

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]">
    <font id="jwj_admin_pagination_back">Atras</font>
  </a>
  [?php endif; ?]


  [?php foreach ($pager->getLinks() as $page): ?]
    [?php if ($page == $pager->getPage()): ?]
      <font id="jwj_admin_pagination_off" disabled="disabled">[?php echo $page ?]</font>
    [?php else: ?]
      <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]"><font class="jwj_admin_pagination_on" >[?php echo $page ?]</font></a>
    [?php endif; ?]
  [?php endforeach; ?]

  [?php if (!$pager->isLastPage()): ?]
  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">
        <font id="jwj_admin_pagination_next">Siguiente</font>
  </a>

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">
    <font id="jwj_admin_pagination_last">Ultimo</font>
  </a>
  [?php endif; ?]
</span>