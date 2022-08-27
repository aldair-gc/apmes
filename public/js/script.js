import postsFromDB from "../data.json" assert {type: "json"};
const postContainer = document.querySelector(".post-container");

function buildAllPosts(json) {
    let innerHtmlPostsContainer = "";
    json.forEach(x => innerHtmlPostsContainer += buildPost(x));
    postContainer.innerHTML = innerHtmlPostsContainer;
}
function buildPost(data) {
    return `<div class="post">
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

window.onload(buildAllPosts(postsFromDB));