//Navigate to new page
function navigate(loc) {
    switch (loc) {
        case 'account':
            window.location.href = "account.php";
            break;
        case 'search':
            window.location.href = "search.php";
            break;
        case 'upload':
            window.location.href = "upload.php";
            break;
        case 'upload-success':
            window.location.href = "upload-success.php";
            break;
        case 'login':
            window.location.href = "login.php";
            break;
        case 'logout':
            window.location.href = "logout.php";
            break;
        default:
            alert("No such page exists");
    }
}

//Can be used for clearing modal box
function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}



//Dark & Light Themes
let currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : 'light';

function enableDarkMode() {
    document.body.classList.add('darkTheme');
    localStorage.setItem('theme', 'dark');
}

function disableDarkMode() {
    document.body.classList.remove('darkTheme');
    localStorage.setItem('theme', 'light');
}

if (currentTheme === 'dark') {
    enableDarkMode();
} else {
    disableDarkMode();
}

// Change theme
function toggleTheme() {
    currentTheme = localStorage.getItem('theme');
    if (currentTheme !== 'dark') {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
}
