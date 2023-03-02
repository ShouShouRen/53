$(document).ready(function () {
    $('#search-form').submit(function (event) {
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
                let search_res = $('#search-results');
                search_res.html(response);
                if (search_res.children().length == 1) {
                    search_res.children().addClass('col-12');
                    search_res.children().removeClass('col-6');
                } else if (search_res.children().length == 0) {
                    search_res.append("<div class='d-center text-center text-white h1'>查無資料</div>");
                    setTimeout(function () { window.location.reload(); }, 2500);
                }
            }
        });
    });
});
