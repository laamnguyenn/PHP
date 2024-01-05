<?php
session_start();

// Mảng chứa thông tin sản phẩm
$products = array(
    array("id" => 1, "name" => "Áo Polo", "price" => 25),
    array("id" => 2, "name" => "Quần Jeans", "price" => 50),
    array("id" => 3, "name" => "Giày Sneakers", "price" => 40)
);

// Kiểm tra nếu giỏ hàng chưa được tạo, thì tạo mới
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Hàm thêm sản phẩm vào giỏ hàng
function addToCart ($productId) {
    global $products;

    foreach ($products as $product) {
        if ($product['id'] == $productID) {
            $_SESSION['cart'][] = $product;
            echo "Đã thêm " . $product['name'] . " vào giỏ hàng.";
            return;
        }
    }

    echo "Sản phẩm không tồn tại"
}

// Hàm hiển thị giỏ hàng
function viewCart() {
    if (empty($_SESSION['cart'])) {
        echo "Giỏ hàng trống.";
    } else {
        echo "<h2>Giỏ hàng của bạn:</h2>";
        $totalPrice = 0;

        foreach ($_SESSION['cart'] as $item) {
            echo $item['name'] . " - $" . $item['price'] . "<br>";
            $totalPrice += $item["price"];
        }

        echo "<strong>Tổng giá trị: $" . $totalPrice . "</strong>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>

    <h1>Trang mua sắm PHP</h1>

    <!-- Form thêm sản phẩm vào giỏ hàng-->
    <form method="post">
        <label for="productId">Chọn sản phẩm:</label>
        <select name="productId" id="productId">
            <?php foreach ($products as $product); ?>
            <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?> - $<?php echo $product['price']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="addToCart">Thêm vào giỏ hàng</button>
    </form>

    <!-- Hiển thị giỏ hàng -->
    <?php
    if (isset($_POST['addToCart']) && isset($_POST['productID'])) {
        adddToCart($_POST['productID']);
    }
    viewCart();
    ?>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>