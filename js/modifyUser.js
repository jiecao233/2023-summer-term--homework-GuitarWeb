let G_Username1;

function enableModifyUserModal(username){
    G_Username1 = username
    $('#modifyUserModal').modal('show')
}

function modifyUser () {
    const newUsername = document.getElementById('newUsername').value.replace(/(^\s*)|(\s*$)/g, '');

    if(newUsername.length === 0) {
        alert("用户名不能为空");
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./modifyUser.php");
    xhr.setRequestHeader('Content-Type',' application/x-www-form-urlencoded');
    xhr.send("username="+G_Username1+"&newUsername="+newUsername);
    xhr.onreadystatechange = function(){
        if (xhr.readyState===4 && xhr.status===200){
            const rsp = xhr.responseText
            document.getElementById('modifyUserTip').innerHTML = rsp;
            if(rsp === "<span style='color: green'>修改成功</span>")
                location.reload();

        }
    }
}