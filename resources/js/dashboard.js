// Set Theme
if( window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.documentElement.classList.add('dark');
} else {
    if( localStorage.theme === 'dark' ) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
}
  
// Toggle Theme
const theme_toggle = document.getElementById('theme-toggle');
let theme_setting = localStorage.theme;
theme_toggle.addEventListener('click', function(e) {
    if( theme_setting == 'dark' ) {
        theme_setting = 'light';
        document.documentElement.classList.remove('dark');
    } else if( theme_setting == 'light' ) {
        theme_setting = 'dark';
        document.documentElement.classList.add('dark');
    }
});

// Toggle User Profile Menu
const user_profile_toggle = document.getElementById('user-profile-toggle');
const user_profile_menu = document.getElementById('user-profile-menu');
if( user_profile_toggle ) {
    user_profile_toggle.addEventListener('click', function(e) {
        user_profile_menu.classList.toggle('hidden');
        user_profile_menu.classList.toggle('flex');
    });
}

// Toggle Mobile Nav
// const mobile_nav_toggle = document.getElementById('nav-toggle');
// const menu_links = document.getElementById('menu-links');
// mobile_nav_toggle.addEventListener('click', function(e){
//     e.preventDefault();
//     menu_links.classList.toggle('hidden');
//     menu_links.classList.toggle('flex');
// });

// Sticky Header
const header = document.getElementById('dashboard-nav');
let lastScrollTop = 0;

window.addEventListener("scroll", function() {
    let st = window.pageYOffset || document.documentElement.scrollTop;
    if( st < lastScrollTop && st != 0 ) {
        header.classList.add('header-fixed');
    } else {
        header.classList.remove('header-fixed');
    }
    lastScrollTop = st <= 0 ? 0 : st;
}, false);

// Get Page Path
const page_Url = window.location.pathname;

if( page_Url.includes('new') ) {
    let page_status = document.getElementById('page-status');
    let submit_btn = document.getElementById('submit-btn');

    page_status.addEventListener('change', function(e) {
        let page_status_value = page_status.value;
        submit_btn.innerHTML = page_status_value;
    });
} else if( page_Url.includes('setup') ) {
    let user_pw = document.getElementById('userpw');
    let userpw_confirm = document.getElementById('userpw_confirm');
    let randomPasswordHash = Math.random().toString(36).substring(2, 15);
    user_pw.value = randomPasswordHash;
    userpw_confirm.value = randomPasswordHash;
}