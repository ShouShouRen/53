<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 50px;
            height: 50px;
            border: 1px solid black;
            text-align: center;
            font-size: 24px;
            cursor: pointer;
        }

        td.selected {
            background-color: blue;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td data-id="1"></td>
            <td data-id="2"></td>
        </tr>
        <tr>
            <td data-id="3"></td>
            <td data-id="4"></td>
        </tr>
    </table>

    <p>請選擇兩個相鄰的格子，以連成一條水平或垂直線。</p>

    <button id="validate">驗證</button>

</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script>
    $(function() {
        // 儲存目前選擇的兩個單元格的索引
        var selectedCells = [null, null];

        // 綁定 td 元素的 click 事件
        $("td").click(function() {
            // 取得被點擊單元格的索引
            var index = $(this).data("id") - 1;
            // console.log(index);
            // 判斷是否為第一個選擇的單元格
            if (selectedCells[0] === null) {
                // 將該單元格的索引存入 selectedCells 陣列中，並且加上 .selected 樣式
                selectedCells[0] = index;
                $(this).addClass("selected");
            }
            // 判斷是否為第二個選擇的單元格
            else if (selectedCells[1] === null && index !== selectedCells[0]) {
                // 將該單元格的索引存入 selectedCells 陣列中，並且加上 .selected 樣式
                selectedCells[1] = index;
                $(this).addClass("selected");
            }
            // 如果已經選擇了兩個單元格，且現在點擊的單元格已經被選擇過，則取消該選擇
            else {
                var selectedCellIndex = selectedCells.indexOf(index);
                if (selectedCellIndex !== -1) {
                    selectedCells[selectedCellIndex] = null;
                    $(this).removeClass("selected");
                }
            }
        });

        // 綁定驗證按鈕的 click 事件
        $("#validate").click(function() {
            var selectedCell1 = selectedCells[0];
            var selectedCell2 = selectedCells[1];
            if (selectedCell1 !== null && selectedCell2 !== null) {
                // 計算兩個選擇的單元格所在的列、行位置
                var row1 = Math.floor(selectedCell1 / 2);
                console.log(row1);
                var col1 = selectedCell1 % 2;
                console.log(col1);
                var row2 = Math.floor(selectedCell2 / 2);
                var col2 = selectedCell2 % 2;
                // 判斷兩個選擇的單元格是否相鄰
                if (
                    (row1 === row2 && Math.abs(col1 - col2) === 1) ||
                    (col1 === col2 && Math.abs(row1 - row2) === 1)
                ) {
                    alert("登入成功！");
                    location.href = "index.php";
                } else {
                    alert("二次驗證錯誤！");
                    location.href = "login.php";
                }
            } else {
                alert("請選擇兩格！");
            }
        });
    });
</script>

</html>