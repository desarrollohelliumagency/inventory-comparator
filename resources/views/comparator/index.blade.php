<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comparator</title>
</head>
<body>
<h1>Comparator</h1>
@if ($message = Session::get('success'))
    <div>
        <p>{{$message}}</p>
    </div>
@endif
<h2>Old Inventory Import</h2>
<form action="{{route('import.old')}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('post')
    <input type="file" name="products_old_file" id="products_old_file" required>
    <button type="submit">Proceed whit old inventory</button>
</form>

<h2>New Inventory Import</h2>
<form action="{{route('import.new')}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('post')
    <input type="file" name="products_new_file" id="products_new_file" required>
    <button type="submit">Proceed whit new inventory</button>
</form>
</body>
</html>
