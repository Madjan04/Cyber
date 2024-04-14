


const searchInput = document.querySelector(".search-input");
const gameCards3 = document.querySelectorAll(".game-cards");

function filterGameCards2() {
  const searchQuery = searchInput.value.trim().toLowerCase();

  gameCards3.forEach((card) => {
    const title = card.querySelector(".game-title").textContent.toLowerCase();
    if (title.includes(searchQuery)) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
}

searchInput.addEventListener("input", filterGameCards2);

searchInput.addEventListener("keydown", (event) => {
  if (event.key === "Enter") {
    filterGameCards2();
  }
});

//featured js //

const featured_card = document.getElementById('featured');

featured_card.addEventListener('click', function() {
  // Access featured game
  window.location.href = '#'; 
});

//game details //

    function gameDetails(id) {
        window.location.href = "game-details.php?game-id=" + id;
    }

    function profile(id) {
      window.location.href = "/CYBER+/profile.php?id=" + id;
  }
