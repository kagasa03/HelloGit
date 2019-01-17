function convFizzBuzz(n) {
    var str = '';

    if (n % 3 === 0) {
        if (n % 5 === 0) {
            str = 'FizzBuzz';
        } else {
            str = 'Fizz';
        }
    } else if (n % 5 === 0) {
        str = 'Buzz';
    } else {
        str = String(n);
    }

    return str;
}

function goBottom(target) {
    target.scrollTop = target.scrollHeight;
}


var len = players.toString(10).length;
var turnformat='';
for (i = 1; i <= len; i++) {
    turnformat += '0';
}

var requestflg = 0;
correct_answerstr = '';

while (count <= 100) {
    if (turncount === playerturn) {
        requestflg = 1;
        if (answerstr === '') {
            break;
        } else {
            textarea1.value += '[' + (turnformat + turncount).slice(len * (-1)) + ']' 
            textarea1.value += answerstr + "\n";
            correct_answerstr = convFizzBuzz(count);
            if (answerstr != correct_answerstr) {
                break;
            } else {
                requestflg = 0;
                answerstr = '';
                correct_answerstr = '';
            }
        }
    } else {
        textarea1.value += '[' + (turnformat + turncount).slice(len * (-1)) + ']' 
        textarea1.value += convFizzBuzz(count) + "\n";
        goBottom(textarea1);
    }

    if (turncount === players) {
        turncount = 1;
    } else {
        turncount++;
    }

    count++;
}

if (requestflg === 1) {
    if (answerstr === '') {
        message.innerHTML = '順番が来ました。回答してください。';
        answerbtn.disabled = "";
        answer.focus();
    }
    if (answerstr != correct_answerstr) {
        message.innerHTML = '不正解。正しい答え：' + correct_answerstr;
        answerbtn.disabled = "disabled";
    }
} else {
    message.innerHTML = 'ゲームクリア';
    answerbtn.disabled = "disabled";
}

