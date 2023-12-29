const app = {
    elementFormService: document.querySelector(".formulaire-custom"),
    elementBtnSubimtService: document.querySelector(".js-btnSubmitService"),
    elementBtnDeleteService: document.querySelector(".js-btnDeleteService"),

    init: () => {
        app.attachEvents();
    },

    attachEvents: () => {
        app.elementBtnSubimtService.addEventListener("click", app.handleSubmitService)
        app.elementBtnSubimtService.addEventListener("click", app.handleDeleteService)
    },

    handleSubmitService: () => {},

    handleDeleteService: async () => {
        let id = app.elementBtnDeleteService.dataset.id

        const response = await fetch(`/api/service/delete/${id}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json"
            },
        });

        if (response.status === 204) {
            parentElement.remove();
        }
    },
}

document.addEventListener("DOMContentLoaded", app.init);