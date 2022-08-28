import postsFromDB from "../data.json" assert {type: "json"};
const postContainer = document.querySelector(".post-container");

window.onload = function() {
    buildAllPosts(postsFromDB);
    filterButtons();
};

function buildAllPosts(json) {
    let innerHtmlPostsContainer = "";
    json.forEach(x => innerHtmlPostsContainer += buildPost(x));
    postContainer.innerHTML = innerHtmlPostsContainer;
}
function buildPost(data) {
    return `<div class="post ${data.group}">
    <img class="post-media" src=${data.picture}>
    <div class="post-texts">
    <div class="posts-header">
    <div class="posts-title">${data.title}</div>
    <div class="posts-date">${data.date}</div>
    </div>
    <div class="posts-content">${data.content}</div>
    </div>
    </div>`;
}

// store preferences on url
const url = new URL(window.location);

const all = document.querySelector("#all");
const group1 = document.querySelector("#group1");
const group2 = document.querySelector("#group2");

function filterButtons() {
    if (url.searchParams.get("all") === "1") {
        all.checked = true;
        all.parentElement.style.background = "#aea"
    }
    if (url.searchParams.get("group1") === "1") {
        group1.checked = true;
        group1.parentElement.style.background = "#aea"
    }
    if (url.searchParams.get("group2") === "1") {
        group2.checked = true;
        group2.parentElement.style.background = "#aea"
    }
}

// click filter buttons
const filterMenu = document.querySelector(".filter-menu");

filterMenu.addEventListener("click", (e) => {
    const param = e.target.innerText;
    if (!e.target.checked) {
        url.searchParams.set(param, "1")
    } else {
        url.searchParams.set(param, "0")
    }
    
    url.searchParams.get("all") === "1"
        ? all.parentElement.style.background = "#aea"
        : all.parentElement.style.background = "#fff";
    url.searchParams.get("group1") === "1"
        ? group1.parentElement.style.background = "#aea"
        : group1.parentElement.style.background = "#fff";
    url.searchParams.get("group2") === "1"
        ? group2.parentElement.style.background = "#aea"
        : group2.parentElement.style.background = "#fff";
});
