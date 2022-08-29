import postsFromDB from "../data.json" assert {type: "json"};
import buildAllPostsEdit from "./build-posts-edit.js";
import buildAllPosts from "./build-posts.js";

const postContainer = document.querySelector(".post-container");

const url = new URL(window.location);
const filterMenu = document.querySelector(".filter-menu");

const all = document.querySelector("#all");
const group1 = document.querySelector("#group1");
const group2 = document.querySelector("#group2");
const paramAll = url.searchParams.get("all")
const paramGroup1 = url.searchParams.get("group1")
const paramGroup2 = url.searchParams.get("group2")

window.onload = function () {
    postContainer.innerHTML = buildAllPostsEdit(postsFromDB);
    if (url.searchParams.get("all") === "1") {
        all.classList.add("active")
    }
    if (url.searchParams.get("group1") === "1") {
        group1.classList.add("active")
    }
    if (url.searchParams.get("group2") === "1") {
        group2.classList.add("active")
    };
}

// click filter buttons
filterMenu.addEventListener("click", (e) => {
    const filterButton = e.target.innerText; // get button's text
    const allPosts = document.querySelectorAll(".post"); // select all these posts
    const filters = [all, group1, group2];

    // buttons colours
    filters.forEach((x) => {
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
