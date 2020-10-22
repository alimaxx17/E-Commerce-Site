<!-- Harvir Singh -->
<style>
		/* Add a black background color to the top navigation */
		.topnav {
			background-color: #333;
			overflow: hidden;
		}

		/* Style the links inside the navigation bar */
		.topnav a {
			float: left;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font: 400 18px Lato, sans-serif;
		}

		/* Change the color of links on hover */
		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		/* Add a color to the active/current link */
		.topnav a.active {
			background-color: #61977e;
			color: white;
		}

		/* Style logo */
		.logo{
			height: 18px;
		}
	</style>
<?php

// search form
echo "<form role='search' action='search.php'>";
    echo "<div class='input-group col-md-2 pull-right'>";
        $search_value=isset($search_term) ? "value='{$search_term}'" : "";
        echo "<input type='text' class='form-control' placeholder='Type product name' name='s' id='srch-term' required {$search_value} />";
        echo "<div class='input-group-btn'>";
            echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
        echo "</div>";
    echo "</div>";
echo "</form>";



?>
