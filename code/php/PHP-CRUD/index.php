
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP With Rizky Dev</title>
</head>
<body>
    <header>
    <h1>Learn PHP</h1>
    </header>
    <nav>
        <?php if(isset($_GET['flashdata'])):?>
        <p>
            <?php
            if($_GET['flashdata'] == 'success'){
                echo  "SUCCESS INPUT";
            }else{
                echo  "INPUT FAILED";
            }
            ?>
        </p>
      <?php endif;?>
    <ul>
        <h4>Menu</h4>
    <a href="new.php">NEW INPUT</a> |
    <a href="list.php">LIST DATA</a>
    </ul>
    </nav>
</body>
</html>
