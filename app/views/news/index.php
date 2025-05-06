<?php
  $pageTitlePath = " : news";
  require_once __DIR__ . "/../layout/top.php";
?>

<div class="l-container">
    
  <section class="c-subHead">
    <h2 class="c-subHead__title">NEWS & NOTICE</h2>
    <div class="c-subHead__desc">
      플럭시티의<br>
      <b>최신 소식들을 만나보세요.</b>
    </div>
  </section>

  <section class="c-newsList">
    <div class="c-formCrudBtns">
      <a class="c-formCrudBtns__btn" href="/news/create">글쓰기</a>
    </div>
    <ul class="c-newsList__listBox">
      <?php if (!empty($news)): ?>
        <?php foreach ($news as $item): ?>
          <li class="c-newsListItem">
            <a class="c-newsListItem__inner" href="news/detail/<?= $item['id'] ?>">
              <div class="c-newsListItem__contentWrap">
                <div class="c-newsListItem__thumbWrap">
                  <img class="c-newsListItem__thumbImage" src="./assets/images/news_sample.png" alt="이미지 이름">
                </div>
                <div class="c-newsListItem__contents">
                  <div class="c-newsListItem__category u-ellipsis"><?= nl2br(htmlspecialchars($item['category'])) ?></div>
                  <h3 class="c-newsListItem__title u-ellipsis"><?= htmlspecialchars($item['title']) ?></h3>
                  <p class="c-newsListItem__desc u-ellipsis2"><?= nl2br(htmlspecialchars($item['content'])) ?></p>
                  <div class="c-newsListItem__date u-ellipsis"><?= nl2br(htmlspecialchars(str_replace('-', '.', $item['date']))) ?></div>
                </div>
              </div>
              <div class="c-newsListItem__linkWrap">
                <button type="button" class="c-newsListItem__link">원문 바로가기</button>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
        <?php else: ?>
          <li class="c-newsList__empty">작성된 게시글이 없습니다.</li>
      <?php endif; ?>
    </ul>

    <ul class="c-paging">
      <li class="c-paging__list c-paging__list--first">
        <a class="c-paging__btn c-paging__btn--prev" href="javascript:void(0);">
          <span class="u-irInlineBlock">이전으로</span>
        </a>
      </li>

      <li class="c-paging__list">
        <a class="c-paging__btn c-paging__btn--num" href="javascript:void(0);">1</a>
      </li>
      <li class="c-paging__list">
        <a class="c-paging__btn c-paging__btn--num" href="javascript:void(0);">2</a>
      </li>
      <li class="c-paging__list">
        <a class="c-paging__btn c-paging__btn--num" href="javascript:void(0);">3</a>
      </li>
      <li class="c-paging__list">
        <a class="c-paging__btn c-paging__btn--num" href="javascript:void(0);">4</a>
      </li>

      <li class="c-paging__list c-paging__list--last">
        <a class="c-paging__btn c-paging__btn--next" href="javascript:void(0);">
          <span class="u-irInlineBlock">이전으로</span>
        </a>
      </li>
    </ul>

  </section>

</div>

<?php
  require_once __DIR__ . "/../layout/bottom.php";
?>