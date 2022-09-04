const url = new URL(window.location);


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
        if (!e.target.classList.contains("smallbutton")) return;

        // buttons colours
        groupObjects.forEach((x) => {
            if (x.innerText === filterButton) {
                x.style.background = "#a3d0e5";
            } else {
                x.style.background = "#fff";
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


// Make the messages from url codes
const codeList = new Map([
    ["1", "Wrong password!"],
    ["2", "Email not registered!"],
    ["3", "Error processing request!"],
    ["4", "Could not prepare statement!"],
    ["5", "Missing data!"],
    ["6", "All field must be fulfilled!"],
    ["7", "Invalid email!"],
    ["8", "Password must be between 5 and 20 characters long!"],
    ["9", "Email already registered!"],
    ["10", "Post edited successfully!"],
    ["11", "Post deleted successfully!"],
    ["12", "A group is already registered with this name!"],
    ["13", "New group created!"],
    ["14", "Session closed. Login required!"],
    ["15", "Just testing..."],
]);

const msgCodesInUrl = url.searchParams.getAll("msg");
const msgContainer = document.querySelector(".msg-container");

window.onload = function () {
    // Message box
    let html = ``;
    msgCodesInUrl.map((code) => {
        html += `
        <div class="msg show">
            <i class="fa-sharp fa-solid fa-circle-exclamation"></i>
            ${codeList.get(code)}
            <div class="msg-bar"></div>
        </div>
        `;
    });
    msgContainer.innerHTML = html;
    const allMsg = document.querySelectorAll(".msg");

    // Add click effect to remove messages
    allMsg.forEach(msg => {
        msg.addEventListener("click", (e) => {
            msg.classList.remove("show");
        });
    });
};

// burgermenu
const burgerMenu = document.querySelector("#burgermenu");
burgerMenu.addEventListener("click", () => {
    document.querySelectorAll(".menu-opt").forEach((li) => {
        if (li.style.display === "flex") {
            li.style.display = "none"
            burgerMenu.innerHTML = `<i class="fa-sharp fa-solid fa-bars"></i>`;
        } else {
            li.style.display = "flex";
            burgerMenu.innerHTML = `<i class="fa-solid fa-xmark"></i>`;
        }
    });
});

window.addEventListener("resize", () => {
    if (innerWidth > 700) {
        burgerMenu.style.display = "none";
        document.querySelectorAll(".menu-opt").forEach((li) => li.style.display = "flex");
    } else {
        burgerMenu.style.display = "flex";
        burgerMenu.innerHTML = `<i class="fa-sharp fa-solid fa-bars"></i>`;
        document.querySelectorAll(".menu-opt").forEach((li) => li.style.display = "none");
    }
});

