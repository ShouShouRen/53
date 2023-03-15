$(function () {
    function check() {
        let selectedCells = [null, null];
        $("td").click(function () {
            let index = $(this).data("id") - 1;
            if (selectedCells[0] === null) {
                selectedCells[0] = index;
                $(this).addClass("selected");
            }
            else if (selectedCells[1] === null && index !== selectedCells[0]) {
                selectedCells[1] = index;
                $(this).addClass("selected");
            }
            else {
                let selectedCellIndex = selectedCells.indexOf(index);
                if (selectedCellIndex !== -1) {
                    selectedCells[selectedCellIndex] = null;
                    $(this).removeClass("selected");
                }
            }
        });
        $("#validate").click(function () {
            let selectedCell1 = selectedCells[0];
            let selectedCell2 = selectedCells[1];
            if (selectedCell1 !== null && selectedCell2 !== null) {
            
                let row1 = Math.floor(selectedCell1 / 2);
                console.log(row1);
                let col1 = selectedCell1 % 2;
                console.log(col1);
                let row2 = Math.floor(selectedCell2 / 2);
                let col2 = selectedCell2 % 2;
            
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
                    search_res.children().addClass('col-10');
                    search_res.children().removeClass('col-6');
                }
                else if (search_res.children().length == 0) {
                    search_res.append("<div class='d-center text-center text-white h1'>查無資料</div>");
                    setTimeout(function () { window.location.reload(); }, 2500);
                }
            }
        });
    });


    $(".edit-product").click(function () {
        let product_id = $(this).data('id');
        $.ajax({
            url: 'get_product.php',
            type: 'get',
            data: {
                id: product_id
            },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $("#id").val(response[0].id);
                $("#product_name").val(response[0].product_name);
                $("#product_des").val(response[0].product_des);
                $("#time").val(response[0].time);
                $("#images").val(response[0].images);
                $("#price").val(response[0].price);
                $("#links").val(response[0].links);
            }
        });
    });

    $("#save-product").click(function () {
        let product_name = $("#product_name").val();
        let product_des = $("#product_des").val();
        let time = $("#time").val();
        let price = $("#price").val();
        let links = $("#links").val();
        let images = $("#images").val();
        let id = $("#id").val();

        let data = {
            product_name: product_name,
            product_des: product_des,
            time: time,
            price: price,
            links: links,
            images: images,
            id: id
        };
        
        $.ajax({
            url: "save_product.php",
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json",
            success: function (response) {
                console.log('Success: ' + response);
                alert('儲存成功');
                window.location.reload();
            }
        });
    });

});