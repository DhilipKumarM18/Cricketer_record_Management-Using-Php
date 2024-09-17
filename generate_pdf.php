<?php
include('dompdf/autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;

// Create an instance of Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

// Fetch data from the database
$servername = "localhost";
$username = "root";
$password = "dhilipdk18";
$database = "cricket";

$conn = new mysqli($servername, $username, $password, $database,3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM players";
$result = $conn->query($sql);

$html = '
<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Player Records</h1>
    <table>
        <tr>
            <th>Player ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Matches</th>
            <th>Runs</th>
            <th>Country</th>
        </tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $row["Jno"] . '</td>';
        $html .= '<td>' . $row["Name"] . '</td>';
        $html .= '<td>' . $row["Age"] . '</td>';
        $html .= '<td>' . $row["Matches"] . '</td>';
        $html .= '<td>' . $row["Run"] . '</td>';
        $html .= '<td>' . $row["Country"] . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr><td colspan="6">No records found.</td></tr>';
}

$html .= '
    </table>
</body>
</html>';

$conn->close();

// Load HTML content
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the PDF (output to browser or file)
$dompdf->render();

// Output the generated PDF to the browser for download
$dompdf->stream('player_records.pdf', array("Attachment" => true));
?>
