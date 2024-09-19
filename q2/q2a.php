<!--
    Name: Jana Ysabelle San Pedro Choa 
    Email: janachoa.2022
-->
<!DOCTYPE html>
<html>

<head>
    <title>Q2a</title>
</head>

<body>
    <?php
    // DO NOT MODIFY THE FOLLOWING CODE
    $tingkat_menu = [
        'Monday' => ['ABC Soup', 'Lemongrass Chicken', 'Fried Bean Curd', 'Steam Egg'],
        'Tuesday' => ['Meat Ball Soup', 'Coffee Chicken', 'Stir-Fried Hairy Gourd', 'Fried Ngor Hiang'],
        'Wednesday' => ['Fish Fillet Soup', 'Pork Chop', 'Stir-Fried Choy Sum', 'Fried Wanton'],
        'Thursday' => ['Chicken Soup', 'Sweer & Sour Fish', 'Stir-Fried Eggplant', 'Steamed Siew Mai'],
        'Friday' => ['Tomato Soup', 'Sambal Sliced Fish', 'Stir-Fried French Bean', 'Fried Prawn Roll'],
    ];
    ?>

    <table border='1'>
        <tr>
            <th colspan='5'><h3>Weekdays Tingkat Meals Menu</h3></th>     
        </tr>
    <!-- END OF DO NOT MODIFY THE FOLLOWING CODE -->
    <?php
        // YOUR CODE GOES HERE
        foreach ($tingkat_menu as $day=>$menu) {
            echo "<tr><th>$day</th>";
            foreach ($menu as $item) {
                echo "<td>$item</td>";
            }

            echo "</tr>";

        }





        // YOUR CODE ENDS HERE
    ?>
    </table>
</body>
</html>