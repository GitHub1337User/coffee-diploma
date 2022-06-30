let themeBtn = document.querySelector('.switchInput');
let styleLink = document.querySelector('#styles');

// localStorage.setItem('light-theme',"/css/app2.css");
// localStorage.setItem('dark-theme',"/css/app.css");
// localStorage.getItem('theme');

function setTheme(themeName) {
    localStorage.setItem('theme', themeName);
    // document.documentElement.className = themeName;
    styleLink.setAttribute("href",themeName);
}

function switchTheme(){
    if (localStorage.getItem('theme') === "/css/app.css"){
        setTheme("/css/app2.css");

    } else {
        setTheme("/css/app.css");
    }
}
(function () {
    if (localStorage.getItem('theme') === "/css/app.css"){
        setTheme("/css/app.css");
    } else {
        setTheme("/css/app2.css");
        themeBtn.setAttribute("checked","checked");
    }
})();
themeBtn.addEventListener("change",switchTheme);
