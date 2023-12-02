const page_Url = window.location.pathname;

if( page_Url.includes('new') ) {
    let page_status = document.getElementById('page-status');
    let submit_btn = document.getElementById('submit-btn');

    page_status.addEventListener('change', function(e) {
        let page_status_value = page_status.value;
        submit_btn.innerHTML = page_status_value;
    });
}