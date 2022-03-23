<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello world</title>
</head>

<body>
    <h1>Hello there</h1>
    <p><?php echo 'We are running PHP, version: ' . phpversion(); ?></p>
    <?
    $database = "php_database";
    $user = "root";
    $password = "p@ssword123";
    $host = "mysql";

    $connection = new PDO("mysql:host={$host};charset=utf8", $user, $password);
    $query = $connection->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_TYPE='BASE TABLE'");
    $tables = $query->fetchAll(PDO::FETCH_COLUMN);

    if (empty($tables)) {
        echo "<p>There are no tables in database \"{$database}\".</p>";
    } else {
        echo "<p>Database \"{$database}\" has the following tables:</p>";
        echo "<ul>";
        foreach ($tables as $table) {
            echo "<li>{$table}</li>";
        }
        echo "</ul>";
    }
    ?>
</body>

</html>