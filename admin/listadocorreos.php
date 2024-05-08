<?php
// Directory where your XML files are located
$directory = '../formularios/';

// Get all XML files in the directory
$xmlFiles = glob($directory . '*.xml');

// Start building the table
$table = '<table border="1">';
$table .= '<tr>
        <th>Filename</th>
		<th>Y</th>
        <th>M</th>
        <th>D</th>
        <th>H</th>
        <th>M</th>
        <th>S</th>
        <th>Nombre</th>
        <th>Asunto</th>
        <th>Email</th>
        <th>Mensaje</th>
        
        <th>Ver</th>
        <th>Eliminar</th>
    </tr>';

// Loop through each XML file
foreach ($xmlFiles as $file) {
    $xml = simplexml_load_file($file);
    if ($xml) {
        $table .= '<tr>';
        // Display filename
        $table .= '<td>' . basename($file) . '</td>';
		// Get file creation time
        $creationTime = filectime($file);
        $creationDate = date('Y-m-d H:i:s', $creationTime);
        $creationYear = date('Y', $creationTime);
        $creationMonth = date('m', $creationTime);
        $creationDay = date('d', $creationTime);
        $creationHour = date('H', $creationTime);
        $creationMinute = date('i', $creationTime);
        $creationSecond = date('s', $creationTime);
        
        // Add creation time data to the table
        $table .= "<td>$creationYear</td>";
        $table .= "<td>$creationMonth</td>";
        $table .= "<td>$creationDay</td>";
        $table .= "<td>$creationHour</td>";
        $table .= "<td>$creationMinute</td>";
        $table .= "<td>$creationSecond</td>";
        // Display XML data (you can customize this part based on your XML structure)
        foreach ($xml->children() as $child) {
            $table .= "<td>".$child."</td>";
        }
        
        
        // Add view and delete links
        $table .= "<td><a href='../formularios/".basename($file)."' target='_blank'>Ver</a></td>";
        $table .= "<td><a href='eliminar.php?xml=".basename($file)."' target='_blank'>Eliminar</a></td>";
        $table .= '</tr>';
    }
}

$table .= '</table>';

// Display the table
echo $table;
?>
