const height = window.innerHeight;
const home = height;
const screen1 = height * 2;
const screen2 = height * 3;
const screen3 = height * 4;

window.onscroll = function () {
    const y = window.scrollY;

    addRemoveNav(y < home);

    addRemove("0-link", y < home);
    addRemove("1-link", y < screen1 && y >= home);
    addRemove("2-link", y < screen2 && y >= screen1);
    addRemove("3-link", (y <= screen3 && y >= screen2) || y > screen3);
};

function addRemove(id, isAdd, isHome) {
    const element = document.getElementById(id);
    const icon = document.getElementById(id + "-icon");

    if (isAdd) {
        element.classList.add("border-b-4");
        element.classList.add("border-accent-light");
        element.classList.add("dark:border-accent-dark");
        element.classList.add("text-accent-light");
        element.classList.add("dark:text-accent-dark");

        icon.classList.add("fa-circle-dot");
        icon.classList.add("text-accent-light");
        icon.classList.add("dark:text-accent-dark");
        icon.classList.remove("fa-circle");
    } else {
        element.classList.remove("border-b-4");
        element.classList.remove("border-accent-light");
        element.classList.remove("dark:border-accent-dark");
        element.classList.remove("text-accent-light");
        element.classList.remove("dark:text-accent-dark");

        icon.classList.remove("fa-circle-dot");
        icon.classList.remove("text-accent-light");
        icon.classList.remove("dark:text-accent-dark");
        icon.classList.add("fa-circle");
    }
}

function addRemoveNav(isAdd) {
    const nav = document.querySelector("nav");
    if (isAdd) {
        nav.classList.add("text-primary-light");
        nav.classList.remove("dark:bg-secondary-dark");
        nav.classList.remove("bg-secondary-light");
    } else {
        nav.classList.remove("text-primary-light");
        nav.classList.add("dark:bg-secondary-dark");
        nav.classList.add("bg-secondary-light");
    }
}

addRemoveNav(true);
addRemove("0-link", true);
