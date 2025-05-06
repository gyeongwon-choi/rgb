<?php

class NewsController extends Controller {
    private $news;

    public function __construct() {
        parent::__construct();
        $this->news = $this->model('News'); // 모델 로드
    }

    public function index() {
        $newsList = $this->news->getAllNews();
        $this->view('news/index', ['news' => $newsList]); // 게시글 목록 뷰 로드
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 입력값 가져오기 + 기본 정제
            $title = isset($_POST['title']) ? trim($_POST['title']) : null;
            $category = isset($_POST['category']) ? trim($_POST['category']) : null;
            $content = isset($_POST['content']) ? trim($_POST['content']) : null;
    
            // 필수값이 모두 존재하는지 확인
            if ($title && $category && $content) {
                // 추가적인 보안 정제 (XSS 방지)
                $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
                $category = htmlspecialchars($category, ENT_QUOTES, 'UTF-8');
                $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
    
                // DB 저장
                $this->news->createNews($title, $category, $content);
    
                // 작성 후 뉴스 목록으로 이동
                redirect('/news');
            } else {
                // 값이 부족할 경우 다시 작성 페이지로 이동
                $this->view('news/create', ['error' => '모든 항목을 입력해 주세요.']);
            }
        } else {
            // GET 요청이면 폼 출력
            $this->view('news/create');
        }
    }
    

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 입력값 가져오기 + 기본 공백 제거
            $title = isset($_POST['title']) ? trim($_POST['title']) : null;
            $category = isset($_POST['category']) ? trim($_POST['category']) : null;
            $content = isset($_POST['content']) ? trim($_POST['content']) : null;
    
            // 모든 필드가 비어있지 않은지 검사
            if ($title && $category && $content) {
                // 입력값 정제 (XSS 방지)
                $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
                $category = htmlspecialchars($category, ENT_QUOTES, 'UTF-8');
                $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
    
                // 수정 처리
                $this->news->updateNews($id, $title, $category, $content);
                redirect('/news');
            } else {
                // 필드 중 하나라도 비어 있을 경우 다시 수정 폼으로 이동
                $this->view('news/update', [
                    'news' => [
                        'id' => $id,
                        'title' => $title,
                        'category' => $category,
                        'content' => $content,
                    ],
                    'error' => '모든 항목을 입력해 주세요.'
                ]);
            }
        } else {
            // GET 요청이면 기존 뉴스 기사 데이터를 불러와서 폼에 표시
            $news = $this->news->getNewsById($id);
    
            if (!$news) {
                redirect('/news'); // 존재하지 않는 ID 처리
            }
    
            $this->view('news/update', ['news' => $news]);
        }
    }
    

    public function detail($id) {
        $id = (int) $id;
        $newsItem = $this->news->getNewsById($id);
        
        if (!$newsItem) {
            redirect('/news');
        }

        $this->view('news/detail', ['news' => $newsItem]);
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) $id; // 숫자 아닌 값 차단
            $this->news->deleteNews($id);
        }
        redirect('/news');
    }
    
}
