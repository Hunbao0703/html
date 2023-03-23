<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>普發現金</title>
    </head>
    <body>
        <form action="information.php" method="get">
            <h1>普發6000元補助領取平台</h1>
            姓名: <input type="text" name="name" ><br><br>
            學號: <input type="text" name="number" ><br><br>
            出生年月日: <input placeholder="年(西元)" type="number" name="year" min="0" max="2100">
            <select name="month" id="month">
                <option hidden value>月</option>
                <option value="1">1月</option>
                <option value="2">2月</option>
                <option value="3">3月</option>
                <option value="4">4月</option>
                <option value="5">5月</option>
                <option value="6">6月</option>
                <option value="7">7月</option>
                <option value="8">8月</option>
                <option value="9">9月</option>
                <option value="10">10月</option>
                <option value="11">11月</option>
                <option value="12">12月</option>
            </select>
            <select name="day" id="day">
                <option hidden value>日</option>
                <option value="1">1日</option>
                <option value="2">2日</option>
                <option value="3">3日</option>
                <option value="4">4日</option>
                <option value="5">5日</option>
                <option value="6">6日</option>
                <option value="7">7日</option>
                <option value="8">8日</option>
                <option value="9">9日</option>
                <option value="10">10日</option>
                <option value="11">11日</option>
                <option value="12">12日</option>
                <option value="13">13日</option>
                <option value="14">14日</option>
                <option value="15">15日</option>
                <option value="16">16日</option>
                <option value="17">17日</option>
                <option value="18">18日</option>
                <option value="19">19日</option>
                <option value="20">20日</option>
                <option value="21">21日</option>
                <option value="22">22日</option>
                <option value="23">23日</option>
                <option value="24">24日</option>
                <option value="25">25日</option>
                <option value="26">26日</option>
                <option value="27">27日</option>
                <option value="28">28日</option>
                <option value="29">29日</option>
                <option value="30">30日</option>
                <option value="31">31日</option>
            </select>
            <br><br>
            性別:
            <input type="radio" value="male" name="sex">男 
            <input type="radio" value="female" name="sex">女 
            <input type="radio" value="none" name="sex">不提供
            <br><br>
            提領方式:
            <select name="plan">
                <option hidden value>請選擇</option>
                <option value="郵局">郵局臨櫃提領</option>
                <option value="ATM">ATM 提款</option>
                <option value="入帳">直接入帳</option>
            </select>
            <br><br>
            <input type="submit" value="送出">
            <input type="reset" value="清除">
        </form>
    </body>
</html>