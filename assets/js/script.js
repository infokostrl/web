// Modal
const modal_open = document.getElementById('more');
const modal_closed = document.getElementById('close');
const modal = document.getElementById('modal')
// Take body document
const body = document.body;
// Login
const login_open = document.getElementById("login_box");
const login_closed = document.getElementById("login_closed");
const login = document.getElementById('login')

// Modal open close event
modal_open.addEventListener('click', function(){
    modal.classList.add('show');
    body.classList.add('show');
});

modal_closed.addEventListener('click', function(){
    modal.classList.remove('show');
    body.classList.remove('show');
});

// Login open close event
login_open.addEventListener('click', function(){
    login.classList.add('show');
    body.classList.add('show');
});

login_closed.addEventListener('click', function(){
    login.classList.remove('show');
    body.classList.remove('show');
});