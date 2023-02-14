<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($files))
        {
            echo '<br>FILES<br>';
            print_r($files);

            echo "<pre>";
            foreach($files as $key => $value)
            {
                if($key != 'ppt')
                {
                    print_r($file);
                }
            }
            echo "</pre>";
        }

        if(isset($file)) {echo "<br>FILE - PPT<br>"; print_r($file);}

        if(isset($post))
        {
            echo "<br>POST<br>";
            print_r($post);
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="file" name="ppt" id="">
        <input type="file" name="yellow" id="">
        <input type="file" name="travel" id="">

        <input type="submit" value="Submit">
    </form>
</body>
</html>