document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.getElementById("sidebarToggle");
    const sidebar = document.getElementById("sidebar");

    toggleButton.addEventListener("click", function() {
        sidebar.classList.toggle("collapsed");
    });
});
