<?php
// require_once("pdo.php");
// $sql = "SELECT * FROM users";
// $stmt = $pdo->prepare($sql);
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// if (isset($_POST['search'])) {
//     $keyword = $_POST['search'];
//     $filtered_result = array();
//     if (!empty($keyword)) {
//         foreach ($result as $row) {
//             if (strpos($row['user'], $keyword) !== false) {
//                 array_push($filtered_result, $row);
//             }
//         }
//         $html = "";
//         foreach ($filtered_result as $row) {
//             $html .= '<tr>
//                 <td>' . $row["user_id"] . '</td>
//                 <td>' . $row["user"] . '</td>
//                 <td>' . $row["pw"] . '</td>
//                 <td>' . $row["user_name"] . '</td>
//                 <td>';
//             switch ($row["role"]) {
//                 case 0:
//                     $html .= "管理員";
//                     break;
//                 case 1:
//                     $html .= "一般使用者";
//                     break;
//             }
//             $html .= '</td>
//                 <td>';
//             if ($row["id"] == 1) {
//                 $html .= '<!-- 隱藏切換權限的連結 -->';
//             } elseif ($row["id"] == $_SESSION["AUTH"]["id"]) {
//                 $html .= '<span class="text-secondary">切換權限</span>';
//             } else {
//                 $html .= '<a class="btn btn-outline-secondary" href="switch_role.php?role=' . $row["role"] . '&id=' . $row["id"] . '">權限修改</a>';
//             }
//             if ($row["id"] == 1) {
//                 $html .= '<!-- 隱藏修改的連結 -->';
//             } else {
//                 $html .= '<button class="btn btn-outline-secondary btn-edit" data-id="' . $row["id"] . '" data-toggle="modal" data-target="#edit">修改</button>';
//                 $html .= '<a class="btn btn-outline-danger" href="delete_member.php?id=' . $row["id"] . '" onclick="return confirm(\'確定要刪除?\')">刪除</a>';
//                 $html .= '<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true"></div>';
//             }
//             $html .= '</td>
//             </tr>';
//         }
//         echo $html;
//     }
// }

require_once("pdo.php");
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$result_html = ''; // 初始化 $result_html 變數

if (isset($_POST['search'])) {
    $keyword = $_POST['search'];
    $filtered_result = array();
    if (!empty($keyword)) {
        foreach ($result as $row) {
            if (strpos($row['user'], $keyword) !== false) {
                array_push($filtered_result, $row);
            }
        }
        $html = "";
        foreach ($filtered_result as $row) {
            $html .= '<tr>
                <td>' . $row["user_id"] . '</td>
                <td>' . $row["user"] . '</td>
                <td>' . $row["pw"] . '</td>
                <td>' . $row["user_name"] . '</td>
                <td>';
            switch ($row["role"]) {
                case 0:
                    $html .= "管理員";
                    break;
                case 1:
                    $html .= "一般使用者";
                    break;
            }
            $html .= '</td>
                <td>';
            if ($row["id"] == 1) {
                $html .= '<!-- 隱藏切換權限的連結 -->';
            } elseif ($row["id"] == $_SESSION["AUTH"]["id"]) {
                $html .= '<span class="text-secondary">切換權限</span>';
            } else {
                $html .= '<a class="btn btn-outline-secondary" href="switch_role.php?role=' . $row["role"] . '&id=' . $row["id"] . '">權限修改</a>';
            }
            if ($row["id"] == 1) {
                $html .= '<!-- 隱藏修改的連結 -->';
            } else {
                $html .= '<button class="btn btn-outline-secondary btn-edit" data-id="' . $row["id"] . '" data-toggle="modal" data-target="#edit">修改</button>';
                $html .= '<a class="btn btn-outline-danger" href="delete_member.php?id=' . $row["id"] . '" onclick="return confirm(\'確定要刪除?\')">刪除</a>';
                $html .= '<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true"></div>';
            }
            $html .= '</td>
            </tr>';
        }
        $result_html = $html; // 賦值給 PHP 變數
    }
}

echo $result_html; // 將 PHP 變數返回給客戶端
