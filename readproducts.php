<?php

if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
}

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

    echo "<div class='col-md-4 m-b-20px'>";

        // Product id for javascript access
        echo "<div class='product-id display-none'>{$id}</div>";

        echo "<a href='product.php?id={$id}' class='product-link'>";
            // Select and show first product image
            $product_image->product_id=$id;
            $stmt_product_image=$product_image->readFirst();

            while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='m-b-10px'>";
                    echo "<img src='uploads/images/{$row_product_image['name']}' class='img-circle'width='304' height='236'>";
                echo "</div>";
            }

            // The products name
            echo "<div class='product-name m-b-10px'>{$name}</div>";
        echo "</a>";

        // Add cart
        echo "<div class='m-b-10px'>";
            if(array_key_exists($id, $_SESSION['cart'])){
                echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
                    echo "Update Cart";
                echo "</a>";
            }else{
                echo "<a href='addcart.php?id={$id}&page={$page}' class='btn btn-primary w-100-pct'>Add to Cart</a>";
            }
        echo "</div>";

    echo "</div>";
}

include_once "paging.php";
?>
