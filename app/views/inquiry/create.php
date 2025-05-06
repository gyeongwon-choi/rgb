<?php
  $pageTitlePath = " : 문의";
  require_once __DIR__ . "/../layout/top.php";
?>

<div class="l-container">
    
  <section class="c-subHead">
    <h2 class="c-subHead__title">INQUIRY</h2>
    <div class="c-subHead__desc">
      플럭시티의 디지털 트윈 플랫폼을 통해 <br>
      <b>새롭고 혁신적인 경험을 만나보세요.</b>
    </div>
    <div class="c-subHead__ps">
      문의하기로 남겨주시면, 각 담당자 확인 후 신속히 연락드리겠습니다.
    </div>
  </section>

  <section class="c-inquiryForm">
    <h2 class="c-inquiryForm__title">문의하기</h2>
    
    <form action="create" method="POST" onsubmit="return validateForm();">
    <ul class="c-inquiryForm__tabBox">
        <li class="c-inquiryForm__tabList">
          <input id="inquiry_tab1" name="inquiryType" type="radio" class="c-inquiryForm__tabRadio" value="디지털 트윈 플랫폼" checked>
          <label for="inquiry_tab1" class="c-inquiryForm__tabLabel">
            <span>디지털 트윈 플랫폼</span>
            <em>PLUG</em>
          </label>
        </li>
        <li class="c-inquiryForm__tabList">
          <input id="inquiry_tab2" name="inquiryType" type="radio" class="c-inquiryForm__tabRadio" value="스마트 건설안전 플랫폼">
          <label for="inquiry_tab2" class="c-inquiryForm__tabLabel">
            <span>스마트 건설안전 플랫폼</span>
            <em>Safers</em>
          </label>
        </li>
        <li class="c-inquiryForm__tabList">
          <input id="inquiry_tab3" name="inquiryType" type="radio" class="c-inquiryForm__tabRadio" value="스마트 골프 플랫폼">
          <label for="inquiry_tab3" class="c-inquiryForm__tabLabel">
            <span>스마트 골프 플랫폼</span>
            <em>Golf</em>
          </label>
        </li>
        <li class="c-inquiryForm__tabList">
          <input id="inquiry_tab4" name="inquiryType" type="radio" class="c-inquiryForm__tabRadio" value="마케팅/ 대외협력">
          <label for="inquiry_tab4" class="c-inquiryForm__tabLabel">
            <span>마케팅/ 대외협력</span>
          </label>
        </li>
        <li class="c-inquiryForm__tabList">
          <input id="inquiry_tab5" name="inquiryType" type="radio" class="c-inquiryForm__tabRadio" value="채용">
          <label for="inquiry_tab5" class="c-inquiryForm__tabLabel">
            <span>채용</span>
          </label>
        </li>
        <li class="c-inquiryForm__tabList">
          <input id="inquiry_tab6" name="inquiryType" type="radio" class="c-inquiryForm__tabRadio" value="기타">
          <label for="inquiry_tab6" class="c-inquiryForm__tabLabel">
            <span>기타</span>
          </label>
        </li>
      </ul>
      <ul class="c-inquiryForm__rows">
        <li class="c-inquiryForm__row">
          <label for="inquiry_name" class="c-inquiryForm__label">
            <span>성함</span>
            <span class="c-inquiryForm__required">*</span>
          </label>
          <input class="c-inquiryForm__input" type="text" name="name" id="inquiry_name" placeholder="예) 김플럭">
        </li>
        <li class="c-inquiryForm__row">
          <label for="inquiry_email" class="c-inquiryForm__label">
            <span>이메일</span>
            <span class="c-inquiryForm__required">*</span>
          </label>
          <input class="c-inquiryForm__input" type="text" name="email" id="inquiry_email" placeholder="example@pluxity.com">
        </li>
        <li class="c-inquiryForm__row">
          <label for="inquiry_phone" class="c-inquiryForm__label">
            <span>연락처</span>
            <span class="c-inquiryForm__required">*</span>
          </label>
          <input class="c-inquiryForm__input" type="text" name="phone" id="inquiry_phone" placeholder="-없이 숫자만 입력">
        </li>
        <li class="c-inquiryForm__row">
          <label for="inquiry_company" class="c-inquiryForm__label">
            <span>회사명</span>
          </label>
          <input class="c-inquiryForm__input" type="text" name="company" id="inquiry_company" placeholder="현재 소속된 단체명 또는 개인으로 표기">
        </li>
        <li class="c-inquiryForm__row">
          <label for="inquiry_title" class="c-inquiryForm__label">
            <span>제목</span>
            <span class="c-inquiryForm__required">*</span>
          </label>
          <input class="c-inquiryForm__input" type="text" name="title" id="inquiry_title" placeholder="제목을 입력해주세요.">
        </li>
        <li class="c-inquiryForm__row">
          <label for="inquiry_content" class="c-inquiryForm__label">
            <span>내용</span>
          </label>
          <textarea class="c-inquiryForm__textarea" name="content" id="inquiry_content" placeholder="문의 내용을 입력해주세요."></textarea>
        </li>
      </ul>
      
      <ul class="c-inquiryForm__checkItems">
        <li class="c-inquiryForm__checkList">
          <input class="c-inquiryForm__check" type="checkbox" name="infoAgree" id="inquiry_infoAgree">
          <label class="c-inquiryForm__checkLabel" for="inquiry_infoAgree">
            <a href="javascript:void(0);" class="c-inquiryForm__checkLink">개인정보처리 방침</a>에 동의합니다. (필수)
          </label>
        </li>
        <li class="c-inquiryForm__checkList">
          <input class="c-inquiryForm__check" type="checkbox" name="snsAgree" id="inquiry_snsAgree">
          <label class="c-inquiryForm__checkLabel" for="inquiry_snsAgree">
            플럭시티 관련 <a href="javascript:void(0);" class="c-inquiryForm__checkLink">프로모션 및 마케팅 정보 수신</a>에 동의합니다. (선택)
          </label>
        </li>
      </ul>

      <div class="c-inquiryForm__btnSubmitWrap">
        <button class="c-inquiryForm__btnSubmit">문의하기</button>
      </div>
    </form>
  </section>

</div>

<script>
  function validateForm() {
    const name = document.getElementById('inquiry_name').value.trim();
    const email = document.getElementById('inquiry_email').value.trim();
    const phone = document.getElementById('inquiry_phone').value.trim();
    const title = document.getElementById('inquiry_title').value.trim();
    const infoAgree = document.getElementById('inquiry_infoAgree').checked;

    if (!name) {
      alert('성함을 입력해주세요.');
      document.getElementById('inquiry_name').focus();
      return false;
    }

    if (!email) {
      alert('이메일을 입력해주세요.');
      document.getElementById('inquiry_email').focus();
      return false;
    }

    // 이메일 형식 유효성 검사
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert('유효한 이메일 주소를 입력해주세요.');
      document.getElementById('inquiry_email').focus();
      return false;
    }

    if (!phone) {
      alert('연락처를 입력해주세요.');
      document.getElementById('inquiry_phone').focus();
      return false;
    }

    // 연락처 숫자만 허용
    const phoneRegex = /^\d+$/;
    if (!phoneRegex.test(phone)) {
      alert('연락처는 숫자만 입력해주세요.');
      document.getElementById('inquiry_phone').focus();
      return false;
    }

    if (!title) {
      alert('제목을 입력해주세요.');
      document.getElementById('inquiry_title').focus();
      return false;
    }

    if (!infoAgree) {
      alert('개인정보처리 방침에 동의해주세요.');
      document.getElementById('inquiry_infoAgree').focus();
      return false;
    }

    return confirm('제출하시겠습니까?');
  }
</script>


<?php
  require_once __DIR__ . "/../layout/bottom.php";
?>