<?php

class InquiryController extends Controller {
    private $inquiry;

    public function __construct() {
        parent::__construct();
        $this->inquiry = $this->model('Inquiry'); // 모델 로드
    }

    public function index() {
        $this->view('inquiry/create');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 입력값 가져오기 + 기본 정제
            $inquiryType = isset($_POST['inquiryType']) ? trim($_POST['inquiryType']) : null;
            $name = isset($_POST['name']) ? trim($_POST['name']) : null;
            $email = isset($_POST['email']) ? trim($_POST['email']) : null;
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;
            $company = isset($_POST['company']) ? trim($_POST['company']) : '';
            $title = isset($_POST['title']) ? trim($_POST['title']) : null;
            $content = isset($_POST['content']) ? trim($_POST['content']) : '';
            $infoAgree = isset($_POST['infoAgree']) ? 1 : 0;
            $snsAgree = isset($_POST['snsAgree']) ? 1 : 0;
    
            // 필수값 유효성 검사
            if ($inquiryType && $name && $email && $phone && $title && $infoAgree) {
                // 보안 정제 (XSS 방지)
                $inquiryType = htmlspecialchars($inquiryType, ENT_QUOTES, 'UTF-8');
                $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
                $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
                $company = htmlspecialchars($company, ENT_QUOTES, 'UTF-8');
                $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
                $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
    
                // DB 저장
                $result = $this->inquiry->createInquiry($inquiryType, $name, $email, $phone, $company, $title, $content, $infoAgree, $snsAgree);
    
                if ($result) {
                    redirect('/inquiry/create');
                } else {
                    $this->view('inquiry/create', ['error' => '문의 등록에 실패했습니다. 다시 시도해 주세요.']);
                }
            } else {
                $this->view('inquiry/create', ['error' => '필수 항목을 모두 입력해 주세요.']);
            }
        } else {
            // GET 요청이면 폼 출력
            $this->view('inquiry/create');
        }
    }
    
}
