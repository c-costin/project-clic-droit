const app = {
  elementContainerServiceTable: document.querySelector(".js-containerTable"),
  elementModalFormService: document.getElementById("myModal"),
  elementFormService: document.querySelector(".formulaire-custom"),
  elementBtnSubimtService: document.querySelector(".js-btnSubmitService"),
  elementsBtnDeleteService: document.querySelectorAll(".js-btnDeleteService"),

  init: () => {
    app.attachEvents();
  },

  attachEvents: () => {
    app.elementBtnSubimtService.addEventListener( "click", app.handleSubmitService);
    app.elementsBtnDeleteService.forEach((element) => {
      element.addEventListener("click", app.handleDeleteService);
    });
  },

  handleSubmitService: async (event) => {
    // event.preventDefault();

    const data = {
        worksite: parseInt(document.getElementById("heure_chantier").value),
        service: parseInt(document.getElementById("heure_prestation").value),
        january: document.getElementById("heure_mois_1").value,
        february: document.getElementById("heure_mois_2").value,
        march: document.getElementById("heure_mois_3").value,
        april: document.getElementById("heure_mois_4").value,
        may: document.getElementById("heure_mois_5").value,
        june: document.getElementById("heure_mois_6").value,
        july: document.getElementById("heure_mois_7").value,
        august: document.getElementById("heure_mois_8").value,
        september: document.getElementById("heure_mois_9").value,
        october: document.getElementById("heure_mois_10").value,
        november: document.getElementById("heure_mois_11").value,
        december: document.getElementById("heure_mois_12").value,
    }

    const response = await fetch(`http://localhost:8000/api/service/add`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        worksite: data.worksite,
        service: data.service,
        january: data.january,
        february: data.february,
        march: data.march,
        april: data.april,
        may: data.may,
        june: data.june,
        july: data.july,
        august: data.august,
        september: data.september,
        october: data.october,
        november: data.november,
        december: data.december,
      }),
    });

    const service = await response.json();

    app.addToDom(service);
  },

  handleDeleteService: async (event) => {
    let service = event.currentTarget.parentNode.parentNode;
    let id = service.dataset.id;

    const response = await fetch(
      `http://localhost:8000/api/service/delete/${id}`,
      {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
        },
      }
    );

    if (response.status === 204) {
      service.remove();
    }
  },

  /**
   * Add service to DOM
   *
   * @param {object} data
   */
  addToDom: function (data) {
    const templateService = document.getElementById("service-template");

    const newService = templateService.content.cloneNode(true);

    newService.querySelector("tr").dataset.id = data.id;
    newService.querySelector(`[data-worksite]`).textContent = data.worksite;
    newService.querySelector(`[data-service]`).textContent = data.service;
    newService.querySelector(`[data-january]`).textContent = data.january;
    newService.querySelector(`[data-february]`).textContent = data.february;
    newService.querySelector(`[data-march]`).textContent = data.march;
    newService.querySelector(`[data-april]`).textContent = data.april;
    newService.querySelector(`[data-may]`).textContent = data.may;
    newService.querySelector(`[data-june]`).textContent = data.june;
    newService.querySelector(`[data-july]`).textContent = data.july;
    newService.querySelector(`[data-august]`).textContent = data.august;
    newService.querySelector(`[data-september]`).textContent = data.september;
    newService.querySelector(`[data-october]`).textContent = data.october;
    newService.querySelector(`[data-november]`).textContent = data.november;
    newService.querySelector(`[data-december]`).textContent = data.december;
    newService.querySelector(`[data-hourMonthTotal]`).textContent = data.title;

    document.getElementById("rows").appendChild(newService);
  },
};

document.addEventListener("DOMContentLoaded", app.init);
