<?php

// POST以外で直接アクセスされた場合は入力画面へ戻す
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// POSTデータを取得
$name = $_POST['name'] ?? '';
$companyName = $_POST['companyName'] ?? '';
$email = $_POST['email'] ?? '';
$age = $_POST['age'] ?? '';
$message = $_POST['message'] ?? '';

// 未入力の場合は入力画面へ戻す
if (
    $name === '' ||
    $companyName === '' ||
    $email === '' ||
    $age === '' ||
    $message === ''
) {
    header('Location: contact.php');
    exit;
}

// メール送信先
// ↓ここを自分が受信できるメールアドレスに変更してください
$to = 'hukusi0900@gmail.com';

// 件名
$subject = 'お問い合わせがありました';

// メール本文
$mailBody =
    "名前：" . $name . "\n" .
    "会社名：" . $companyName . "\n" .
    "メールアドレス：" . $email . "\n" .
    "年齢：" . $age . "\n" .
    "お問い合わせ内容：" . $message . "\n";

// メールヘッダー
$headers = "Content-Type: text/plain; charset=UTF-8\r\n";

// メール送信
$isSent = @mail($to, $subject, $mailBody, $headers);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>お問い合わせフォーム - 送信完了画面</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <main>

        <section class="content">

            <h1>お問い合わせフォーム - 送信完了画面</h1>

            <?php if ($isSent): ?>

                <p>
                    お問い合わせが送信されました。ありがとうございます！
                </p>

            <?php else: ?>

                <p>
                    メールの送信に失敗しました。
                </p>

            <?php endif; ?>

            <p>
                <a href="contact.php">お問い合わせフォームに戻る</a>
            </p>

        </section>

    </main>

</body>

</html>