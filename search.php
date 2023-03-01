<?php
require_once("pdo.php");
$search = isset($_POST['search']) ? $_POST['search'] : '';
$min_price = isset($_POST['min_price']) ? $_POST['min_price'] : 0;
$max_price = isset($_POST['max_price']) ? $_POST['max_price'] : 100000;

// 使用 PDO 預處理語句
$sql = "SELECT * FROM `products` WHERE `product_name` LIKE :search AND `price` BETWEEN :min_price AND :max_price ORDER BY `id` DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
$stmt->bindValue(':min_price', $min_price, PDO::PARAM_INT);
$stmt->bindValue(':max_price', $max_price, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 處理查詢結果
if (count($result) > 0) {
    // 顯示商品列表
    echo '<?php foreach ($result as $row) { ?>
        <?php if ($row["template"] == 1) { ?>
            <div class="col-6 d-flex mt-4" style="min-height: 300px">
                <div class="col-6 h-100 bg-back p-3">
                    <img src="./images/<?php echo $row["images"]; ?>" class="w-100 h-75" alt="">
                    <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                </div>
                <div class="col-6 h-100 bg-back p-3">
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱:<?php echo $row["product_name"]; ?></div>
                    <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:<?php echo $row["product_des"]; ?></div>
                    <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:<?php echo $row["time"]; ?></div>
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:<?php echo $row["price"]; ?> 元</div>
                </div>
            </div>
        <?php } else if ($row["template"] == 2) { ?>
            <div class="col-6 d-flex mt-4" style="min-height: 300px">
                <div class="col-6 h-100 bg-back p-3">
                    <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">商品名稱:<?php echo $row["product_name"]; ?></div>
                    <img src="./images/<?php echo $row["images"]; ?>" class="w-100 h-75" alt="">
                </div>
                <div class="col-6 h-100 bg-back p-3">
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:<?php echo $row["price"]; ?> 元</div>
                    <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:<?php echo $row["product_des"]; ?></div>
                    <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:<?php echo $row["time"]; ?></div>
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                </div>
            </div>
        <?php } else if ($row["template"] == 3) { ?>
            <div class="col-6 d-flex mt-4" style="min-height: 300px">
                <div class="col-6 h-100 bg-back p-3">
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱:<?php echo $row["product_name"]; ?></div>
                    <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:<?php echo $row["product_des"]; ?></div>
                    <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:<?php echo $row["time"]; ?></div>
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:<?php echo $row["price"]; ?> 元</div>
                </div>
                <div class="col-6 h-100 bg-back p-3">
                    <img src="./images/<?php echo $row["images"]
                                        ?>" class="w-100 h-75" alt="">
                    <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                </div>
            </div>
        <?php } else if ($row["template"] == 4) { ?>
            <div class="col-6 d-flex mt-4" style="min-height: 300px">
                <div class="col-6 h-100 bg-back p-3">
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:<?php echo $row["price"]; ?> 元</div>
                    <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:<?php echo $row["product_des"]; ?></div>
                    <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:<?php echo $row["time"]; ?></div>
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱:<?php echo $row["product_name"]; ?></div>
                </div>
                <div class="col-6 h-100 bg-back p-3">
                    <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">相關連結:<a href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                    <img src="./images/<?php echo $row["images"]; ?>" class="w-100 h-75" alt="">
                </div>
            </div>
        <?php } ?>
    <?php } ?>';
} else {
    // 顯示查無結果的提示
    echo '查無結果';
}
