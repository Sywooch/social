<?php
namespace app\components;
use PHPMailer\PHPMailer\PHPMailer;
class Mailer {
    /**
     * Отправка почтового сообщения.
     *
     * @param array $data
     *
     * @return bool|string
     */
    public static function sendMail($data = [])
    {
        $mailer = new PHPMailer(true);
        $mailer->CharSet = 'utf-8';                               // Enable verbose debug output
        if (\Yii::$app->params['isSMTP'] === true) {
            $mailer->isSMTP();
            foreach (\Yii::$app->params['smtp'] as $param => $value) {
                $mailer->{$param} = $value;
            }
        } else {
            $mailer->Mailer = 'mail';
        }
        $mailer->setFrom($data['from'], $data['fromName']);
        $mailer->addAddress($data['to']);
        if (!empty($data['attachment']->tempName)) {
            $mailer->addAttachment($data['attachment']->tempName, $data['attachment']->name);
        }
        $mailer->isHTML(true);
        $mailer->Subject = $data['subject'];
        $mailer->Body = $data['body'];
        try {
            $mailer->send();
            return true;
        } catch (\Exception $e) {
            return $mailer->ErrorInfo;
        }
    }
}