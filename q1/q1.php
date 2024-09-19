<!--
    Name: Jana Ysabelle San Pedro Choa 
    Email: janachoa.2022
-->
<!DOCTYPE html>
<html>

<head>
    <title>Q1</title>
</head>

<body>
    <?php
    // DO NOT MODIFY THE FOLLOWING CODE
    // The 2 arrays given below can be interpreted as:
        // Adult ticket price for Bird Paradise is $48
        // Adult ticket price for Night Safari is $55
        // Adult ticket price for River Wonders is $42
        // Child ticket price for Bird Paradise is $33
        // Child ticket price for Night Safari is $38
        // Child ticket price for River Wonders is $30
        $adult_ticket_prices = [48, 55, 42];
        $child_ticket_prices = [33, 38, 30];
        // END OF DO NOT MODIFY THE FOLLOWING CODE

    // YOUR CODE GOES HERE
    $attraction_idx = [
        "Bird Paradise" => 0,
        "Night Safari" => 1,
        "River Wonders" => 2
    ];

    // var_dump($_GET);
    $attraction = $_GET['attraction'];
    $adult_qty = $_GET['adult_ticket_qty'];
    $child_qty = $_GET['child_ticket_qty'];


    if ($adult_qty == 0 && $child_qty == 0) {
        echo "Sorry, both adult and child ticket quantity cannot be 0";
    } else {
        echo "<h2>Attraction Ticket Confirmation</h2>";
        echo "<table border='1'>
        <tr>
            <th>Attraction selected:</th>
            <td>$attraction</td>
        </tr>";

        $total_cost = 0;

        if ($adult_qty != 0) {
            $adult_price = $adult_ticket_prices[$attraction_idx[$attraction]];
            $adult_total = ($adult_price * $adult_qty);
            $total_cost += $adult_total;
            echo "<tr>
            <th>Adult ticket amount:</th>
            <td>$adult_qty x $$adult_price</td>
            </tr>";
        }
        if ($child_qty != 0) {
            $child_price = $child_ticket_prices[$attraction_idx[$attraction]];
            $child_total = ($child_price * $child_qty);
            $total_cost += $child_total;

            echo "<tr>
            <th>Child ticket amount:</th>
            <td>$child_qty x $$child_price</td>
            </tr>";
        }

        echo "<tr>
                <th>Total Amount:</th>
                <td>$$total_cost</td>
            </tr>
        </table>";
        



    }

    
    ?>
    
        
        

</body>
</html>