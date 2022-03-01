<html>

<head>PHED ERP</head>

<body>
    <p>Dear <b>{{ $details['name'] }}</b>!</p>
    <p>You have been granted access to phed erp system.Please use below credentials to login to your account</p>
    <p>User Name: <i>{{ $details['email'] }}</i></p>
    <p>Password: <i>{{ $details['password'] }}</i></p>
    <p>Website link: <i>{{ url('') . '/#/login' }}</i></p>
</body>

</html>
