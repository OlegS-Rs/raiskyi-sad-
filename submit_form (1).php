
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($message) >= 10) {
        $to = "info@raiskysad.com";
        $headers = "From: " . $email;
        $full_message = "Name: " . $name . "\nEmail: " . $email . "\nSubject: " . $subject . "\nMessage: " . $message;

        if (mail($to, $subject, $full_message, $headers)) {
            echo "<div class='success-message'>Ваше повідомлення успішно надіслано!</div>";
        } else {
            echo "<div class='error-message'>Виникла помилка при надсиланні повідомлення. Спробуйте ще раз пізніше.</div>";
        }
    } else {
        echo "<div class='error-message'>Будь ласка, заповніть всі поля правильно.</div>";
    }
}
?>
