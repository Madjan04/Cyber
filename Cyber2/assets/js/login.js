/*const form = document.querySelector('form');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const username = form.elements.username.value;
  const password = form.elements.password.value;

  if (username === 'myusername' && password === 'mypassword') {
    window.location.href = '#.html';
  } 
  
  else {
    alert('Invalid username or password. Please try again.');
  }
});
*/

//reg js
function show_register() {
  event.preventDefault();
  document.getElementById("reg_form").style.display = "flex";
  document.getElementById("reg_form").style.animation = "FadeIn forwards .5s";
}

function hide_register() {
  document.getElementById("reg_form").style.animation = "FadeOut forwards .5s";
  


window.setTimeout(function(){
  reg_form.style.display = 'none';
},700);
}

