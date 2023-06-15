<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>貨幣轉換工具</title>
</head>
<html>
    <h1>貨幣轉換器</h1>
    <form action="money.php" method="get">
        <table border="1">
            <tr>
                <th>請輸入轉換金額:</th>
                <th><input type="radio" value="twdtousd" name="option">新台幣⇿美元</th>
                <th rowspan="2"><input type="submit" value="轉換"></th>
            </tr>
            <tr>
                <th><input type="number" name="money" placeholder="金額"></th>
                <th><input type="radio" value="usdtotwd" name="option">美元⇿新台幣</th>
            </tr>       
        </table>
        <a>最新匯率：1美元=31.2新台幣</a>
    </form>
</html>