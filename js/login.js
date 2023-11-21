const signupForm = document.getElementById('signup');
const loginForm = document.getElementById('login');

// 注册逻辑
signupForm.addEventListener('submit', function(e) {
  e.preventDefault();
  const username = document.getElementById('signupUsername').value;
  const password = document.getElementById('signupPassword').value;

  // 这里可以将用户名和密码存储到数据库或其他持久性存储中
  // 例如：可以使用 fetch 或 AJAX 将数据发送到后端进行处理

  alert(`用户 ${username} 注册成功！`);
  // 清空表单
  signupForm.reset();
});

// 登录逻辑
loginForm.addEventListener('submit', function(e) {
  e.preventDefault();
  const username = document.getElementById('loginUsername').value;
  const password = document.getElementById('loginPassword').value;

  // 这里可以将用户名和密码与数据库中的信息进行比较
  // 如果匹配成功，可以让用户进入系统，否则提示登录失败

  alert(`用户 ${username} 登录成功！`);
  // 清空表单
  loginForm.reset();
});