<?php
$servername = "localhost";
$username = "laewebdejosevicente";
$password = "laewebdejosevicente";
$dbname = "laewebdejosevicente";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM blog";
$result = mysqli_query($conn, $sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $entry = array(
            "título" => $row["título"],
            "fecha" => $row["fecha"],
            "texto" => $row["texto"]
        );
        $data["entradas"][] = $entry;
    }
    echo json_encode($data, JSON_PRETTY_PRINT);
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
