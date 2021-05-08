<?php echo <<<_END


<script src="quickSearch.js"></script>

<div class="title" id="titleBanner">
    <img id="titleLogo" src="./imgs/logo.png" alt="iBay logo - blue text with a white stroke" onclick="navigate('account');">
    <form id="titleSearchForm" name="titleSearchForm" onsubmit="quickSearch();">
        <input type=text id="searchTerm" name="searchTerm" placeholder="Search for an item">
        <input type=submit id="submitSearch" name="submitSearch" value="">
    </form>

    <button class="theme" onclick="toggleTheme();"></button>
</div>

<div id="navbar">
    <div id="navbarContent">
        <div class="navbarItem" onclick="navigate('account');">
            <p class="navbarText">My Account</p>
            <img class="navbarImg" src="./imgs/account.png" alt="My Account image - a silhouette of a head">
        </div>
        <div class="navbarItem" onclick="navigate('search');">
            <p class="navbarText">Search</p>
                <img class="navbarImg" src="./imgs/search.png" alt="Search Image - a magnifying glass">
            </div>
            <div class="navbarItem" onclick="navigate('upload');">
                <p class="navbarText">Upload Item</p>
                <img class="navbarImg" src="./imgs/upload.png" alt="Upload Item Image - an upwards facing arrow from a computer">
            </div>
            <div class="navbarItem" onclick="navigate('logout');">
                <p class="navbarText">Log out</p>
                <img class="navbarImg" src="./imgs/logout.png" alt="Logout Image - a rightwards facing arrow">
            </div>
        </div>
    </div>
</div>

_END;
?>
