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

    <div class="c-form">
      <h2 class="c-form__title">수정하기</h2>
      
      <form action="/news/update/<?= $news['id'] ?>" method="POST" onsubmit="return confirm('수정하시겠습니까?');">
        <ul class="c-form__rows">
          <li class="c-form__row">
            <div class="c-form__inputWrap">
              <label for="news_title" class="c-form__label">
                <span>제목</span>
              </label>
              <input class="c-form__input" type="text" name="title" id="news_title" placeholder="제목을 입력하세요." value="<?= htmlspecialchars($news['title']) ?>">
            </div>
          </li>
          <li class="c-form__row">
            <div class="c-form__inputWrap">
              <label for="news_category" class="c-form__label">
                <span>카테고리</span>
              </label>
              <select class="c-form__input" name="category" id="news_category" value="<?= htmlspecialchars($news['category']) ?>">
                <option value="category1">category1</option>
                <option value="category2">category2</option>
                <option value="category3">category3</option>
              </select>
            </div>
          </li>
          <li class="c-form__row">
            <div class="c-form__inputWrap">
              <label for="news_content" class="c-form__label">
                <span>내용</span>
              </label>
              <textarea class="c-form__textarea" name="content" id="news_content" placeholder="문의 내용을 입력해주세요."><?= htmlspecialchars($news['content']) ?></textarea>
            </div>
          </li>
        </ul>

        <div class="c-form__btnSubmitWrap">
          <button class="c-form__btnSubmit">수정하기</button>
        </div>
      </form>
    </div>

    <ul class="c-newsDetail__links">
      <li class="c-newsDetail__linkWrap">
        <a href="javascript:void(0);" class="c-newsDetail__link c-newsDetail__link--prev">이전글</a>
        <span class="c-newsDetail__linkInfo u-ellipsis2">제목제목제목</span>
      </li>
      <li class="c-newsDetail__linkWrap c-newsDetail__linkWrap--next">
        <a href="javascript:void(0);" class="c-newsDetail__link c-newsDetail__link--next">다음글</a>
        <span class="c-newsDetail__linkInfo c-newsDetail__linkInfo--nothing u-ellipsis2">다음 글이 없습니다.</span>
      </li>
    </ul>
    
  </section>

</div>

<?php
  require_once __DIR__ . "/../layout/bottom.php";
?>