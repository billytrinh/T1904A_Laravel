<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Listing</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mark</th>
        </thead>
        <tbody>
        <?php foreach($students as $s):?>
            <tr>
                <td>#<?php echo $s['id'];?></td>
                <td><?php echo $s['name'];?></td>
                <td><?php echo $s['email'];?></td>
                <td><?php echo $s['mark'];?></td>
            </tr>

         <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>
