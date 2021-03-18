// Nav mobile version (open menu)
let navigation_status = false;

$('#navigation_open').click(() => {
    let navigation_bar = document.getElementById('navigation_bar');
    let nav_open_icon = document.getElementById('navigation_open');
    let nav_logout = document.getElementById('nav_logout_section');
    let nav = document.getElementById('nav_mobile');

    if (navigation_status === false) {
        nav_open_icon.style.animationName = 'anim_nav_open';

        navigation_bar.style.animationName = 'anim_nav';

        nav.style.visibility = 'visible';
        nav_logout.style.visibility = 'visible';

        nav.style.display = 'block';
        nav_logout.style.display = 'block';

        navigation_status = true;

    } else {
        nav_open_icon.style.animationName = 'anim_nav_close';

        navigation_bar.style.animationName = 'anim_nav_hidden';
        setTimeout(function () {
            nav.style.visibility = 'hidden';
            nav_logout.style.visibility = 'hidden';

            nav.style.display = 'none';
            nav_logout.style.display = 'none';

            navigation_status = false;
            navigation_bar.style.animationName = 'anim_nav_end';
        }, 1500);
    }
})
