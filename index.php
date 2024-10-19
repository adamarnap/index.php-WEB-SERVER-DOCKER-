<?php
$show = false;
$show = true;
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            /* align-items: center; */
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        .container h1 {
            font-size: 24px;
            color: #0077b6;
        }

        .container h2 {
            font-size: 20px;
            text-transform: uppercase;
            color: #333;
        }

        .container table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .container table thead {
            background-color: #0077b6;
            color: white;
        }

        .container table th {
            padding: 10px;
        }

        .container table td {
            padding: 10px;
        }

        .container table .success {
            color: #3AA655;
        }

        .container table .error {
            color: #FF0000;
        }

        .container ul {
            max-width: 900px;
            padding: 20px;
            background-color: black;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: left;
            color: orange;
            list-style: none; 
        }

        .container ul li a {
            color: orange;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .container ul li a:hover {
            color: white;
            font-size: 20px;
        }

        .icon-folder::before {
            content: "\1F4C1";
            /* Unicode karakter untuk ikon folder */
            color: #00A8E8;
            /* Warna biru muda yang sesuai dengan Docker */
            font-size: 20px;
            margin-right: 5px;
        }

        .footer {
            font-size: 14px;
            color: #777;
            margin-top: 20px;
        }

        .icon-folder::before {
            content: "\1F4C1";
            /* Unicode karakter untuk ikon folder */
            font-size: 20px;
            margin-right: 5px;
            color: #00A8E8;
            /* Warna biru muda yang sesuai dengan Docker */
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $phpVersion = PHP_VERSION;
        $server = "localhost:3306";
        $username = "root";
        $password = "";
        $database = "base_code_igniter";

        $koneksi = new mysqli($server, $username, $password, $database);
        $versiSql = $koneksi->server_info;
        $statusClass = $koneksi->connect_error ? 'error' : 'success';
        ?>

        <h1>ADAM LARAGON SERVER</h1>

        <table border="1" style="font-weight: bolder;">
            <thead>
                <tr>
                    <th>SERVICE</th>
                    <th>VERSION</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tr>
                <td>PHP APACHE</td>
                <td><?= $phpVersion ?></td>
                <td class="success">ON</td>
            </tr>
            <tr>
                <td>MYSQL</td>
                <td><?= $versiSql ?></td>
                <td class="<?= $statusClass ?>">
                    <?= $koneksi->connect_error ? 'OFF' : 'ON' ?>
                </td>
            </tr>
        </table>

        <?php
        if($show){
            $dir = './';
            $folders = array_filter(glob($dir . '/*'), 'is_dir');
            echo '<ul>';
            echo '<h2 style="color:orange;text-align:center;"><b>DAFTAR FOLDER</b></h2>';

            foreach ($folders as $folder) {
                $folderName = basename($folder);
                echo '<li> <span class="icon-folder"></span> <a href="' . $folderName . '">' . $folderName . '</a></li>';
            }
            echo '</ul>';
        }else{
            echo '<h2 style="color:red;text-align:center;"><b>403 Forbidden</b></h2>';
        }
        
        ?>

        <p class="footer">Design by Adam Arnap 2023</p>
    </div>
</body>

</html>