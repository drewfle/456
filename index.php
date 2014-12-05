<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AhAhah456AHah</title>
        <?php include './php/util.php'; ?>
        <?php
        $rand = new REvthi(0, 1000);
        $fsys = new FileSys();
        $clsArr = [];
        ?>
        <style>
            body {
                width: 100%;
                background: <?php $rand->bkdg(); ?>;
            }
            a {
                color: white;
                text-decoration: none;
            }
            .userinput {


                position: absolute;
                margin-left: <?php echo $rand->sz(0, 80); ?>;
                margin-top: <?php echo $rand->sz(0, 10); ?>;
                padding: <?php echo $rand->sz(4, 6); ?>;
                width: <?php echo $rand->sz(40, 60); ?>;
                height: <?php echo $rand->sz(20, 30); ?>;
                background: <?php $rand->bkdg(0.5); ?>;
                z-index: 10000;
            }
            .userinput form input[whitie] {
                color: white;
            }
        </style>
    </head>
    <body>
        <div class ="userinput">
            <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
                <form method="post" action="<?php echo htmlentities($_SERVER['SCRIPT_NAME']) ?>"
                      enctype="multipart/form-data">
                    <input whitie type="file" name="document"/>
                    <input type="submit" value="Send File"/>
                </form>
                <?php
            } else {
                header('Location: http://ec2-54-174-39-60.compute-1.amazonaws.com/');
                //header('Location: http://localhost:8000/');
                if (isset($_FILES['document']) &&
                        ($_FILES['document']['error'] == UPLOAD_ERR_OK)) {
                    $newPath = $fsys->fileDir . basename($_FILES['document']['name']);
                    move_uploaded_file($_FILES['document']['tmp_name'], $newPath) or die();
                }
            }
            ?>
            <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
                <form method="post" action="<?php echo htmlentities($_SERVER['SCRIPT_NAME']) ?>">
                    <input type="text" name="uputname" placeholder="gimme a name"/>
                    <input type="text" name="uput" placeholder="feed me the link"/>
                    <input type="submit" value="Put"/>
                </form>
                <?php
            } else {
                header('Location: http://ec2-54-174-39-60.compute-1.amazonaws.com/');
                //header('Location: http://localhost:8000/');
                if (isset($_POST['uput'])) {
                    $newPath = $fsys->fileDir . $fsys->secretWord
                            . $_POST['uputname'] . '_' . mt_rand();
                    $fh = fopen($newPath, 'w') or die();

                    if (-1 == fwrite($fh, $_POST['uput']))
                        die();
                    fclose($fh) or die();
                }
            }
            ?>
        </div>
        <?php
        $link = $fsys->linkGen();

        foreach ($link as $v) {
            echo '<a href="' . htmlentities($v) . '" target="_blank"><div ' . $rand->style() . '><b>c-l-i-c-k</b></div></a><br>';
        }
        ?>

    </body>
</html>
