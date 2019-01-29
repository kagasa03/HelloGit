<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<table border="1">
<tr>
<th>勤務時間</th>
<th>職種</th>
<th>給与</th>
<th>見出し</th>
<th>勤務地</th>
<th>応募先</th>
<th>求人情報URL</th>
</tr>
<?php
    //$targetURLに取得元ページのURLを設定する
    $targetURL = 'https://xxx.xxx.xxx/xxx/xxxx/';

    require_once('./lib/phpQuery-onefile.php');
    $html = file_get_contents($targetURL);
    $dom = phpQuery::newDocument($html);

    //取得元ページに合わせた処理が必要
    foreach ($dom['.list-jobListDetail'] as $item) {
        $pt02b    = pq($item)->find('.pt02')->find('.pt02b');
        $company  = pq($pt02b)->find('p')->text();
        $title    = pq($pt02b)->find('ul:eq(0)')->find('li:eq(0)')->find('h3')->text();
        $url      = pq($pt02b)->find('ul:eq(0)')->find('li:eq(0)')->find('a')->attr('href');
        $location = pq($pt02b)->find('ul:eq(1)')->find('li')->text();
        $pt03     = pq($item)->find('.pt03');
        $category = pq($pt03)->find('dl:eq(0)')->find('dd')->find('ul')->find('li')->text();
        $salary   = pq($pt03)->find('dl:eq(1)')->find('dd')->find('ul')->find('li')->text();
        $hours    = pq($pt03)->find('dl:eq(2)')->find('dd')->find('ul')->find('li')->text();

        echo '<tr>' . "\n";
        echo '<td>' . preg_replace('/(\t|\r\n|\r|\n)/s', '', $hours) . '</td>' . "\n";
        echo '<td>' . preg_replace('/(\t|\r\n|\r|\n)/s', '', $category) . '</td>' . "\n";
        echo '<td>' . preg_replace('/(\t|\r\n|\r|\n)/s', '', $salary) . '</td>' . "\n";
        echo '<td>' . preg_replace('/(\t|\r\n|\r|\n)/s', '', $title) . '</td>' . "\n";
        echo '<td>' . preg_replace('/(\t|\r\n|\r|\n)/s', '', $location) . '</td>' . "\n";
        echo '<td>' . preg_replace('/(\t|\r\n|\r|\n)/s', '', $company) . '</td>' . "\n";
        echo '<td>' . preg_replace('/(\t|\r\n|\r|\n)/s', '', $url) . '</td>' . "\n";
        echo '</tr>' . "\n";
    }
?>
</table>
</body>
</html>
