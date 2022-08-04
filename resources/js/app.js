import "./bootstrap";

const flashMessages = document.querySelectorAll(".flash-message");

const showFlashMessage = (flashMessage) => {
    flashMessage.classList.remove("opacity-0");
    flashMessage.classList.add("opacity-100");

    flashMessage.classList.remove("translate-x-full");
    flashMessage.classList.add("translate-x-0");
};

const hiddeFlashMessage = (flashMessage) => {
    flashMessage.classList.remove("opacity-100");
    flashMessage.classList.add("opacity-0");

    flashMessage.classList.remove("translate-x-0");
    flashMessage.classList.add("translate-x-full");
};

if (flashMessages.length > 0) {
    flashMessages.forEach((flashMessage) => showFlashMessage(flashMessage));

    setTimeout(() => {
        flashMessages.forEach((flashMessage) =>
            hiddeFlashMessage(flashMessage)
        );
    }, 5000);
}
