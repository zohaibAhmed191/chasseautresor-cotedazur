<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject }}</title>

    <style>
        img{
            object-fit:contain;
            margin:50px auto;
        }
    </style>
</head>
<body>
      <img src="https://chasseautresorsaintmalo.fr/images/main-logo.webp" width="150px" alt="">
    {!! $mailContent !!}
</body>
</html>