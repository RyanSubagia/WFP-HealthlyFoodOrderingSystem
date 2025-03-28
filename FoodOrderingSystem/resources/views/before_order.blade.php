<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Before Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Silahkan pilih Makan di mana</h2>
        <!-- <a href="{{route('menu',['order' =>'dinein'])}}" class="btn">Menu</a> -->
        <a href="{{url('menu/dinein')}}" class="btn btn-success">Dine In</a>
        <a href="{{url('menu/takeaway')}}" class="btn btn-primary">Take Away</a>
    </div>
</body>
</html>