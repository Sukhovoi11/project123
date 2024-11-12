<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // +dane
    $email = $_POST['email'];
    $message = $_POST['message'];
    // twoj mail dla sms!!!!
    $to = "   jakis-twoj-email-:)     @gmail.com";
    $subject = "Feedback from Website";
    $email_content = "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";


    $headers = "From: $email";


    if (mail($to, $subject, $email_content, $headers)) {
        echo json_encode(array("status" => "success", "message" => "Thank you for your feedback!"));
    } else {
        error_log("Mail failed: " . error_get_last()['message']); // errors - - -
        echo json_encode(array("status" => "error", "message" => "Thank you for your feedback!."));
        //Ta funkcja nie działa, ponieważ strona jest testowa i nie planuję jej publikować.
        // Dlatego stworzyłem 'głuszycę', która nawet w przypadku błędu wyświetla komunikat -
        // 'Dziękujemy za Twoją opinię!'.
    }
} else {

    echo json_encode(array("status" => "error", "message" => "Access denied."));
}
?>