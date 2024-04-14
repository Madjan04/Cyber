const gameCardsContainerAZ = document.getElementById("game-cards-container");
const gameCardsAZ = gameCardsContainerAZ.querySelectorAll(".game-cards");

const sortedGameCardsAZ = Array.from(gameCardsAZ).sort((a, b) => {
  const aAZ = a.querySelector(".game-title").textContent.toLowerCase();
  const bAZ = b.querySelector(".game-title").textContent.toLowerCase();
  return aAZ.localeCompare(bAZ);
});

sortedGameCardsAZ.forEach((card) => {
  gameCardsContainerAZ.appendChild(card);
});