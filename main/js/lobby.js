let form = document.getElementById('lobby__form')
function containsChineseCharacters(str) { //偵測房間編號有中文
    return /[\u4E00-\u9FFF]/.test(str);
}

/*當你從room返回至lobby時，因為剛才已經設定名字存在，會幫你保存名字*/
//先前登入時已經有sessionStorage元素了
let displayName = sessionStorage.getItem('display_name') //原本設定displayname
if(displayName){
    form.name.value = displayName
}


form.addEventListener('submit', (e) => {
    e.preventDefault()
    let inviteCode = e.target.room.value
    if(!inviteCode||containsChineseCharacters(inviteCode)){
        inviteCode = String(Math.floor(Math.random() * 10000))
    }
    
    
    window.location = `room.html?room=${inviteCode}`
})