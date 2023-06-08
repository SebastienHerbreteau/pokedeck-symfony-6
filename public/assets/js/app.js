function getPokemon(id) {
  fetch(`pokedeck/${id}`)
    .then((response) => response.json())
    .then((pokemon) => {

      let modal = document.querySelector(".modal");

      modal.innerHTML = `
    <img id="close" src="assets/img/other/close.webp" alt="fermer">
    <img class="star" style="width:40px;left:30px;top:5%" src="assets/img/other/star.png" alt="pictogramme d'une étoile">
  
        <div class="typeModal">${type(pokemon)}</div>

        <div class="spec">
            <div class="section2">
            <div class="immunise ff">${immunise(pokemon)}</div>
                    <div class="tresResistant ff">${tresResistant(
                      pokemon
                    )}</div>
                    <div class="resistant ff">${resistant(pokemon)}</div>
                    <div class="neutre ff">${normal(pokemon)}</div>
                    <div class="vulnerable ff">${vulnerable(pokemon)}</div>
                    <div class="tresVulnerable ff">${tresVulnerable(
                      pokemon
                    )}</div>
            </div>
    <div class="section1">
              <div class="ff">HP : ${pokemon.hp}</div>
              <div class="ff">Attaque : ${pokemon.attack}</div>
              <div class="ff">Défense : ${pokemon.defense}</div>
              <div class="ff">Attaque spéc. : ${pokemon.specialAttack}</div>
              <div class="ff">Défense spéc. : ${pokemon.specialDefense}</div>
              <div class="ff">Vitesse : ${pokemon.speed}</div><br>
    </div>
        </div>
        <img class="imgPokeModal" src="assets/img/pokemons/${
          pokemon.id
        }.webp" alt="image de ${pokemon.name}">
        <h2 class="h2Modal">${pokemon.name}</h2>
        <div class="id"><p>#${pokemon.id}</p></div>
       
    </div>
    `;
    });
}

//-----------------------------------------------COMPORTEMENT MODAL AU CLICK SUR LES CARDS------------------------------------//

let modal = document.querySelector(".modal");
let imgPokes = document.querySelectorAll(".imgPoke");



imgPokes.forEach((imgPoke) => {
  imgPoke.addEventListener("click", (event) => {
    modal.classList.add("modalActive");
    let id = event.currentTarget.dataset.id;
    getPokemon(id);

    window.onclick = function (e) {
      if (e.target.id === "close") {
        modal.innerHTML = "";
        modal.classList.remove("modalActive");
      }
    };
  });
});

//-----------------------------------------------FONCTION PERMETTANT D'AFFICHER LES TYPES------------------------------------//

function type(pokemon) {
  if (pokemon.type2 === "NULL") {
    return `<div class="type1"><img class="typeImage" src="${pokemon.imgType1}" alt="image de ${pokemon.type1}"/>
                <p>${pokemon.type1}</p></div>`;
  } else {
    return `<div class="type2"><img class="typeImage" src="${pokemon.imgType2}" alt="image de ${pokemon.type2}"/>
                <p>${pokemon.type2}</p></div>
                <div class="type1"><img class="typeImage" src="${pokemon.imgType1}" alt="image de ${pokemon.type1}"/>
                <p>${pokemon.type1}</p></div>`;
  }
}

//-----------------------------------------------FONCTION PERMETTANT D'APPLIQUER UNE CLASS CSS EN FONCTION DE LA VALEUR D'UNE ENTREE------------------------------------//

function immunise(pokemon) {
  let stats = Object.entries(pokemon);
  let recup = "";
  for (stat of stats) {
    if (stat[1] === "Immunisé") {
      recupDamage = `<span><p>${stat[0]} : </p><p class="gold"> &nbsp;Immunisé</p></span>`;
      recup += recupDamage;
    }
  }
  return recup;
}

function tresResistant(pokemon) {
  let stats = Object.entries(pokemon); 
  let recup = "";
  for (stat of stats) {
    if (stat[1] === "Très résistant") {
      recupDamage = `<span><p>${stat[0]} : </p><p class="silver">&nbsp;Très résistant</p></span>`;
      recup += recupDamage;
    }
  }
  return recup;
}

function resistant(pokemon) {
  let stats = Object.entries(pokemon);
  let recup = "";
  for (stat of stats) {
    if (stat[1] === "Résistant") {
      recupDamage = `<span><p>${stat[0]} : </p><p class="green">&nbsp;Résistant</p></span>`;
      recup += recupDamage;
    }
  }
  return recup;
}

function vulnerable(pokemon) {
  let stats = Object.entries(pokemon);
  let recup = "";
  for (stat of stats) {
    if (stat[1] === "Vulnérable") {
      recupDamage = `<span><p>${stat[0]} : </p><p class="orange">&nbsp;Vulnérable</p></span>`;
      recup += recupDamage;
    }
  }
  return recup;
}

function tresVulnerable(pokemon) {
  let stats = Object.entries(pokemon);
  let recup = "";
  for (stat of stats) {
    if (stat[1] === "Très vulnérable") {
      recupDamage = `<span><p>${stat[0]} : </p><p class="rouge">&nbsp;Très vulnérable</p></span>`;
      recup += recupDamage;
    }
  }
  return recup;
}

function normal(pokemon) {
  let stats = Object.entries(pokemon);
  let recup = "";
  for (stat of stats) {
    if (stat[1] === "neutral") {
      recupDamage = `<span><p>${stat[0]} : </p><p class="blue">&nbsp;Normal</p></span>`;
      recup += recupDamage;
    }
  }
  return recup;
}

//---------------------------------------------MENU BURGER---------------------------------------------------------------------

let burger = document.querySelector(".burger");
let haut = document.querySelector(".haut");
let centre = document.querySelector(".centre");
let bas = document.querySelector(".bas");
let nav = document.querySelector(".navigation");

burger.addEventListener("click", () => {
  haut.classList.toggle("active-rota-haut");
  centre.classList.toggle("active-bg-centre");
  bas.classList.toggle("active-rota-bas");
  nav.classList.toggle("active-nav");
});

//---------------------------------------------ALERT MESSAGE---------------------------------------------------------------------

let alertMessage = document.querySelector(".alert-message");
var modalAlert = document.querySelector(".modal-alert");

alertMessage.addEventListener("mouseover", ()=>{
  alertMessage.style.right = '0px'
})

alertMessage.addEventListener("mouseleave", ()=>{
  alertMessage.style.right = '-140px'
})

//---------------------------------------------MODAL ALERT---------------------------------------------------------------------

alertMessage.addEventListener("click",()=>{
  
  modalAlert.innerHTML=`<div class="advisor-activation">
  <img id="close-alert-advisor" src="assets/img/other/close.webp" alt="fermer">
  Votre compte n'est pas actif.<br><br> Un mail contenant un lien d'activation vous a été envoyé lors de votre inscription.
  Si vous ne l'avez pas reçu, faites une nouvelle demande en cliquant sur ce lien.
  <br><br><br>
  <p id="activation-link">Renvoyer le mail d'activation</p>
  <div>
  `
  modalAlert.classList.add("modalActive");
})

window.onclick = function (e) {
  if (e.target.id === "close-alert-advisor") {
    modalAlert.innerHTML = "";
    modalAlert.classList.remove("modalActive");
  }
  if (e.target.id === "activation-link") {
    modalAlert.innerHTML = `<img id="close-alert-advisor" src="assets/img/other/close.webp" alt="fermer">Un mail contenant un nouveau lien d'activation vient de vous être envoyé`;
  }
};


//-----------------------------AJOUT FAVORIS------------------------------------------------------------------------------------

// Écouteur d'événement pour les clics sur les étoiles favoris
let stars = document.querySelectorAll('.star');
stars.forEach(star => {
  star.addEventListener("click", (event) => {
    const id = event.currentTarget.dataset.id; // Récupérer l'ID du Pokémon depuis l'attribut data-id de la classe "star"
    const fav = event.currentTarget.dataset.fav; // Récupérer 1 sur favoris, 0 si non depuis l'attribut data-fav de la classe "star"
    if (fav === "0") {
      const url = `pokedeck/favoris/add/${id}`; // URL de la route Symfony
      gererFav(url, "POST");
      star.src = "/assets/img/other/yellow-star.png";
      event.currentTarget.dataset.fav = "1";
    } else{
      const url = `pokedeck/favoris/remove/${id}`; // URL de la route Symfony
      gererFav(url, "DELETE");
      star.src = "/assets/img/other/star.png";
      event.currentTarget.dataset.fav = "0";
    }
  });
});


  

  //Fonction envoi de la requête avec fetch()
  function gererFav(url, method){
  fetch(url, {
    method: method,
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    }
  })
  .then(response => {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error('Une erreur s\'est produite lors de la requête AJAX.');
    }
  })
  .then(data => {
    console.log(data.response);
  })
  .catch(error => {
    console.error(error);
  });
    } 

  //------------------------------------PAGINATION JS------------------------------------------------//

//   const container = document.querySelector('.container-cards');
// let offset = 50; // Ou la valeur initiale pour le décalage
// let limit = 50; 
// let url = `/pokedeck/${offset}&${limit}`;

// window.addEventListener('scroll', function() {
//     const scrollPosition = window.pageYOffset;
//     const windowSize = window.innerHeight;
//     const documentHeight = document.documentElement.offsetHeight;

//     if (scrollPosition + windowSize >= documentHeight) {
//         // Requête AJAX pour récupérer les nouveaux pokémons
//         // Utilisez l'offset pour récupérer les résultats suivants
//         fetch(url)
//             .then(response => response.json())
//             .then(pokemons => {
//                 // Ajoutez les nouveaux pokémons à la section de l'infinite scroll
//                 pokemons.forEach(pokemon => {
//                   console.log(pokemon)
//                     const div = document.createElement('div');
//                     div.classList.add("card");
//                     div.innerHTML = `<img src="${pokemon.imgType1}"></img>`;
//                     container.appendChild(div);
//                 });

//                 offset += pokemons.length; // Mettez à jour le décalage pour la prochaine requête
//             });
//     }
// });


