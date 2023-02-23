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
                <p>圖片</p>
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
                                        <p>圖片</p>
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
                                        <p>圖片</p>
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
    <div class="col-6 h-100 bg-back p-3">
        <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">相關連結</div>
        <div class="bg-2 w-100 h-75 d-flex align-items-center justify-content-center text-light">
            <p>圖片</p>
        </div>
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