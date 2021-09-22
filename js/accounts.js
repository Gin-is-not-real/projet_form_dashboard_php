const main_accounts = document.getElementById("main-accounts");
const btn_deconnection = document.getElementById("btn-deconnection");
const btn_home = document.getElementById("btn-home");
const btn_connection = document.getElementById("btn-connection");
btn_connection.targetSection = document.getElementById("sec-connection");
const btn_registration = document.getElementById("btn-registration");
btn_registration.targetSection = document.getElementById("sec-registration");

const btns_accounts = [btn_connection, btn_registration];
btns_accounts.forEach(btn => {
    btn.addEventListener("click", function() {
        displaySection(this);
    })
})

function displaySection(btn) {
    btns_accounts.forEach(b => {
        if(b === btn) {
            console.log(b.targetSection);

            main_accounts.style.display = "flex";
            b.targetSection.style.display = "flex";
        }
        else {
            b.targetSection.style.display = "none";
        }
    })
}

// const pageLoad = function() {
//     let path = window.location.pathname;
//     console.log("path", path);

//     if(path.includes("accounts") || !path.includes("index")) {
//         document.querySelectorAll(".visible-on-home").forEach(btn => {
//             btn.style.display = "block";
//         });

//         document.querySelectorAll(".visible-on-app").forEach(btn => {
//             btn.style.display = "none";
//         });
//     }
//     else {
//         document.querySelectorAll(".visible-on-home").forEach(btn => {
//             btn.style.display = "none";
//         });

//         document.querySelectorAll(".visible-on-app").forEach(btn => {
//             btn.style.display = "block";
//         });
//     }
// }
// // pageLoad();