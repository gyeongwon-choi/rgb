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

  
  <section class="c-newsDetail">
    <div class="c-formCrudBtns">
      <div class="c-formCrudBtns__btnWrap">
        <form method="POST" action="/news/delete/<?= $news['id'] ?>" onsubmit="return confirm('정말 삭제하시겠습니까?');">
          <button type="submit" class="c-formCrudBtns__btn c-formCrudBtns__btn--delete">삭제하기</button>
        </form>
      </div>
      <a class="c-formCrudBtns__btn" href="/news/update/<?= $news['id'] ?>">수정하기</a>
    </div>
    <h3 class="c-newsDetail__title"><?= htmlspecialchars($news['title']) ?></h3>
    <div class="c-newsDetail__infoBox">
      <span class="c-newsDetail__category"><?= htmlspecialchars($news['category']) ?></span>
      <hr class="c-newsDetail__infoBoxHr">
      <span class="c-newsDetail__date"><?= nl2br(htmlspecialchars(str_replace('-', '.', $news['date']))) ?></span>
    </div>
    <div class="c-newsDetail__contents">
      <?= htmlspecialchars($news['content']) ?>
    </div>
    <ul class="c-newsDetail__links">
      <li class="c-newsDetail__linkWrap">
        <a href="javascript:void(0);" class="c-newsDetail__link c-newsDetail__link--prev">이전글</a>
        <span class="c-newsDetail__linkInfo">제목제목제목</span>
      </li>
      <li class="c-newsDetail__linkWrap c-newsDetail__linkWrap--next">
        <a href="javascript:void(0);" class="c-newsDetail__link c-newsDetail__link--next">다음글</a>
        <span class="c-newsDetail__linkInfo c-newsDetail__linkInfo--nothing">다음 글이 없습니다.</span>
      </li>
    </ul>
  </section>

</div>

<?php
  require_once __DIR__ . "/../layout/bottom.php";
?>