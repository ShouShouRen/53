const template1 = document.querySelector('#template1');
const template2 = document.querySelector('#template2');
const template3 = document.querySelector('#template3');
const template4 = document.querySelector('#template4');
const preview = document.querySelector('#preview');


const template1HTML = `
<div class="row pt-2 justify-content-center">
    <div class="col-6 d-flex" style="min-height: 300px">
        <div class="col-6 h-100 bg-back p-3">
            <!-- <div class="bg-1 w-100 h-75 d-flex align-items-center justify-content-center text-light"> 
            </div>-->
            {img}
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


const templates = [
    { element: template1, html: template1HTML },
    { element: template2, html: template2HTML },
    { element: template3, html: template3HTML },
    { element: template4, html: template4HTML }
];

submitBtn.addEventListener('click', (e) => {
    e.preventDefault();
    templates.forEach((template) => {
        if (template.element.checked) {
            const previewHTML = template.html
                .replace('商品名稱', product_name.value)
                .replace('商品簡介', product_des.value)
                .replace('發布日期', time.value)
                .replace('費用', price.value)
                .replace('{img}', `<img src="${images.value}" alt="${product_name.value}" class=" w-100 h-75">`)
                .replace('相關連結', `<a href="${links.value}">${links.value}</a>`);
            preview.innerHTML = previewHTML;
        }
    });
});
