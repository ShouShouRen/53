const template1 = document.querySelector('#template1');
const template2 = document.querySelector('#template2');
const template3 = document.querySelector('#template3');
const template4 = document.querySelector('#template4');
const preview = document.querySelector('#preview');


const template1HTML = `
<div class="row pt-2 justify-content-center">
    <div class="col-6 d-flex" style="min-height: 300px">
        <div class="col-6 h-100 bg-back p-3">
            <div class="bg-1 w-100 h-75 d-flex align-items-center justify-content-center text-light">
            <!-- <p>圖片</p> -->
            </div>
            <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結</div>
        </div>
        <div class="col-6 h-100 bg-back p-3">
            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱</div>
            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介</div>
            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期</div>
            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用</div>
        </div>
    </div>
</div>
`;
const template2HTML = `
<div class="row pt-2 justify-content-center">
    <div class="col-6 d-flex" style="min-height: 300px">
        <div class="col-6 h-100 bg-back p-3">
            <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">商品名稱</div>
                <div class="bg-2 w-100 h-75 d-flex align-items-center justify-content-center text-light">
                    <!-- <p>圖片</p> -->
            </div>
        </div>
        <div class="col-6 h-100 bg-back p-3">
            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用</div>
            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介</div>
            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期</div>
            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">相關連結</div>
        </div>
    </div>
</div>
`;

const template3HTML = `
<div class="row pt-2 justify-content-center">
    <div class="col-6 d-flex" style="min-height: 300px">
        <div class="col-6 h-100 bg-back p-3">
            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱</div>
            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介</div>
            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期</div>
            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用</div>
        </div>
        <div class="col-6 h-100 bg-back p-3">
            <div class="bg-1 w-100 h-75 d-flex align-items-center justify-content-center text-light">
            <!-- <p>圖片</p> -->
            </div>
            <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結</div>
        </div>
    </div>
</div>
`;

const template4HTML = `
<div class="row pt-2 justify-content-center">
    <div class="col-6 d-flex" style="min-height: 300px">
        <div class="col-6 h-100 bg-back p-3">
            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用</div>
            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介</div>
            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期</div>
            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱</div>
        </div>
    </div>
    <div class="col-6 h-100 bg-back p-3">
        <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">相關連結</div>
        <div class="bg-2 w-100 h-75 d-flex align-items-center justify-content-center text-light">
        <!-- <p>圖片</p> -->
        </div>
    </div>
</div>
`;

template1.addEventListener('change', () => {
    if (template1.checked) {
        preview.innerHTML = template1HTML;
    }
});

template2.addEventListener('change', () => {
    if (template2.checked) {
        preview.innerHTML = template2HTML;
    }
});

template3.addEventListener('change', () => {
    if (template3.checked) {
        preview.innerHTML = template3HTML;
    }
});

template4.addEventListener('change', () => {
    if (template4.checked) {
        preview.innerHTML = template4HTML;
    }
});


const form = document.querySelector('form');
const product_name = document.querySelector('input[name="product_name"]');
const product_des = document.querySelector('textarea[name="product_des"]');
const time = document.querySelector('input[name="time"]');
const images = document.querySelector('input[name="images"]');
const price = document.querySelector('input[name="price"]');
const links = document.querySelector('input[name="links"]');
const submitBtn = document.querySelector('input[type="submit"]');

// submitBtn.addEventListener('click', (e) => {
//     e.preventDefault(); // 防止表單提交
//     // 創建一個變量來儲存您選擇的模板
//     let template = template1HTML;
//     // 您可以根據需要更改模板
//     // if (condition) {
//     //   template = template2HTML;
//     // }

//     // 獲取表單元素中的值
//     const product_name_val = product_name.value;
//     const product_des_val = product_des.value;
//     const time_val = time.value;
//     const images_val = images.value;
//     const price_val = price.value;
//     const links_val = links.value;

//     // 將值插入到選擇的模板中
//     template = template.replace('商品名稱', product_name_val);
//     template = template.replace('商品簡介', product_des_val);
//     template = template.replace('發布日期', time_val);
//     template = template.replace('圖片', images_val);
//     template = template.replace('費用', price_val);
//     template = template.replace('相關連結', links_val);

//     // 在預覽區域顯示模板
//     preview.innerHTML = template;
// });

// const nameInput = document.querySelector('#name');
// const introInput = document.querySelector('#intro');
// const dateInput = document.querySelector('#date');
// const costInput = document.querySelector('#cost');
// const imgInput = document.querySelector('#img');
// const linkInput = document.querySelector('#link');

// 定義模板和對應的 HTML 內容
// const templates = [
//     { element: template1, html: template1HTML },
//     { element: template2, html: template2HTML },
//     { element: template3, html: template3HTML },
//     { element: template4, html: template4HTML }
// ];

// // 綁定點擊事件，更新預覽區域的內容
// templates.forEach((template) => {
//     template.element.addEventListener('click', (e) => {
//         // 替換模板中的資料
//         const previewHTML = template.html
//             .replace('商品名稱', nameInput.value)
//             .replace('商品簡介', introInput.value)
//             .replace('發布日期', dateInput.value)
//             .replace('費用', costInput.value)
//             .replace('圖片', `<img src="${imgInput.value}" alt="${nameInput.value}">`)
//             .replace('相關連結', `<a href="${linkInput.value}">${linkInput.value}</a>`);

//         // 更新預覽區域的內容
//         e.preventDefault(); // 防止表單提交

//         preview.innerHTML = previewHTML;
//     });
// });

// 假設使用者已經預先填寫了欄位，觸發預覽更新事件
// template1.click();




const templates = [
    { element: template1, html: template1HTML },
    { element: template2, html: template2HTML },
    { element: template3, html: template3HTML },
    { element: template4, html: template4HTML }
];

submitBtn.addEventListener('click', (e) => {
    e.preventDefault(); // 防止表單提交
    templates.forEach((template) => {
        if (template.element.checked) {
            const previewHTML = template.html
                .replace('商品名稱', product_name.value)
                .replace('商品簡介', product_des.value)
                .replace('發布日期', time.value)
                .replace('費用', price.value)
                .replace('圖片', `<img src="${images.value}" alt="${product_name.value}" class="img-fluid">`)
                .replace('相關連結', `<a href="${links.value}">${links.value}</a>`);
            preview.innerHTML = previewHTML;
        }
    });
});
