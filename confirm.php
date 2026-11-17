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

// 未入力チェック
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

// HTML特殊文字をエスケープ
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$companyName = htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$age = htmlspecialchars($age, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>お問い合わせフォーム - 確認画面</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>お問い合わせフォーム</h1>
    </header>

    <main>

        <section class="content">

            <h2>お問い合わせフォーム - 確認画面</h2>

            <table>
                <tr>
                    <th>お名前</th>
                    <td><?php echo $name; ?></td>
                </tr>

                <tr>
                    <th>会社名</th>
                    <td><?php echo $companyName; ?></td>
                </tr>

                <tr>
                    <th>メールアドレス</th>
                    <td><?php echo $email; ?></td>
                </tr>

                <tr>
                    <th>年齢</th>
                    <td><?php echo $age; ?></td>
                </tr>

                <tr>
                    <th>お問い合わせ内容</th>
                    <td><?php echo nl2br($message); ?></td>
                </tr>
            </table>

            <form action="send.php" method="post">

                <input type="hidden" name="name" value="<?php echo $name; ?>">
                <input type="hidden" name="companyName" value="<?php echo $companyName; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="age" value="<?php echo $age; ?>">
                <input type="hidden" name="message" value="<?php echo $message; ?>">

                <button type="button" onclick="history.back()">戻る</button>
                <button type="submit">送信</button>

            </form>

        </section>


        <aside>

            <ul>
                <li><a href="#">トップページ</a></li>
                <li><a href="#">人気投稿</a></li>
                <li><a href="#">エンジニアおすすめ商品</a></li>
                <li><a href="#">エンジニアおすすめ記事</a></li>
                <li><a href="#">投稿ページ</a></li>
            </ul>

        </aside>

    </main>

</body>

</html>