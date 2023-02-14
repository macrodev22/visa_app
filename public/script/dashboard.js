const body = document.querySelector("body");
const modeToggle = body.querySelector('.mode-toggle');
const sidebar = body.querySelector('nav');
const sidebarToggle = body.querySelector('.sidebar-toggle');
const userInfo = body.querySelector('.dashboard .top img~.user-info');
const user = body.querySelector('.dashboard .top img');

const mode = localStorage.getItem('mode');
const navState = localStorage.getItem('navState');

if (mode == 'dark') body.classList.add('dark');
if (navState == 'close') sidebar.classList.add('close');

modeToggle.addEventListener('click', () => {
    body.classList.toggle('dark');
    if (body.classList.contains('dark')) localStorage.setItem('mode', 'dark');
    else localStorage.setItem('mode', 'light');
});

sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('close');
    if (sidebar.classList.contains('close')) localStorage.setItem('navState', 'close');
    else localStorage.setItem('navState', 'open');
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


//Add a user on admin dashboard
function addUserRow(tableSelector) {
    table = document.querySelector(tableSelector);
    addAnother = table.dataset.addinguser;
    if (addAnother == 'true') {

        tableBody = table.querySelector('tbody');
        lastRow = tableBody.querySelector('tr:last-of-type');
        newRow = document.createElement('tr');
        newRow.innerHTML = `<td>
        <select name=role>
        <option value='Admin'>Admin</option>
        <option value='Manager'>Manager</option>
        </select>
        </td>
        <td>
        <div style="display:flex">
        <input placeholder='Firstname' type=text name=firstname />
        <input type=text placeholder='Lastname' name='lastname'/>
        </div>
        </td>
        <td><input type=text placeholder=Username name=username></td>
        <td><input type=email placeholder=email name=email></td>
        <td>
        <input type='hidden' name=password value='testpassword' />
        <input type='hidden' name=method value=POST />
        <button type=submit id="saveBtn">Save</button>
        </td>
        <td>Pwd:testpassword<td>
        `;
        tableBody.appendChild(newRow);
        table.dataset.addinguser = 'false';
    }

}

function submitUserAddFormAdmin(form) {
    console.log('Sumited')
    formData = new FormData(form);
    XHR = new XMLHttpRequest();

    XHR.addEventListener('load', (req) => {
        console.log(req.responseText)
    });

    XHR.open('POST', '/api/admin/add-user/');
    XHR.send(formData);
}

((window) => {
    $ajx = {};
    function _GET(url, callback) {
        XHR = new XMLHttpRequest();

        XHR.addEventListener('load', (res) => {
            callback(res);
        });

        XHR.open('GET', url);
        XHR.send();
    }

    function _POST(url, callback, data) {
        XHR = new XMLHttpRequest();

        XHR.addEventListener('load', (res) => {
            callback(res);
        });

        XHR.open('POST', url);
        XHR.send(data);
    }
    $ajx._GET = _GET;
    $ajx._POST = _POST;

    window.$ajx = $ajx;
})(window);

function refreshTable(tableName) {
    //Links for fetch new table data from
    const tables = {
        'user': '/api/users/',
    }

    const tableLink = tables[tableName];
    dashcontent = document.querySelector('.dash-content');
    $ajx._GET(tableLink, (res) => {
        dashcontent.innerHTML = res.target.responseText;
    });

}

//Event delegation dash-content
document.querySelector('.dash-content').addEventListener('click', (e) => {
    //Add user button
    if (e.target.matches('#saveBtn')) {
        e.preventDefault();
        form = new FormData(document.querySelector('#admin-user-form'));
        $ajx._POST('/api/admin/add-user', (res) => {
            // console.log(res);
            console.log(res.target.responseText);
        }, form);

        refreshTable('user');
    }

    //Modify user
    if (e.target.matches('.modifyBtn')) {
        e.preventDefault();
        user_id = e.target.dataset.uid;
        parentRow = e.target.closest('tr');
        inputs = parentRow.querySelectorAll('input');
        console.log('Modify user: ', user_id);
        form = new FormData(document.querySelector('#admin-user-form'));
        form.append('method', 'PUT');
        form.append('user_id', user_id);
        console.log('Method: ', form.getAll('method'));
        inputs?.forEach(input => {
            if (input.disabled) {
                input.disabled = false;
            }
            else { //Modify the user
                $ajx._POST('/api/admin/add-user', (res) => {
                    console.log(res.target.responseText);
                }, form);

                refreshTable('user');
            }
        });

    }

    //Delete user
    if (e.target.matches('.deleteBtn')) {
        e.preventDefault();
        user_id = e.target.dataset.uid;
        console.log('Delete user: ', user_id);
        form = new FormData(document.querySelector('#admin-user-form'));
        form.append('method', 'DELETE');
        form.append('user_id', user_id);
        // console.log('Method: ', form.getAll('method'));

        $ajx._POST('/api/admin/add-user', (res) => {
            console.log(res);
            console.log(res.target.responseText);
        }, form);

        refreshTable('user');
    }

    //Approve an application
    if (e.target.matches('#approve-btn')) {
        console.log('approve an applcation')
        application_id = e.target.dataset.application;
        form = new FormData();
        form.append('application_id', application_id);
        $ajx._GET(`/api/application/?id=${application_id}&action=approve`, (res) => {
            // window.alert(res.target.responseText);
        }, form);
    }

    //Reject an application
    if (e.target.matches('#reject-btn')) {
        console.log('approve an applcation')
        application_id = e.target.dataset.application;
        form = new FormData();
        form.append('application_id', application_id);
        $ajx._GET(`/api/application/?id=${application_id}&action=reject`, (res) => {
            // window.alert(res.target.responseText);
        }, form);
    }
});
