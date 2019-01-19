<?php
function getPosttexts($file_name) {
    if (file_exists($file_name)) {
        return file_get_contents($file_name);
    }
}

const PHPFILENAME = 'simpleBBS.php';
const TXTFILENAME = 'simpleBBS.txt';
const DELETEPW = '9999';
const HTMLSTR1 = '<h1>シンプル掲示板（ログ削除機能付き）</h1>' . "\n"
               . '<form method="post" action="' . PHPFILENAME . '">' . "\n"
               . '  <input type="text" name="posttext" size="50">' . "\n"
               . '  <input type="submit" value="送信">' . "\n"
               . '</form>' . "\n"
               . '<table border="1" width="600">' . "\n"
               . '  <col width="400">' . "\n"
               . '  <col width="200">' . "\n"
               . '  <tr><td colspan="2">' . "\n"
               . '    <form method="post" action="' . PHPFILENAME . '">' . "\n"
               . '      <input type="password" name="delpass" size="5">' . "\n"
               . '      <input type="submit" value="ログ削除">' . "\n"
               . '  </form>' . "\n"
               . '  </td></tr>' . "\n";
const HTMLSTR2 = '</table>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (@$_POST['delpass']) {
        if (htmlspecialchars($_POST['delpass']) === DELETEPW) {
            if (file_exists(TXTFILENAME)) {
                if (unlink(TXTFILENAME)) {
                    $alertmsg = 'ログを削除しました';
                } else {
                    $alertmsg = 'ログ削除に失敗しました';
                }
            } else {
                $alertmsg = '削除対象ファイルが存在しません';
            }
        } else {
            $alertmsg = 'ログ削除パスワードが一致しません';
        }
        echo '<script type="text/javascript">window.alert(\'' . $alertmsg . '\')</script>' . "\n";
    } else {
        $posttexts = getPosttexts(TXTFILENAME);
        if (@$_POST['posttext']) {
            $posttexts = '  <tr><td>' . htmlspecialchars($_POST['posttext']) . '</td><td>' . date('Y/m/d H:i:s') . "</td></tr>\n{$posttexts}";
            file_put_contents(TXTFILENAME, $posttexts);
            header('Location: ' . PHPFILENAME);
            exit;
        }
    }
}

echo HTMLSTR1;
$posttexts = getPosttexts(TXTFILENAME);
echo $posttexts;
echo HTMLSTR2;
?>
