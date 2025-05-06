<?php

class News extends Model {
    // news 테이블
    protected $table = 'news';
    
    // 모든 뉴스 글 가져오기
    public function getAllNews() {
        try {
            $sql = "SELECT * FROM {$this->table} ORDER BY date DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            $newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!$newsList) {
                error_log("No news found in getAllNews.");
            }
            return $newsList;
        } catch (PDOException $e) {
            error_log("Error fetching all news: " . $e->getMessage());
            return false;
        }
    }

    // 특정 뉴스 글 가져오기
    public function getNewsById($id) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $newsItem = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$newsItem) {
                error_log("No news found with ID: " . $id);
            }
            return $newsItem;
        } catch (PDOException $e) {
            error_log("Error fetching news by ID: " . $e->getMessage());
            return false;
        }
    }

    // 뉴스 글 생성
    public function createNews($title, $category, $content) {
        try {
            $sql = "INSERT INTO {$this->table} (title, category, content, date) VALUES (:title, :category, :content, CURDATE())";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $result = $stmt->execute();
            
            return $result;
        } catch (PDOException $e) {
            error_log("Error inserting news: " . $e->getMessage());
            return false;
        }
    }

    // 뉴스 글 수정
    public function updateNews($id, $title, $category, $content) {
        try {
            $sql = "UPDATE {$this->table} SET title = :title, category = :category, content = :content, date = CURDATE() WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating news: " . $e->getMessage());
            return false;
        }
    }

    // 특정 뉴스 글 삭제
    public function deleteNews($id) {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting news: " . $e->getMessage());
            return false;
        }
    }

}
?>
