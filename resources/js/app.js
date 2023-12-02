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

const page_Url = window.location.pathname;

if( page_Url.includes('new') ) {
    let page_status = document.getElementById('page-status');
    let submit_btn = document.getElementById('submit-btn');

    page_status.addEventListener('change', function(e) {
        let page_status_value = page_status.value;
        submit_btn.innerHTML = page_status_value;
    });
}