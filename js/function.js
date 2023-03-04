$(function () {
    function check() {
        // 儲存目前選擇的兩個單元格的索引
        let selectedCells = [null, null];

        // 綁定 td 元素的 click 事件
        $("td").click(function () {
            // 取得被點擊單元格的索引
            let index = $(this).data("id") - 1;
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
                let selectedCellIndex = selectedCells.indexOf(index);
                if (selectedCellIndex !== -1) {
                    selectedCells[selectedCellIndex] = null;
                    $(this).removeClass("selected");
                }
            }
        });

        // 綁定驗證按鈕的 click 事件
        $("#validate").click(function () {
            let selectedCell1 = selectedCells[0];
            let selectedCell2 = selectedCells[1];
            if (selectedCell1 !== null && selectedCell2 !== null) {
                // 計算兩個選擇的單元格所在的列、行位置
                let row1 = Math.floor(selectedCell1 / 2);
                console.log(row1);
                let col1 = selectedCell1 % 2;
                console.log(col1);
                let row2 = Math.floor(selectedCell2 / 2);
                let col2 = selectedCell2 % 2;
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
    }
    check();

    function recaptcha() {
        $.getJSON("make_pic.php", (captcha) => {
            $("#pics").html("");
            $("#captcha").html("");
            $.each(captcha.captcha, (key, pic) => {
                $("#pics").append(`<img src='${pic}' data-key='${key}' class='pic'>`)
            });
            captcha.ans.forEach(a => {
                $("#captcha").append(`<span class='ans-area'>${a}</span>`)
            });
            let drag;
            $(".pic").on({
                'dragstart': (e) => {
                    drag = e.target
                }
            })
            $(".ans-area").on({
                "drop": (e) => {
                    $(e.currentTarget).html($(drag).clone())
                },
                "dragover": (e) => {
                    e.preventDefault();
                }
            })
        })
    }
    recaptcha();

    $(".btn-edit").click(function () {
        let member_id = $(this).data('id');
        $.ajax({
            url: 'get_member.php',
            type: 'GET',
            data: {
                id: member_id
            },
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                $("#user").val(response[0].user);
                $("#user_name").val(response[0].user_name);
                $("#pw").val(response[0].pw);
                $("#id").val(response[0].id);
                $("#edit").modal('show');
            }
        });
    });

    $("#save").click(function () {
        let user = $("#user").val();
        let user_name = $("#user_name").val();
        let pw = $("#pw").val();
        let id = $("#id").val();

        let data = {
            user: user,
            user_name: user_name,
            pw: pw,
            id: id
        };
        $.ajax({
            url: "save_member.php",
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json",
            success: function (response) {
                // console.log('Success: ' + response);
                alert('儲存成功');
                window.location.reload();
            }
        });
    });

    $('#search-member').submit(function (event) {
        event.preventDefault();
        let search = $('#search-input').val();
        $.ajax({
            url: 'search_member.php',
            type: 'post',
            data: {
                search: search
            },
            success: function (response) {
                console.log(response);
                $('#search_result').html(response);
                $('.show-all').addClass('d-none');
            },
            error: function () {
                alert('搜尋失敗');
            }
        });
    });

    $('#search-product').submit(function (event) {
        event.preventDefault();
        let search = $('#search-input').val();
        let minPrice = $('#min-price-input').val();
        let maxPrice = $('#max-price-input').val();

        $.ajax({
            url: 'search_product.php',
            type: 'post',
            data: {
                search: search,
                min_price: minPrice,
                max_price: maxPrice
            },
            success: function (response) {
                console.log(response);
                let search_res = $('#search-results');
                search_res.html(response);
                if (search_res.children().length == 1) {
                    search_res.children().addClass('col-12');
                    search_res.children().removeClass('col-6');
                }
                else if (search_res.children().length == 0) {
                    search_res.append("<div class='d-center text-center text-white h1'>查無資料</div>");
                    setTimeout(function () { window.location.reload(); }, 2500);
                }
            }
        });
    });

   
});