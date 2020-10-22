<!-- Mahamed Ali -->
<?php

// object
class Product{

    // aatabase connection and products table
    private $conn;
    private $table_name="products";

    // Properties
    public $id;
    public $name;
    public $price;
    public $description;
    public $category_id;
    public $category_name;
    public $timestamp;

    // Constructor
    public function __construct($db){
        $this->conn = $db;
    }

    function read($from_record_num, $records_per_page){

    // Select all products data
    $query = "SELECT
                id, name, description, price
            FROM
                " . $this->table_name . "
            ORDER BY
                created DESC
            LIMIT
                ?, ?";

    // Prepare query statement
    $stmt = $this->conn->prepare($query);

    // Bind limit clause variables
    $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

    // Execute query
    $stmt->execute();

    return $stmt;
}

// Used for paging products
public function count(){

    // Query to count all product records
    $query = "SELECT count(*) FROM " . $this->table_name;

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    $rows = $stmt->fetch(PDO::FETCH_NUM);

    return $rows[0];
  }

  // Read products based on products id
public function readByIds($ids){

    $ids_arr = str_repeat('?,', count($ids) - 1) . '?';

    $query = "SELECT id, name, price FROM " . $this->table_name . " WHERE id IN ({$ids_arr}) ORDER BY name";

    $stmt = $this->conn->prepare($query);

    $stmt->execute($ids);

    return $stmt;
  }

  // used when filling up the update product form
  function readOne(){

      // query to select single record
      $query = "SELECT
                  name, description, price
              FROM
                  " . $this->table_name . "
              WHERE
                  id = ?
              LIMIT
                  0,1";

      // prepare query statement
      $stmt = $this->conn->prepare( $query );

      // sanitize
      $this->id=htmlspecialchars(strip_tags($this->id));

      // bind product id value
      $stmt->bindParam(1, $this->id);

      // execute query
      $stmt->execute();

      // get row values
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // assign retrieved row value to object properties
      $this->name = $row['name'];
      $this->description = $row['description'];
      $this->price = $row['price'];
  }

  public function countAll(){

      $query = "SELECT id FROM " . $this->table_name . "";

      $stmt = $this->conn->prepare( $query );
      $stmt->execute();

      $num = $stmt->rowCount();

      return $num;
  }


  // read products by search term
public function search($search_term, $from_record_num, $records_per_page){

    // select query
    $query = "SELECT
                id, name, description, price
            FROM
                " . $this->table_name . "
            WHERE
                name LIKE ? OR description LIKE ?
            ORDER BY
                name ASC
            LIMIT
                ?, ?";

    // prepare query statement
    $stmt = $this->conn->prepare( $query );

    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->bindParam(3, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(4, $records_per_page, PDO::PARAM_INT);

    // execute query
    $stmt->execute();

    // return values from database
    return $stmt;
  }
}
