document.addEventListener('DOMContentLoaded', () => {

const password =
document.getElementById('password');

if(!password) return;

const toggle =
document.createElement('button');

toggle.type='button';

toggle.innerHTML='Show';

toggle.classList.add('show-password');

password.parentNode.appendChild(toggle);

toggle.addEventListener('click',()=>{

if(password.type==='password')
{
password.type='text';
toggle.innerHTML='Hide';
}
else
{
password.type='password';
toggle.innerHTML='Show';
}

});

});