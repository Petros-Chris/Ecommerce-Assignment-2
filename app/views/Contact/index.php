<html>
    <body>
        <h1>Contact us</h1>
        <p>Wanna reach us? Write your email information and message in the following form and then submit.</p>

        <form method='post' onsubmit="return testForm()" action="../app/controllers/Contact.php" >
            <label for="emailInput">Email: </label>
            <input class="inputFields" type="email" id="emailInput" name="email">
            <br>
            <div id="test">
                <label for="messageInput" style="width: 154px;" >Message:</label>
                <textarea class="inputFields" id="messageInput" name="message"></textarea>
            </div>
            <input class="inputFields" id="button" type="submit" value='Send!'>
        </form>
    </body>

    <script>
        function testForm() {
            var email = document.getElementById("emailInput").value;
            var message = document.getElementById("messageInput").value;

            if(email == "") {
                alert("Email can not be empty");
                return false;
            }

            if(message == "") {
                alert("Atleast type something in message");
                return false;
            }
            return true;
        }   
    </script>
</html>

<?php
    require_once('app/controllers/Count.php');
?>