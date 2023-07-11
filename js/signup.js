
function isnull() {
    const username = document.getElementById('username').value.replace(/(^\s*)|(\s*$)/g, '');
    const pwd = document.getElementById('pwd').value.replace(/(^\s*)|(\s*$)/g, '');
    const form = document.getElementById('submit');
    if (username.length === 0 || pwd.length === 0) {
        alert("账号或密码不能为空;")
    } else {
        form.submit()
    }
}

function back(){
    window.location.href = "./index.php"
}