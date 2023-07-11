$(function () {
    $("#addGoodBtn").click(function () {
        const name = document.getElementById('name').value.replace(/(^\s*)|(\s*$)/g, '');
        const price = document.getElementById('price').value.replace(/(^\s*)|(\s*$)/g, '');
        const path = document.getElementById('path').value.replace(/(^\s*)|(\s*$)/g, '');
        if (name.length === 0 || path.length === 0 || price.length === 0) {
            document.getElementById("addGoodTip").innerHTML="<span style='color: red'>信息不能为空</span>";
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./addGood.php");
        xhr.setRequestHeader('Content-Type',' application/x-www-form-urlencoded');
        xhr.send("name="+name+"&price="+price+"&path="+path);
        xhr.onreadystatechange = function(){
            if (xhr.readyState==4 && xhr.status==200){
                const repTxt = xhr.responseText;
                document.getElementById("addGoodTip").innerHTML=xhr.responseText;
                if(repTxt == "<span style='color: green'>添加成功</span>")
                    location.reload();
            }
        }
    })
})