document.addEventListener('DOMContentLoaded', () => {
    /**
     * Off-canvas menu
     */
    const navLinks = document.querySelectorAll(".mobilize-toggle");

    navLinks.forEach((link, index) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();

            if (document.getElementById("mobilize-menu").classList.contains("show-nav")) {
                document.getElementById("mobilize-menu").classList.remove("show-nav");
                document.body.classList.remove("mobilize-no-scroll");
            } else {
                document.getElementById("mobilize-menu").classList.add("show-nav");
                document.body.classList.add("mobilize-no-scroll");
            }
        });
    });
});
