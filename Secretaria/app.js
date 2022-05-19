let users = [];

const container = document.querySelector('#flex-container');
const addBtn = document.querySelector("#addBtn");

window.addEventListener("DOMContentLoaded", function() {
    loadUsers()
});

function loadUsers() {
    if (users.length === 0) {
        container.insertAdjacentHTML('afterbegin', 
        `
        <div class="perfil" id="noUsers">
            <div class="circle"></div>
        <p class= "branco">Sem usuários</p>
        </div>
        `);
    }
    else {
        let displayUsers = users.map(function(user) {
            return `<div class="perfil">
            <a href="dashboard.html"><div class="circle"></div></a>
            <p>${user}<p>
            </div>`
        });
        displayUsers = displayUsers.join("");
        container.innerHTML = displayUsers;
    }
}

addBtn.addEventListener('click', function() {
    let userName = prompt('Insira o seu nome'); 
    console.log(userName)
    if (userName != null && users !== "" && !users.includes(userName)) {
        if (users.length === 0) 
            document.getElementById('noUsers').remove();
        
        users.push(userName);
        console.log(users);
        container.insertAdjacentHTML('afterbegin', `
        <div class="perfil">
        <a href="dashboard.html"><div class="circle"></div></a>
        <p>${userName}<p>
        </div>
        `);
    }
    else console.log("inválido");
});
