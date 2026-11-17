const form = document.getElementById('contact-form');

form.addEventListener('submit', function (event) {
    const name = document.getElementById('name').value;
    const companyName = document.getElementById('companyName').value;
    const email = document.getElementById('email').value;
    const age = document.getElementById('age').value;
    const message = document.getElementById('message').value;

    // 必須項目の未入力チェック
    if (
        name === '' ||
        companyName === '' ||
        email === '' ||
        age === '' ||
        message === ''
    ) {
        alert('必須項目が未入力です。入力内容をご確認ください。');
        event.preventDefault();
        return;
    }

    // 入力内容の確認
    const confirmMessage =
        '以下の内容で送信します。\n\n' +
        'お名前：' + name + '\n' +
        '会社名：' + companyName + '\n' +
        'メールアドレス：' + email + '\n' +
        '年齢：' + age + '\n' +
        'お問い合わせ内容：' + message;

    const result = confirm(confirmMessage);

    // キャンセルなら送信しない
    if (!result) {
        event.preventDefault();
    }
});


// footerの色変更
const footer = document.querySelector('footer');
const footerButton = document.querySelector('.footer-color-button');

const colors = ['blue', 'red', 'yellow', 'gray'];
let index = 0;

footerButton.addEventListener('click', function () {
    footer.style.backgroundColor = colors[index];

    index = (index + 1) % colors.length;
});