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
    ["a", "Wrong password!"],
    ["b", "Email not registered!"],
    ["c", "Error processing request!"],
    ["d", "Could not prepare statement!"],
    ["e", "Missing data!"],
    ["f", "All field must be fulfilled!"],
    ["g", "Invalid email!"],
    ["h", "Password must be between 5 and 20 characters long!"],
    ["i", "Email already registered!"],
    ["j", "Post edited successfully!"],
    ["k", "Post deleted successfully!"],
    ["l", "A group is already registered with this name!"],
    ["m", "New group created!"],
    ["n", "Session closed. Login required!"],
    ["o", "User registered succesfully! Now you can login."],
    ["p", "Login successfull. Welcome!"],
    ["q", "User logged out!"],
    ["r", "Group deleted successfully!"],
    ["s", "New post created successfully!"],
    ["t", "You'll receive an e-mail to reset your password."],
]);

// Msg types: s(success), f(failure)
const statusList = new Map([
    ["s", `<i class="fa-solid fa-circle-check"></i>`],
    ["e", `<i class="fa-solid fa-circle-exclamation"></i>`],
    ["i", `<i class="fa-solid fa-circle-info"></i>`],
    ["d", `<i class="fa-solid fa-circle-xmark"></i>`],
]);

const msgCodesInUrl = url.searchParams.getAll("msg");
const msgContainer = document.querySelector(".msg-container");

window.onload = function () {
    // Message box
    let html = ``;
    msgCodesInUrl.map((code) => {
        html += `
        <div class="msg show">
            ${statusList.get(code[0])}
            ${codeList.get(code[1])}
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
            burgerMenu.innerHTML = `<i class="fa-solid fa-circle-xmark"></i>`;
        }
    });
});

// Resize fix for hamburgermenu
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

// Carousel slider
const carousels = document.querySelectorAll(".carousel_activator");
setInterval(function rotate() {
    for (let i = (carousels.length - 1); i >= 0; i--) {
        let next = i === (carousels.length - 1) ? 0 : (i + 1);
        if (carousels[i].checked) {
            carousels[next].checked = true;
            carousels[i].checked = false;
            return;
        }
    }
}, 5000);

