<!-- Mahamed Ali -->
<?php
// Object
class ProductImage{

    // database connection and product_images table
    private $conn;
    private $table_name = "product_images";

    // Properties
    public $id;
    public $product_id;
    public $name;
    public $timestamp;

    // Constructor
    public function __construct($db){
        $this->conn = $db;
    }

    // Read the product image related to a product
function readFirst(){

    // Select query
    $query = "SELECT id, product_id, name
            FROM " . $this->table_name . "
            WHERE product_id = ?
            ORDER BY name DESC
            LIMIT 0, 1";

    // Prepare query statement
    $stmt = $this->conn->prepare( $query );

    // Sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));

    // Bind prodcut id variable
    $stmt->bindParam(1, $this->product_id);

    // Execute query
    $stmt->execute();

    // Return values
    return $stmt;
  }

  // read all product image related to a product
  function readByProductId(){

      // select query
      $query = "SELECT id, product_id, name
              FROM " . $this->table_name . "
              WHERE product_id = ?
              ORDER BY name ASC";

      // prepare query statement
      $stmt = $this->conn->prepare( $query );

      // sanitize
      $this->product_id=htmlspecialchars(strip_tags($this->product_id));

      // bind prodcut id variable
      $stmt->bindParam(1, $this->product_id);

      // execute query
      $stmt->execute();

      // return values
      return $stmt;
  }
}
