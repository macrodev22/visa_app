const body = document.querySelector("body");
const modeToggle = body.querySelector('.mode-toggle');
const sidebar = body.querySelector('nav');
const sidebarToggle = body.querySelector('.sidebar-toggle');
const userInfo = body.querySelector('.dashboard .top img~.user-info');
const user = body.querySelector('.dashboard .top img');

modeToggle.addEventListener('click', () => {
    body.classList.toggle('dark');
});

sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('close');
});

user.addEventListener('click', () => {
    userInfo.classList.toggle('display-none');
});

body.addEventListener('click', (e) => {
    if (e.target != userInfo && e.target != user) userInfo.classList.add("display-none");
});

window.addEventListener('resize', () => {
    if (window.innerWidth <= 818) sidebar.classList.add('close');
    else sidebar.classList.remove('close');
});

//Links
dashcontent = body.querySelector('dash-content');
navlinks = body.querySelector('ul.nav-link').querySelectorAll('a');
navlinks.forEach(link => {
    href = link.href;
    if (!link.dataset.base && !link.href.includes('#')) {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            //Fetch data from href
            XHR = new XMLHttpRequest();
            XHR.addEventListener('load', (e) => {
                data = e.target.responseText;
                //Load data into view
                loadContent('.dash-content', data);

            });
            XHR.open('GET', link.href);
            XHR.send();
        });
    }
});

function loadContent(element, data) {
    docNode = body.querySelector(element);
    docNode.innerHTML = data;
}

