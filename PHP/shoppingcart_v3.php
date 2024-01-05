<?php
session_start();

//Mảng chứa thông tin sản phẩm
$products = array(
    array("id" => 1, "name" => "Áo Polo", "price" => 25),
    array("id"=> 2, "name"=> "Quần Jeans", "price"=> 50),
    array("id"=> 3, "name"=> "Giày Sneakers", "price" => 40)
);

// Kiểm tra nếu giỏ hàng chưa được tạo, thì tạo mới
if (isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Hàm thêm sản phẩm vào giỏ hàng
function addToCart($productId) {
    global $products;

    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            $_SESSION['cart'][] = $product;
            echo "Đã thêm " . $product['name'] . " vào giỏ hàng.";
            return;
        }
    }

    echo "Sản phẩm không tồn tại.";
}

// Hàm hiển thị giỏ hàng
function viewCart() {
    if (empty($_SESSION['cart'])) {
        echo "<p>Giỏ hàng trống.</p>";
    } else {
        echo "<h2>Giỏ hàng của bạn:</h2>";
        $totalPrice = 0;

        foreach ($_SESSION['cart'] as $item) {
            echo $item['name'] . " - $" . $item['price'] . "<br>";
            $totalPrice += $item["price"];
    }

    echo "<p><strong>Tổng giá trị: $" . $totalPrice ."</strong></p>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootsrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        h1, h2 {
            color: #007bff;
        }

        form {
            margin-bottom: 20px;
        }

        button {
            margin-top: 10px;
        }

        p {
            margin-bottom: 0;
        }
        </style>
</head>
<body>

<div class="container">
    <h1 class="mt-4">Trang mua sắm PHP</h1>

    <!-- form thêm sản phẩm vào giỏ hàng -->
    <form method="post" class="form-inline">
        <div class="form-group mr-2">
            <label for="productId">Chọn sản phẩm:</label>
            <select name="productId" id="productId" class="form-control">
                <?php
            </select>
        </div>
    </form>
</div>
</body>
</html>
