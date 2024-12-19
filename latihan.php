<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .warna_block{
            background-color: aqua;
        }
    </style>
</head>
<body>
    <h3>Perulangan For</h3>
    <?php 
        for($i = 0; $i < 5; $i++){
            echo "hello world <br/>";
        }
    ?>
    
    <h3>Perulangan while</h3>
    <?php 
        $i = 0;
        while ($i < 5){
            echo "hello world <br/>";
        $i++;
        }
    ?>

    <h3>Perulangan for dengan table</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for($i = 0; $i < 5; $i++) : ?>
            <?php if($i % 2 == 1) : ?>
            <tr class="warna_block"> 
            <?php else : ?>
            <tr>
            <?php endif; ?>
                <?php for($j = 0; $j < 5; $j++) : ?>
                    <td><?= "$i, $j"; ?></td>
              <?php endfor; ?>
            </tr>
        <?php endfor; ?> // ":" & "endfor;" untuk pengganti "{" & "}"
    </table>

    <h3>Penggunaan FUnction</h3>
    <?php
        echo date("l")
    ?>

</body>
</html>
