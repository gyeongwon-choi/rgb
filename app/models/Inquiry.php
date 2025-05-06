<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Inquiry extends Model {
    // inquiry 테이블
    protected $table = 'inquiry';
    
    // 문의 생성
    public function createInquiry($inquiryType, $name, $email, $phone, $company, $title, $content, $infoAgree, $snsAgree) {
        $sql = "INSERT INTO {$this->table} 
                (inquiryType, name, email, phone, company, title, content, infoAgree, snsAgree) 
                VALUES 
                (:inquiryType, :name, :email, :phone, :company, :title, :content, :infoAgree, :snsAgree)";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':inquiryType', $inquiryType, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':company', $company, PDO::PARAM_STR);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':infoAgree', $infoAgree, PDO::PARAM_INT);
            $stmt->bindParam(':snsAgree', $snsAgree, PDO::PARAM_INT);
    
            // 데이터베이스 삽입 성공 후 메일 발송
            if ($stmt->execute()) {
                // DB에 저장된 정보와 함께 메일 발송
                if (!$this->sendConfirmationEmail($inquiryType, $name, $email, $phone, $company, $title, $content)) {
                    error_log("Failed to send confirmation email to $email");
                }
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error inserting inquiry: " . $e->getMessage());
            return false;
        }
    }
    

    private function sendConfirmationEmail($inquiryType, $name, $email, $phone, $company, $title, $content) {
        loadEnv(realpath(__DIR__ . '/../../.env'));
        
        $mail = new PHPMailer(true);
    
        try {
            // SMTP 서버 설정
            $mail->isSMTP();
            $mail->Host = $_ENV['MAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['MAIL_USERNAME'];
            $mail->Password = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $_ENV['MAIL_PORT'];
            $mail->CharSet = 'UTF-8';
    
            // 발신자 이메일 주소가 유효한지 확인
            if (empty($_ENV['MAIL_USERNAME']) || !filter_var($_ENV['MAIL_USERNAME'], FILTER_VALIDATE_EMAIL)) {
                error_log("Invalid 'MAIL_USERNAME' in .env file: {$_ENV['MAIL_USERNAME']}");
                throw new Exception("Invalid 'MAIL_USERNAME' in .env file.");
            }
    
            // 발신자와 수신자 설정
            $mail->setFrom($email, $company);
            $mail->addAddress($_ENV['MAIL_USERNAME'], 'rgb');
    
            // 메일 내용 설정
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = "
                <h3>문의</h3>
                <p><strong>문의 종류 :</strong> $inquiryType</p>
                <p><strong>보낸 사람 :</strong> $name</p>
                <p><strong>이메일 :</strong> $email</p>
                <p><strong>전화번호 :</strong> $phone</p>
                <p><strong>회사명 :</strong> $company</p>
                <p><strong>내용 :</strong> $content</p>
            ";
    
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
    
}
?>
