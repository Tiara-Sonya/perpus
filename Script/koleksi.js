const body = document.querySelector("body"),
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
});
const keywordInput = document.getElementById('keyword');
const bookContainer = document.getElementById('book-container');

keywordInput.addEventListener('input', function () {
  const keyword = this.value.trim();

  if (keyword === '') {
    showInitialData();
  } else {
    searchBooks(keyword);
  }
});

function showInitialData() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', '../users/tampilbuku.php', true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      bookContainer.innerHTML = xhr.responseText;
    }
  };

  xhr.send();
}

function searchBooks(keyword) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', '../users/caribuku.php?keyword=' + keyword, true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      bookContainer.innerHTML = xhr.responseText;
    }

    if (bookContainer.innerHTML === '') {
      bookContainer.innerHTML = '<p>Buku yang Anda cari tidak ada</p>';
    }
  };

  xhr.send();
}

showInitialData();

bookContainer.addEventListener('click', function (event) {
  if (event.target.classList.contains('baca-btn')) {
    const bookId = event.target.dataset.id;
    window.location.href = 'baca.php?id=' + bookId;
  }
});
