<!DOCTYPE html>
<html>
<head>
    <title>Tabel Perkalian 12</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Tabel Perkalian 12</h2>

<table>
    <tr>
        <th></th>
        <?php for ($i = 1; $i <= 12; $i++) { ?>
            <th><?php echo $i; ?></th>
        <?php } ?>
    </tr>
    <?php for ($j = 1; $j <= 12; $j++) { ?>
        <tr>
            <th><?php echo $j; ?></th>
            <?php for ($k = 1; $k <= 12; $k++) { ?>
                <td><?php echo $j * $k; ?></td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>

</body>
</html>
