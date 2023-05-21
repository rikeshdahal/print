<?php
$info = [
    'name' => 'Ram Bahadur',
    'address' => 'Lalitpur',
    'email' => 'info@ram.com',
    'phone' => 98454545,
    'website' => 'www.ram.com',
]; ?>

<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h2>User Information</h2>
    <table>
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        <?php foreach ($info as $key => $value) { ?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $value; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
