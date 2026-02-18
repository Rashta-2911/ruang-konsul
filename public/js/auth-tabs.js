function switchTab(tab) {
  // Remove active class from all tabs and contents
  document.querySelectorAll('.auth-tab').forEach(t => t.classList.remove('active'));
  document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
  
  // Add active class to selected tab
  if (tab === 'login') {
    document.querySelector('.auth-tab:first-child').classList.add('active');
    document.getElementById('login-tab').classList.add('active');
  } else if (tab === 'register') {
    document.querySelector('.auth-tab:last-child').classList.add('active');
    document.getElementById('register-tab').classList.add('active');
  }
}