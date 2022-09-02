// import postsFromDB from "../data.json" assert {type: "json"};
// import buildAllPostsEdit from "./build-posts-edit.js";
// import buildAllPosts from "./build-posts.js";

// const postContainer = document.querySelector(".post-container");

const url = new URL(window.location);


// const group1 = document.querySelector("#group1");
// const group2 = document.querySelector("#group2");
// const paramAll = url.searchParams.get("all")
// const paramGroup1 = url.searchParams.get("group1")
// const paramGroup2 = url.searchParams.get("group2")

// window.onload = function () {
//     // postContainer.innerHTML = buildAllPostsEdit(postsFromDB);
//     if (url.searchParams.get("all") === "1") {
//         all.classList.add("active")
//     }
//     if (url.searchParams.get("group1") === "1") {
//         group1.classList.add("active")
//     }
//     if (url.searchParams.get("group2") === "1") {
//         group2.classList.add("active")
//     };
// }


// click filter buttons
const filters = document.querySelector("#filters");
if (filters) {
    filters.addEventListener("click", (e) => {
        const filterButton = e.target.innerText; // get button's text
        const allPosts = document.querySelectorAll(".post"); // select all these posts
        const all = document.querySelector("#all");

        const groups = document.querySelectorAll(".groupname");
        const groupObjects = [all];
        groups.forEach((value) => groupObjects.push(value));

        // check if the target is a button
        if (!e.target.classList.contains("button")) return;

        // buttons colours
        groupObjects.forEach((x) => {
            if (x.innerText === filterButton) {
                x.style.background = "#027db6";
                x.style.color = "#fff";
            } else {
                x.style.background = "#fff";
                x.style.color = "#000";
            }
        });

        // filter posts
        if (filterButton === "all") {
            allPosts.forEach((x) => x.classList.remove("hidden"));
        } else {
            allPosts.forEach((x) => {
                if (!x.classList.contains(filterButton)) {
                    x.classList.add("hidden");
                } else {
                    x.classList.remove("hidden");
                };
            });
        }
    });
};


// Message box
const msgContainer = document.querySelector(".msg-container");
const allMsg = document.querySelectorAll(".msg");
// Add click effect to remove messages
allMsg.forEach(msg => {
    msg.addEventListener("click", (e) => {
        msg.classList.remove("show");
        console.log("click");
    });
});
// Make the messages from url codes
codeList = new Map([
    [1, "Wrong password!"],
    [2, "Email not registered!"],
    [3, "Error processing register request!"],
    [4, "Could not prepare statement!"],
    [5, "Missing data!"],
    [6, "All field must be fulfilled!"],
    [7, "Invalid email!"],
    [8, "Password must be between 5 and 20 characters long!"],
    [9, "Email already registered!"],
    [10, "Post edited successfully!"],
    [11, "Post deleted successfully!"],
]);
const msgCodesInUrl = url.searchParams.getAll("msg");
window.onload = function () {
    let html = ``;
    msgCodesInUrl.forEach((code) => {
        html += `<div class="msg show">${codeList.get(code)}</div>`
    })
    //continue...
}