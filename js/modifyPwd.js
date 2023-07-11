let G_Username2;

function enableModifyPwdModal(username){
    G_Username2 = username
    $('#modifyPwdModal').modal('show')
}

function modifyPwd () {
    const newPwd = document.getElementById('newPwd').value.replace(/(^\s*)|(\s*$)/g, '');

    if(newPwd.length === 0) {
        alert("密码不能为空");
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./modifyPwd.php");
    xhr.setRequestHeader('Content-Type',' application/x-www-form-urlencoded');
    xhr.send("username="+G_Username2+"&newPwd="+newPwd);
    xhr.onreadystatechange = function(){
        if (xhr.readyState===4 && xhr.status===200){
            const rsp = xhr.responseText
            document.getElementById('modifyPwdTip').innerHTML = rsp;
            if(rsp === "<span style='color: green'>修改成功</span>")
                location.reload();

        }
    }
}