<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome {{ $data['name'] }}</h1>
    <p>Thank you for joining our application!</p>
    <p>Your email: {{ $data['email'] }}</p>
</body>
</html>