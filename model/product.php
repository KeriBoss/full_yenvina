<?php
require_once __DIR__."/database.php";
class Product extends Database{
    function getAllProduct(){
        $sql = parent::$connection->prepare("SELECT * FROM products ORDER BY `id` DESC");
        return parent::select($sql);
    }
    function insert($name, $prices, $quantity, $sale, $thumbnail, $type){
        $sql = parent::$connection->prepare("INSERT INTO `products`(`product_name`, `prices`, `quantity`, `sale`, `thumbnail`, `type_id`, `rating`) VALUES (?, ?, ?, ?, ?, ?, 0)");
        $sql->bind_param('siiisi', $name, $prices, $quantity, $sale, $thumbnail, $type);
        return $sql->execute();
    }
    /**
     * Get product by id
     */
    function getProductById($id){
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    /**
     * Update product by id
     */
    function update($id, $name, $prices, $quantity, $sale, $thumbnail, $type){
        $sql = parent::$connection->prepare("UPDATE `products` SET `product_name`= ? ,`prices`= ? ,`quantity`= ? ,`sale`= ? ,`thumbnail`= ? ,`type_id`= ?  WHERE `id` = ?");
        $sql->bind_param('siiisii', $name, $prices, $quantity, $sale, $thumbnail, $type, $id);
        return $sql->execute();
    }
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `products` WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    /**
     * get latest products in database
     */
    function getLatestProduct($num){
        $sql = parent::$connection->prepare("SELECT * FROM products ORDER BY `id` DESC limit ?");
        $sql->bind_param('i', $num);
        return parent::select($sql);
    }
    /**
     * get latest products on sale in database
     */
    function getLatestProductSale($num){
        $sql = parent::$connection->prepare("SELECT * FROM products ORDER BY `sale` DESC limit ?");
        $sql->bind_param('i', $num);
        return parent::select($sql);
    }
    // Lấy tát cả sản phẩm theo trang
    public function getProductsByPage($perPage, $page)
    {
        $start = $perPage * ($page - 1);
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products LIMIT ?, ?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }
    // Tìm sản phẩm theo từ khóa
    public function searchProducts($keyword)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE product_name LIKE ? AND `status` = 1");
        $search = "%{$keyword}%";
        $sql->bind_param('s', $search);
        return parent::select($sql);
    }
    public function searchProductsPaging($keyword, $perPage, $page)
    {
        $start = $perPage * ($page - 1);
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE product_name LIKE ? AND `status` = 1 LIMIT ?,?");
        $search = "%{$keyword}%";
        $sql->bind_param('sii', $search, $start, $perPage);
        return parent::select($sql);
    }
    /**
     * Get all product on screen home page
     */
    function getAllProductHomepage(){
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE `status` = 1 ORDER BY `id` DESC ");
        return parent::select($sql);
    }
    // Lấy sản phẩm theo danh mục
    public function getProductsByCategory($categoryId, $perPage = null, $page = null)
    {
        if(isset($perPage, $page) && $perPage != '' && $page != ''){
            $start = $perPage * ($page - 1);
            //2. Viết câu SQL
            $sql = parent::$connection->prepare("SELECT * FROM products INNER JOIN type_product ON products.type_id = type_product.type_id WHERE type_product.type_id = ? LIMIT ?,?");
            $sql->bind_param('iii', $categoryId, $start, $perPage);
            return parent::select($sql);
        }
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products INNER JOIN type_product ON products.type_id = type_product.type_id WHERE type_product.type_id = ?");
        $sql->bind_param('i', $categoryId);
        return parent::select($sql);
    }
    /**
     * Get product sort by ascending
     */
    function getAscending( $perPage = null, $page = null){
        if( $perPage != '' && $page != ''){
            $start = $perPage * ($page - 1);
            $sql = parent::$connection->prepare("SELECT * FROM products ORDER BY `prices` ASC LIMIT ?,?");
            $sql->bind_param('ii',  $start, $perPage);
            return parent::select($sql);
        }
        $sql = parent::$connection->prepare("SELECT * FROM products ORDER BY `prices` ASC");
        return parent::select($sql);
    }
    /**
     * Get product sort by ascending
     */
    function getDescending( $perPage = null, $page = null){
        if( $perPage != '' && $page != ''){
            $start = $perPage * ($page - 1);
            $sql = parent::$connection->prepare("SELECT * FROM products ORDER BY `prices` DESC LIMIT ?,?");
            $sql->bind_param('ii',  $start, $perPage);
            return parent::select($sql);
        }
        $sql = parent::$connection->prepare("SELECT * FROM products ORDER BY `prices` DESC");
        return parent::select($sql);
    }
    /**
     * Update rating when add comment for user
     */
    function updateRating($product_id, $rating){
        $sql = parent::$connection->prepare("UPDATE `products` SET `rating` = ?  WHERE `id` = ?");
        $sql->bind_param('ii', $rating, $product_id);
        return $sql->execute();
    }
}