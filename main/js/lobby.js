
let form = document.getElementById('lobby__form')
/*當你從room返回至lobby時，因為剛才已經設定名字存在，會幫你保存名字*/
//
let displayName = sessionStorage.getItem('display_name') //原本設定displayname
if(displayName){
    form.name.value = displayName
}  
function containsChineseCharacters(str) {
    return /[\u4E00-\u9FFF]/.test(str);
}


form.addEventListener('submit', (e) => {
    e.preventDefault()

    sessionStorage.setItem('display_name', e.target.name.value)

    let inviteCode = e.target.room.value
    if(!inviteCode||containsChineseCharacters(inviteCode)){
        inviteCode = String(Math.floor(Math.random() * 10000))
    }
    
    
    window.location = `room.html?room=${inviteCode}`
})