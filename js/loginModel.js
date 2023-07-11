$(function () {
    $("#loginBtn").click(function () {
        const username = document.getElementById('username').value.replace(/(^\s*)|(\s*$)/g, '');
        const pwd = document.getElementById('pwd').value.replace(/(^\s*)|(\s*$)/g, '');
        const form = document.getElementById('submit');
        if (username.length === 0 || pwd.length === 0) {
            document.getElementById("loginTip").innerHTML="<span style='color: red'>账号密码不能为空</span>";
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./auth.php");
        xhr.setRequestHeader('Content-Type',' application/x-www-form-urlencoded');
        xhr.send("username="+username+"&pwd="+pwd);
        xhr.onreadystatechange = function(){
            if (xhr.readyState===4 && xhr.status===200){
                const rspTxt = xhr.responseText;
                document.getElementById("loginTip").innerHTML=xhr.responseText;
                if(rspTxt === "<span style='color: green'>登陆成功</span>")
                    location.reload();
            }
        }
    })
})