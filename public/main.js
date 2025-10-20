

const form = document.querySelector('.afterSubmitForm');
const btn1 = document.querySelector('.afterSubmitBtn1');
const btn2 = document.querySelector('.afterSubmitBtn2');
form.addEventListener('submit', function () {
    btn1.disabled = true;
    btn1.innerHTML = 'Loading... <span class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true"></span>';
});
form.addEventListener('submit', function () {
    btn2.disabled = true;
    btn2.innerHTML = 'Loading... <span class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true"></span>';
});