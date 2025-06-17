// JavaScript code for the modal popup
const viewMoreLinks = document.querySelectorAll('.view-more');
const modals = document.querySelectorAll('.modal');
const closeButtons = document.querySelectorAll('.close');

viewMoreLinks.forEach((link, index) => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        modals[index].style.display = 'block';
    });
});

closeButtons.forEach((closeButton, index) => {
    closeButton.addEventListener('click', function () {
        modals[index].style.display = 'none';
    });
});

const searchBox = document.getElementById("search-box");
const boxes = document.querySelectorAll(".box");

searchBox.addEventListener("input", () => {
    const searchTerm = searchBox.value.toLowerCase();

    boxes.forEach(box => {
        const boxText = box.innerText.toLowerCase();
        if (boxText.includes(searchTerm)) {
            box.style.display = "block";
        } else {
            box.style.display = "none";
        }
    });
});
