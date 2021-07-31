<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
    <link rel="stylesheet" href="styles.css" type="text/css" media="all" />
</head>
<body>
	<div class="wrapper">
    <div class="title">
      Send Email
    </div>
    <h4 class="sent-notification"></h4>
    <div class="form">
       <form accept-charset="utf-8" id="myForm">
        <div class="inputfield">
          <label>Name</label>
          <input id="name" type="text" class="input">
       </div> 
      <div class="inputfield">
          <label>Email</label>
          <input id="email" type="text" class="input">
       </div> 
      <div class="inputfield">
          <label>Subject</label>
          <input id="subject" type="text" class="input">
       </div> 
      <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" id="body"></textarea>
       </div> 
      <div class="inputfield">
        <button type="submit" class="btn" onclick="sendEmail()">kirim</button>
      </div>
       </form>
    </div>
</div>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>