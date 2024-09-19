<!--
    Name: Jana Ysabelle San Pedro Choa 
    Email: janachoa.2022
-->
<!DOCTYPE html>
<html>

<head>
    <title>Q2b Process</title>
</head>

<body>
    <?php
    // DO NOT MODIFY THE FOLLOWING CODE
    $meal_price = ["Lunch" => 4.00, "Dinner" => 5.00];
    $rice_price = ["White Rice" => 0.80, "Brown Rice" => 1.00];
    // END OF DO NOT MODIFY THE FOLLOWING CODE

    // YOUR CODE GOES HERE
    // YOU MAY MODIFY OR USE THE CODE BELOW AS PART OF YOUR SOLUTION
    // var_dump($_POST);

    $person_qty = $_POST['person_qty'] ?? null;
    $meal_types = $_POST['meal_type'] ?? null;
    $rice_option = $_POST['rice_option'] ?? null;

    if (isset($_POST['submit_order'])) {
        $subtotal = $_POST['subtotal'];
        $total = number_format($subtotal * 1.09, 2);
        echo "<h3>Thank you for your order!</h3>";
        echo "Total payment of $total (with 9% gst) has been received!";

    } elseif (($person_qty == "" || $person_qty == 0)  || !isset($meal_types) || !isset($rice_option)) {
        echo "Your form is incomplete. Please fill it <a href='q2b.html'>here</a> again.";
    
    } else {

        // Meal 
        if (count($meal_types) > 1) {
            $meal_str = implode(" and ", $meal_types);
        } else {
            $meal_str = $meal_types[0];
        }
        $total_meal = 0;
        foreach ($meal_types as $meal) {
            $total_meal += $meal_price[$meal];
        }
        $total_meal_price = $total_meal * $person_qty * 5;

        // Rice
        $rice_str = $rice_option;
        $total_rice_option_price = $rice_price[$rice_option] * $person_qty * count($meal_types) * 5;

        $subtotal = $total_meal_price + $total_rice_option_price;

        echo "<form action='q2b_process.php' method='POST'>
        <table border='1'>
            <tr>
            <th colspan=2><h3>Order Summary</h3></th>
            </tr>
            <tr>
            <td>$meal_str for $person_qty pax</td>
            <td>\$$total_meal_price</td>
            </tr>
            <tr>
            <td>Rice Option: $rice_str</td>
            <td>\$$total_rice_option_price</td>
            </tr>
            <tr>
            <td>Subtotal (Price before GST)&nbsp;&nbsp;&nbsp;</td>
            <td>\$$subtotal</td>
            </tr>
        </table><br>
        <input type='hidden' name='subtotal' value='$subtotal'>
        <input type='submit' name='submit_order' value='Submit Order'>
        </form>";
    }

    
    ?>

</body>
</html>