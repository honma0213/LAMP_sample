<?php
$dsn = 'mysql:dbname=sample_db;host=localhost;';
$user = 'honma';
$password = 'honma0213';
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    $sql = "insert into user values (:id, :name, :age)";
    $stmt = $dbh->prepare($sql);
    $parms = array(':id' => $id, ':name' => $name, ':age' => $age);

    $result = $dbh->query($sql);

    header('Location: index.php?fg=1'):
    echo "接続成功\n";
} catch (PDOException $e) {
    //echo "接続失敗: " . $e->getMessage() . "\n";
    header('Location: index.php?fg=1?error$e->getMessage()'):
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <form class="mt-5" action="./index.php" method ="POST">
                    <div class="form-group row">
                        <label for="">ID</label>
                        <input class="form-control" type="text" name="i
                        d" id="id">
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="">Age</label>
                        <input class="form-control" type="text" name="age" id="age">
                    </div>

                    <button type="submit" class="btn btn-primary">Insert</button>
                </form>