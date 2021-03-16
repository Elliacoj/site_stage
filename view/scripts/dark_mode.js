// Check & Store theme
let style = document.getElementById('pages_style');
let app_theme_check = localStorage.getItem('app_theme');

if (app_theme_check === null) {
    localStorage.setItem('app-theme', 'light');

} else if (app_theme_check === 'dark'){
    style.href = './styles/dark.css';

} else if (app_theme_check === 'light'){
    style.href = './styles/light.css';
}

// Dark mode:

$('#nav_theme_switch').click(function (){
    let app_theme = localStorage.getItem('app_theme');

    if (app_theme === 'dark') {
        localStorage.setItem('app_theme', 'light');
        style.href = "./styles/light.css";

    } else if (app_theme === 'light') {
        localStorage.setItem('app_theme', 'dark');
        style.href = "./styles/dark.css";

    }

})