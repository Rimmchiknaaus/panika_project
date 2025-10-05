<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp-rimma.alwaysdata.net';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'rimma@alwaysdata.net';
    $mail->Password   = 'Naaus2709';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('rimma@alwaysdata.net', 'Panika');
    $mail->addAddress('ТВОЙ_EMAIL@gmail.com', 'Тест получателя');

    $mail->isHTML(true);
    $mail->Subject = 'Тест Alwaysdata SMTP';
    $mail->Body    = '<p>Если ты читаешь это письмо — SMTP работает ✅</p>';
    $mail->AltBody = 'Если ты читаешь это письмо — SMTP работает ✅';

    $mail->SMTPDebug = 2;        // ← включаем отладку
    $mail->Debugoutput = 'html';

    $mail->send();
    echo '<strong>Письмо отправлено успешно!</strong>';
} catch (Exception $e) {
    echo "Ошибка: {$mail->ErrorInfo}";
}
