<!DOCTYPE html>
<html>
<head>
    <title>Registration Confirmation</title>
</head>
<body style="font-family: sans-serif; color: #333;">
  <p>Dear {{ $name }},</p>

  <h2><strong>Register and Transaction Successful</strong></h2>

  <p>
    Thank you for your purchase at <strong>HypeHub</strong>.<br>
    Below is the QR Code for your check-in.
  </p>

  <p style="text-align: center; margin: 20px 0;">
    {!! $qrCode !!}
  </p>

  <p>Thanks a lot!</p>
</body>
</html>
