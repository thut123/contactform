<?php
namespace Phppot;

use Phppot\DataSource;

class Contact
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    function getRecord()
    {
        $query = "SELECT * FROM tbl_term ORDER BY RAND() LIMIT 1";

        $result = $this->ds->select($query);
        return $result;
    }

    function getCaptchaIcons($id)
    {
        $query = "SELECT tbl_captcha_images.*, tbl_term.name FROM tbl_captcha_images 
        JOIN tbl_term ON tbl_captcha_images.term_id = tbl_term.id WHERE term_id != " . $id . " ORDER BY RAND() LIMIT 4";

        $captchaResult = $this->ds->select($query);
        return $captchaResult;
    }

    function getRandomCaptchaId($id)
    {
        $query = "SELECT tbl_captcha_images.*, tbl_term.name FROM tbl_captcha_images 
        JOIN tbl_term ON tbl_captcha_images.term_id = tbl_term.id WHERE term_id = " . $id . " ORDER BY RAND() LIMIT 1";
        $captcha = $this->ds->select($query);
        return $captcha;
    }

    function sendContactMail($postValues)
    {
        $name = $postValues["userName"];
        $email = $postValues["userEmail"];
        $subject = $postValues["subject"];
        $content = $postValues["content"];

        $toEmail = "SITE_ADMIN_EMAIL"; // Put in place the recipient email
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        mail($toEmail, $subject, $content, $mailHeaders);
    }
}
