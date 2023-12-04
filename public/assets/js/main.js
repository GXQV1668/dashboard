// main.js
document.addEventListener('DOMContentLoaded', function () {
    const listItems = document.querySelectorAll(".sidebar-list li");
    function testJavaScript() {
        console.log('Le fichier JavaScript est correctement lié.');
    }
    listItems.forEach((item) => {
        item.addEventListener("click", () => {
            let isActive = item.classList.contains("active");

            listItems.forEach((el) => {
                el.classList.remove("active");
            });

            if (!isActive) {
                item.classList.add("active");
            }
        });
    });

    const toggleSidebar = document.querySelector(".toggle-sidebar");
    const logo = document.querySelector(".logo-box");
    const sidebar = document.querySelector(".sidebar");

    toggleSidebar.addEventListener("click", () => {
        toggleSidebarFunction();
    });

    function toggleSidebarFunction() {
        sidebar.classList.toggle("close");
    }

    // Check if logo element exists before adding event listener
    if (logo) {
        logo.addEventListener("click", () => {
            toggleSidebarFunction();
        });
    }
});
