<?php
function convFizzBuzz($n)
{
    $str = '';

    if ($n % 3 === 0) {
        if ($n % 5 === 0) {
            $str = 'FizzBuzz';
        } else {
            $str = 'Fizz';
        }
    } else if ($n % 5 === 0) {
        $str = 'Buzz';
    } else {
        $str = "{$n}";
    }

    return $str;
}

$players = intval(htmlspecialchars($_POST['players']));
echo '<html>', "\n";

if ($players >= 1) {
    $continueflg = intval(htmlspecialchars($_POST['continueflg']));
    if ($continueflg === 1) {
        $playerturn = intval(htmlspecialchars($_POST['playerturn']));
        $count = intval(htmlspecialchars($_POST['count']));
        $turncount = intval(htmlspecialchars($_POST['turncount']));
        $buf = htmlspecialchars($_POST['buf']);
        $answerstr = htmlspecialchars($_POST['answerstr']);
    } else {
        $playerturn = rand(1, $players);
        $count = 1;
        $turncount = 1;
        $buf = '';
        $answerstr = '';
    }
    $requestflg = 0;
    $correct_answerstr = '';

    $len = strlen($players);
    $turnformat = "%0{$len}d";

    echo '<head>', "\n";
    echo '<script type="text/javascript">', "\n";
    echo '    function goBottom(targetId) {', "\n";
    echo '        var obj = document.getElementById(targetId);', "\n";
    echo '        if(!obj) return;', "\n";
    echo '        obj.scrollTop = obj.scrollHeight;', "\n";
    echo '    }', "\n";
    echo '</script>', "\n";
    echo '</head>', "\n";
    echo '<body onload="goBottom(\'textarea1\')">', "\n";
    echo '<table><tr><td>', "\n";
    echo '※上から下へ発言を表示。[]内の数字は発言順番。<br>', "\n";
    echo '<textarea cols="50" rows="30" id="textarea1">', "\n";

    ob_start();
    if ($continueflg === 1) {
        echo $buf;
    }

    while ($count <= 100) {
        if ($turncount === $playerturn) {
            $requestflg = 1;
            if ($answerstr === '') {
                break;
            } else {
                echo sprintf("[{$turnformat}]", $turncount);
                echo $answerstr, "\n";
                $correct_answerstr = convFizzBuzz($count);
                if ($answerstr != $correct_answerstr) {
                    break;
                } else {
                    $requestflg = 0;
                    $answerstr = '';
                    $correct_answerstr = '';
                }
            }
        } else {
            echo sprintf("[{$turnformat}]", $turncount);
            echo convFizzBuzz($count), "\n";
        }
        
        if ($turncount === $players) {
            $turncount = 1;
        } else {
            $turncount++;
        }

        $count++;
    }
    $buf = ob_get_clean();
    echo $buf;
    echo '</textarea></td>', "\n";
    echo "<td>あなたの順番：{$players}人中{$playerturn}番目<br>\n";
    if ($requestflg === 1) {
        if ($answerstr === '') {
            echo '<br>順番が来ました。回答を入力して送信してください。<br>', "\n";
            echo '<form action="fizzbuzzGame.php" method="post">', "\n";
            echo '<input type="hidden" name="continueflg" value="1">', "\n";
            echo '<input type="hidden" name="players" value=', "\"{$players}\">\n";
            echo '<input type="hidden" name="playerturn" value=', "\"{$playerturn}\">\n";
            echo '<input type="hidden" name="count" value=', "\"{$count}\">\n";
            echo '<input type="hidden" name="turncount" value=', "\"{$turncount}\">\n";
            echo '<input type="hidden" name="buf" value=', "\"{$buf}\">\n";
            echo '回答：', "\n";
            echo '<input type="text" name="answerstr">', "\n";
            echo '<input type="submit">', "\n", '</form>', "\n";
        }
        if ($answerstr != $correct_answerstr) {
            echo "<br>不正解<br>\n";
            echo "正しい答え：{$correct_answerstr}\n";
        }
    } else {
        echo 'ゲームクリア', "\n";
    }
    echo '<br><br><input type="button" onClick="location.href=\'./fizzbuzzGame.html\'" value="最初のページへ">', "\n";
    echo '</td></tr></tr></table>';
    echo '</body>', "\n";
    echo '</html>', "\n";

} else {
    echo '<head></head>', "\n";
    echo '<body>', "\n";
    echo 'プレイ人数には、1以上の数字を入力してください', "\n";
    echo '<br><br><input type="button" onClick="location.href=\'./fizzbuzzGame.html\'" value="最初のページへ">', "\n";
}
echo '</body>', "\n";
echo '</html>', "\n";

?>
