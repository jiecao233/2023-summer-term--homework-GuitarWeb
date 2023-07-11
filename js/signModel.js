$(function () {
    $("#signBtn").click(function () {
        const sign_username = document.getElementById('sign_username').value.replace(/(^\s*)|(\s*$)/g, '');
        const sign_pwd = document.getElementById('sign_pwd').value.replace(/(^\s*)|(\s*$)/g, '');
        if (sign_username.length === 0 || sign_pwd.length === 0) {
            document.getElementById("signTip").innerHTML="<span style='color: red'>账号密码不能为空</span>";
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./newAccount.php");
        xhr.setRequestHeader('Content-Type',' application/x-www-form-urlencoded');
        xhr.send("username="+sign_username+"&pwd="+sign_pwd);
        xhr.onreadystatechange = function(){
            if (xhr.readyState==4 && xhr.status==200){
                const repTxt = xhr.responseText;
                document.getElementById("signTip").innerHTML=xhr.responseText;
                if(repTxt == "<span style='color: green'>注册成功</span>")
                    location.reload();
            }
        }
    })
})