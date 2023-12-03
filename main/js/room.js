let messagesContainer = document.getElementById('messages');
messagesContainer.scrollTop = messagesContainer.scrollHeight; /*將[id為message的元素]的垂直捲動位置(scrollTop)設定為[id為message的元素]
的完整高度，也就是會滾動到最底部*/ 

var mytestvalue = sessionStorage.getItem('abcdefg');
document.cookie = "mytestvalue=" + mytestvalue + "; path=/";

const memberContainer = document.getElementById('members__container');
const memberButton = document.getElementById('members__button');

const chatContainer = document.getElementById('messages__container');
const chatButton = document.getElementById('chat__button');

let activeMemberContainer = false;

const themeButton = document.getElementById('theme__button');
const nav = document.getElementById('nav');
let defaultTheme = true;

memberButton.addEventListener('click', () => { /*手機點選成員列表的事件*/
  if (activeMemberContainer) {
    memberContainer.style.display = 'none';
  } else {
    memberContainer.style.display = 'block';
  }

  activeMemberContainer = !activeMemberContainer;
});

let activeChatContainer = false;

chatButton.addEventListener('click', () => { /*手機點選聊天事的事件*/
  if (activeChatContainer) {
    chatContainer.style.display = 'none';
  } else {
    chatContainer.style.display = 'block';
  }

  activeChatContainer = !activeChatContainer;
});

let displayFrame = document.getElementById('stream__box')
let videoFrames = document.getElementsByClassName('video__container')
let userIdInDisplayFrame = null;

let expandVideoFrame = (e) => {

  let child = displayFrame.children[0]
  if(child){
      document.getElementById('streams__container').appendChild(child)
  }

  displayFrame.style.display = 'block'
  displayFrame.appendChild(e.currentTarget)
  userIdInDisplayFrame = e.currentTarget.id

  for(let i = 0; videoFrames.length > i; i++){
    if(videoFrames[i].id != userIdInDisplayFrame){
      videoFrames[i].style.height = '100px'
      videoFrames[i].style.width = '100px'
    }
  }

}

for(let i = 0; videoFrames.length > i; i++){
  videoFrames[i].addEventListener('click', expandVideoFrame)
}


let hideDisplayFrame = () => {
    userIdInDisplayFrame = null
    displayFrame.style.display = null

    let child = displayFrame.children[0]
    document.getElementById('streams__container').appendChild(child)

    for(let i = 0; videoFrames.length > i; i++){
      videoFrames[i].style.height = '300px'
      videoFrames[i].style.width = '300px'
  }
}

themeButton.addEventListener('click', () => { /*點選主題切換的事件*/
  if (defaultTheme) {
    nav.style.backgroundColor = '#ede0e0' /*true變白色*/
    document.getElementById('logo').style.color = '#5105ca' /*id logo包含兩個元素，一個是圖片檔 一個是文字 color會調整文字顏色*/ 
    document.getElementById('members__button').innerHTML = '<svg id="members__button__svg" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 18v1h-24v-1h24zm0-6v1h-24v-1h24zm0-6v1h-24v-1h24z" fill="#5105ca"><path d="M24 19h-24v-1h24v1zm0-6h-24v-1h24v1zm0-6h-24v-1h24v1z"/></svg>';
    document.getElementById('members__container').style.backgroundColor = '#a9a9a9'
    document.getElementById('stream__box').style.backgroundColor = '#ede0e0'
    document.body.style.backgroundColor = '#ede0e0'
    document.getElementById('chat__button').innerHTML = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="#5105ca" clip-rule="evenodd"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-15.667-6l-5.333 4v-4h-3v-14.001l18 .001v14h-9.667zm-6.333-2h3v2l2.667-2h8.333v-10l-14-.001v10.001z"/></svg>'
    document.getElementById('theme__button').innerHTML = '<svg width="24" height="24" fill="#5105ca" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12,2A7,7,0,0,0,8,14.74V17a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V14.74A7,7,0,0,0,12,2ZM9,21a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V20H9Z"></path></svg>'
    document.getElementById('create__room__btn__svg').innerHTML = '<svg id="create__room__btn__svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#5105ca" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>'
    

    document.getElementById('message__form').style.backgroundColor = '#ffffff'
    document.body.style.color = '#000000' /*member名字顏色*/ 
    document.getElementById('members__header').style.backgroundColor = '#ffffff' /*在縣人數小框文字*/ 
    
  } else {
    nav.style.backgroundColor = '#1a1a1a' /*false 變黑色*/
    document.getElementById('logo').style.color = '#ede0e0'
    document.getElementById('members__button').innerHTML = '<svg id="members__button__svg" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 18v1h-24v-1h24zm0-6v1h-24v-1h24zm0-6v1h-24v-1h24z" fill="#ede0e0"><path d="M24 19h-24v-1h24v1zm0-6h-24v-1h24v1zm0-6h-24v-1h24v1z"/></svg>';
    document.getElementById('members__container').style.backgroundColor = '#262625'
    document.body.style.backgroundColor = '#1a1a1a'
    document.getElementById('chat__button').innerHTML = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="#ede0e0" clip-rule="evenodd"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-15.667-6l-5.333 4v-4h-3v-14.001l18 .001v14h-9.667zm-6.333-2h3v2l2.667-2h8.333v-10l-14-.001v10.001z"/></svg>'
    document.getElementById('theme__button').innerHTML = '<svg width="24" height="24" fill="#ede0e0" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12,2A7,7,0,0,0,8,14.74V17a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V14.74A7,7,0,0,0,12,2ZM9,21a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V20H9Z"></path></svg>'
    document.getElementById('create__room__btn__svg').innerHTML = '<svg id="create__room__btn__svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ede0e0" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>'

    document.getElementById('message__form').style.backgroundColor = '#1a1a1a'
    document.body.style.color = '#ede0e0' /*member名字顏色*/ 
    document.getElementById('members__header').style.backgroundColor = '#323143' /**/ 
  }

  defaultTheme = !defaultTheme;
});

displayFrame.addEventListener('click', hideDisplayFrame)