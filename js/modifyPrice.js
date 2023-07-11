let G_PRICE;

function enableModifyPriceModal(name){
    G_PRICE = name
    $('#modifyPriceModal').modal('show')
}

function modifyPrice () {
    const newPrice = document.getElementById('newPrice').value.replace(/(^\s*)|(\s*$)/g, '');

    if(newPrice.length === 0) {
        alert("价格不能为空");
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./modifyPrice.php");
    xhr.setRequestHeader('Content-Type',' application/x-www-form-urlencoded');
    xhr.send("name="+G_PRICE+"&newPrice="+newPrice);
    xhr.onreadystatechange = function(){
        if (xhr.readyState===4 && xhr.status===200){
            const rsp = xhr.responseText
            document.getElementById('modifyPwdTip').innerHTML = rsp;
            if(rsp === "<span style='color: green'>修改成功</span>")
                location.reload();

        }
    }
}