<?php
// Reads the variables sent via POST
$sessionId   = $_POST["sessionId"];  
$serviceCode = $_POST["serviceCode"];  
$text = $_POST["text"];  // The user's input, reflecting the menu navigation

// Initialize the response variable
$response = "";
$menuPath = explode('*', $text);
    $lastMenu = end($menuPath);
    if ($lastMenu == "#") {
        // echo "back";
    }
// Check the user's input to determine which menu to display or action to take
if ($text == "") {
    // First menu: Welcome message and options
    $response = "CON Hi welcome, I can help you with Event Reservation \n";
    $response .= "1. Enter 1 to continue";
    $response .= "0. Exit";

}
 elseif ($text == "1") {
    // Second menu: Choose table size
    $response = "CON Pick a table for reservation below \n";
    $response .= "1. Table for 2 \n";
    $response .= "2. Table for 4 \n";
    $response .= "3. Table for 6 \n";
    $response .= "4. Table for 8 \n";
} 
elseif (strpos($text, "1*") === 0) {
    // Extract the menu level from the text to determine how to handle the back navigation
    $menuPath = explode('*', $text);
    $lastMenu = end($menuPath);

    // Handling back navigation at various menu levels
    if ($lastMenu == "#") {

        // Remove the last menu level from the path to go back
        $poped= array_pop($menuPath);
        $text = implode('*', $menuPath);
        echo $poped;
        echo  $text;

        }

    if ($text == "1") {
        $response = "CON Pick a table for reservation below you are in option 1\n";
        $response .= "1. Table for 2 \n";
        $response .= "2. Table for 4 \n";
        $response .= "3. Table for 6 \n";
        $response .= "4. Table for 8 \n";
    } elseif ($text == "1*1") {
        $response = "CON You are about to book a table for 2 you are in option 2\n";
        $response .= "Please Enter 1 to confirm \n";
        $response .= "0 to cancel \n";
        $response .= "# to go back";
    } elseif ($text == "1*1*1") {
        $response = "CON Table for 2 costs -N- 50,000.00 you are in option 3\n";
        $response .= "Enter 1 to continue \n";
        $response .= "0 to cancel \n";
        $response .= "# to go back";
    } elseif ($text == "1*1*1*1") {
        $response = "END Your Table reservation for 2 has been booked";
    } elseif ($text == "1*1*1*0") {
        $response = "END Your Table reservation for 2 has been canceled";
    } elseif ($text == "1*2") {
        $response = "CON You are about to book a table for 4 \n";
        $response .= "Please Enter 1 to confirm \n";
        $response .= "0 to cancel \n";
        $response .= "# to go back";
    } elseif ($text == "1*2*1") {
        $response = "CON Table for 4 costs -N- 150,000.00 \n";
        $response .= "Enter 1 to continue \n";
        $response .= "0 to cancel \n";
        $response .= "# to go back";
    } elseif ($text == "1*2*1*1") {
        $response = "END Your Table reservation for 4 has been booked";
    } elseif ($text == "1*2*1*0") {
        $response = "END Your Table reservation for 4 has been canceled";
    } elseif ($text == "1*3") {
        $response = "CON You are about to book a table for 6 \n";
        $response .= "Please Enter 1 to confirm \n";
        $response .= "0 to cancel \n";
        $response .= "# to go back";
    } elseif ($text == "1*3*1") {
        $response = "CON Table for 6 costs -N- 250,000.00 \n";
        $response .= "Enter 1 to continue \n";
        $response .= "0 to cancel \n";
        $response .= "# to go back";
    } elseif ($text == "1*3*1*1") {
        $response = "END Your Table reservation for 6 has been booked";
    } elseif ($text == "1*3*1*0") {
        $response = "END Your Table reservation for 6 has been canceled";
    } elseif ($text == "1*4") {
        $response = "CON You are about to book a table for 8 \n";
        $response .= "Please Enter 1 to confirm \n";
        $response .= "0 to cancel \n";
        $response .= "# to go back";
    } elseif ($text == "1*4*1") {
        $response = "CON Table for 8 costs -N- 250,000.00 \n";
        $response .= "Enter 1 to continue \n";
        $response .= "0 to cancel \n";
        $response .= "# to go back";
    } elseif ($text == "1*4*1*1") {
        $response = "END Your Table reservation for 8 has been booked";
    } elseif ($text == "1*4*1*0") {
        $response = "END Your Table reservation for 8 has been canceled";
    } else {
        // Handle unexpected input
        $response = "END Invalid input. Please try again.";
    }
} 
// else {
//     // Handle unexpected input
//     $response = "END Invalid input. Please try again.";
// }

// Output the response
header('Content-type: text/plain');
echo $response;
?>