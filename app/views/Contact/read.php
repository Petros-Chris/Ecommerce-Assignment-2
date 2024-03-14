<html>
    <h1>Contact us - messages sent</h1>
</html>

<?php
    require('app/models/Message.php');

    $message = new \app\models\Message();
    $messageContent = $message->read();

    foreach ($messageContent as $human) {
        if (is_array($human)) {
            
            $email = $human['email'];
            $messageText = $human['message'];

            echo "<p><strong>" . ($email) . "</strong><br />";
            echo ($messageText) . "</p>";
        }
    }
    require_once('app/controllers/Count.php');
?>
