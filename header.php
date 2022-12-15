function dbConect()
{
$dsn = 'mysql:dbname=card;host=localhost';
$user = 'card_officer';
$pass = 'card';

try {
$dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
echo 'エラー:' . $e->getMessage();
exit();
}
return $dbh;
}