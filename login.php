<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインしてこのサービスを使おう</title>
</head>
<body>


    <main>
        <div class ="container2">
            <form name="form1" action="login-act.php" method="post">

                <fieldset>

                    <legend>ログイン情報を記入</legend>

                        <label>
                            <span>ID:</span>
                            <input type="text" name="userid"/>
                        </label>

                        <label>
                            <span>PW:</span>
                            <input type = "text" name = "userpw"/>
                        </label>
                <input type="submit" value="LOGIN" />
                </fieldset>
    </main>
</body>
</html>