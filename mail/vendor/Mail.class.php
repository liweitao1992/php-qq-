<?php
require_once ("autoload.php");

class Mail{
    private $transport;

    const FROM_MAIL = 'xxxxx@qq.com'; //账号
    const FROM_PASSWORD = 'xxxxxxxxxxx'; // IMAP/SMTP服务 密码
    const FROM_NICK = '东土大唐';

    public function __construct()
    {
        $this->transport = (new Swift_SmtpTransport('smtp.qq.com', 465,'ssl'))
            ->setUsername(self::FROM_MAIL)
            ->setPassword(self::FROM_PASSWORD);
    }


    /**
     * 发送邮件
     * @param string $title
     * @param string $content
     * @param string $to
     * @return int
     */
    public function sendMail($title = "", $content = "", $to=""){
        $mailer = new Swift_Mailer($this->transport);

        //下面可以自由发挥  附件 多人等
        $message = (new Swift_Message($title))
            ->setFrom([self::FROM_MAIL => self::FROM_NICK])
            ->setTo($to)
            ->setBody($content)
        ;
        return $mailer->send($message);
    }
}