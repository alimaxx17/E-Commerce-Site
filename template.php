<!-- Mahamed Ali -->
<?php

// search form
echo "<form role='search' action='search.php'>";
    echo "<div class='input-group col-md-2 pull-left margin-right-1em'>";
        $search_value=isset($search_term) ? "value='{$search_term}'" : "";
        echo "<input type='text' class='form-control' placeholder='Type product name' name='s' id='srch-term' required {$search_value} />";
        echo "<div class='input-group-btn'>";
            echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
        echo "</div>";
    echo "</div>";
echo "</form>";

if($total_rows>0){

    echo "<table class='table table-striped table-bordered table-hover table-condensed'>";
        echo "<tr>";
            echo "<th>Product</th>";
            echo "<th>Price</th>";
        echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>{$price}</td>";
                echo "</td>";

                echo "<td>";

                    // add to cart button
                    echo "<a href='addcart.php?id={$id}' class='btn btn-danger left-margin'>";
                        echo "<span class='glyphicon glyphicon-cart'></span> Add to Cart";
                    echo "</a>";

                echo "</td>";

            echo "</tr>";

        }

    echo "</table>";
}
?>
