$conn = new PDO('pgsql:host=tom;port=5432;dbname=db','tli','tli');

$sql = "SELECT pathologie";
$result = $connexion->prepare($sql);
$result->execute();