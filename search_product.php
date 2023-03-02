<?php
require_once("pdo.php");
$sql = "SELECT * FROM products";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['search'])) {
    $keyword = $_POST['search'];
    $min_price = $_POST['min_price'];
    $max_price = $_POST['max_price'];
    if (!empty($keyword)) {
        $filtered_result = array();
        foreach ($result as $row) {
            if (strpos($row['product_name'], $keyword) !== false) {
                // if (!empty($min_price) && !empty($max_price)) {
                //     if ($row["price"] >= $min_price && $row["price"] <= $max_price) {
                //         array_push($filtered_result, $row);
                //     }
                // } else {
                //     array_push($filtered_result, $row);
                // }
                if (!empty($min_price) && !empty($max_price)) {
                    if ($row["price"] >= $min_price && $row["price"] <= $max_price) {
                        array_push($filtered_result, $row);
                    }
                } else if (!empty($min_price) && empty($max_price)) {
                    if ($row["price"] >= $min_price) {
                        array_push($filtered_result, $row);
                    }
                } else if (empty($min_price) && !empty($max_price)) {
                    if ($row["price"] <= $max_price) {
                        array_push($filtered_result, $row);
                    }
                } else {
                    array_push($filtered_result, $row);
                }  
            }
        }
        $html = "";
        foreach ($filtered_result as $row) {
            if ($row["template"] == 1) {
                $html .= '<div class="col-6 d-flex mt-4" style="min-height: 300px">
                <div class="col-6 h-100 bg-white p-3">
                    <img src="./images/' . $row["images"] . '" class="w-100 h-75" alt="">
                    <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a href="' . $row["links"] . '">' . $row["links"] . '</a></div>
                </div>
                <div class="col-6 h-100 bg-white p-3">
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱:' . $row["product_name"] . '</div>
                    <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:' . $row["product_des"] . '</div>
                    <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:' . $row["time"] . '</div>
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:' . $row["price"] . ' 元</div>
                </div>
            </div>';
            } else if ($row["template"] == 2) {
                $html .= '<div class="col-6 d-flex mt-4" style="min-height: 300px">
                <div class="col-6 h-100 bg-white p-3">
                    <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">商品名稱:' . $row["product_name"] . '</div>
                    <img src="./images/' . $row["images"] . '" class="w-100 h-75" alt="">
                </div>
                <div class="col-6 h-100 bg-white p-3">
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:' . $row["price"] . ' 元</div>
                    <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:' . $row["product_des"] . '</div>
                    <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:' . $row["time"] . '</div>
                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a href="' . $row["links"] . '">' . $row["links"] . '</a></div>
                </div>
            </div>';
            } else if ($row["template"] == 3) {
                $html .= '<div class="col-6 d-flex mt-4" style="min-height: 300px">
                    <div class="col-6 h-100 bg-white p-3">
                        <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱:' . $row["product_name"] . '</div>
                        <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:' . $row["product_des"] . '</div>
                        <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:' . $row["time"] . '</div>
                        <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:' . $row["price"] . '元</div>
                    </div>
                    <div class="col-6 h-100 bg-white p-3">
                        <img src="./images/' . $row["images"] . '" class="w-100 h-75" alt="">
                        <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a href="' . $row["links"] . '">' . $row["links"] . '</a></div>
                    </div>
                </div>';
            } else if ($row["template"] == 4) {
                $html .= '<div class="col-6 d-flex mt-4" style="min-height: 300px">
                    <div class="col-6 h-100 bg-white p-3">
                        <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:' . $row["price"] . '元</div>
                        <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:' . $row["product_des"] . '</div>
                        <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:' . $row["time"] . '</div>
                        <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱:' . $row["product_name"] . '</div>
                    </div>
                    <div class="col-6 h-100 bg-white p-3">
                        <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a href="' . $row["links"] . '">' . $row["links"] . '</a></div>
                        <img src="./images/' . $row["images"] . '" class="w-100 h-75" alt="">
                    </div>
                </div>';
            }
        }
        echo $html;
    }
}
