<?php
session_start();

// Retrieve product details from URL parameters
$product_name = isset($_GET['product_name']) ? urldecode($_GET['product_name']) : '';
$product_price = isset($_GET['product_price']) ? floatval($_GET['product_price']) : 0.0;

require('fpdf/fpdf.php');

// Include database connection
include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from the session
    $user_id = $_SESSION["id"];

    // Retrieve other form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip_code = $_POST["zip_code"];
    $card_name = $_POST["card_name"];
    $card_number = $_POST["card_number"];
    $exp_month = $_POST["exp_month"];
    $exp_year = $_POST["exp_year"];
    $cvv = $_POST["cvv"];

    // Insert data into the orders table
    $insertQuery = "INSERT INTO orders (user_id, product_name, product_price, full_name, email, address, city, state, zip_code, card_name, card_number, exp_month, exp_year, cvv)
            VALUES ('$user_id', '$product_name', '$product_price', '$full_name', '$email', '$address', '$city', '$state', '$zip_code', '$card_name', '$card_number', '$exp_month', '$exp_year', '$cvv')";

    if ($conn->query($insertQuery) === TRUE) {
        // Get the inserted order ID
        $order_id = $conn->insert_id;

        // Generate PDF
        generatePDF($order_id, $full_name, $city, $product_name, $product_price);

        echo "Order placed successfully!";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

// Function to generate PDF
function generatePDF($order_id, $full_name, $city, $product_name, $product_price) {
    // Create a PDF
    $pdf = new FPDF();

    // Add a new page
    $pdf->AddPage();

    // Set the font for the text
    $pdf->SetFont('Arial', 'B', 20);

    // Print Invoice header
    $pdf->Cell(71, 10, '', 0, 0);
    $pdf->Cell(59, 5, 'Invoice', 0, 0);
    $pdf->Cell(59, 10, '', 0, 1);

    // Print Address and Details header
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(71, 5, 'Address', 0, 0);
    $pdf->Cell(59, 5, '', 0, 0);
    $pdf->Cell(59, 5, 'Details', 0, 1);

    // Print Address details
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(130, 5, $full_name, 0, 0);
    $pdf->Cell(25, 5, 'Customer ID', 0, 0);
    $pdf->Cell(34, 5, '001', 0, 1);
    $pdf->Cell(130, 5, $city, 0, 0);
    $pdf->Cell(25, 5, 'Invoice Date:', 0, 0);
    $pdf->Cell(34, 5, date('jS M Y'), 0, 1);
    $pdf->Cell(130, 5, '', 0, 0);
    $pdf->Cell(25, 5, 'Invoice No:', 0, 0);
    $pdf->Cell(34, 5, 'ORD' . str_pad($order_id, 3, '0', STR_PAD_LEFT), 0, 1);

    // Print Bill To
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(130, 5, 'Bill To', 0, 0);
    $pdf->Cell(59, 5, "", 0, 0);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(189, 10, "", 0, 1);

    // Print table headers
    $pdf->Cell(50, 10, '', 0, 1);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(80, 6, 'Description', 1, 0, 'C');
    $pdf->Cell(23, 6, 'Qty', 1, 0, 'C*');
    $pdf->Cell(30, 6, 'Unit Price', 1, 0, 'C');
    $pdf->Cell(20, 6, 'SalesTax', 1, 0, 'C');
    $pdf->Cell(25, 6, 'Total', 1, 1, 'C');/*end of line*/

    // Print customer and payment details
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 6, $product_name, 1);
    $pdf->Cell(23, 6, '1', 1, 0, 'C*');
    $pdf->Cell(30, 6, 'Rs' . $product_price, 1, 0, 'C');
    $pdf->Cell(20, 6, 'Rs0.00', 1, 0, 'C');
    $pdf->Cell(25, 6, 'Rs' . $product_price, 1, 1, 'C');/*end of line*/

    // Output the PDF
    $pdf->Output();

    // Exit the script
    exit();
}
?>
