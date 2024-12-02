// transisi sidenav-burger

var sidenav = document.querySelector("aside");
var sidenav_trigger = document.querySelector("[sidenav-trigger]");
var sidenav_close_button = document.querySelector("[sidenav-close]");
var burger = sidenav_trigger.firstElementChild;
var top_bread = burger.firstElementChild;
var bottom_bread = burger.lastElementChild;
var sidenav_links = document.querySelectorAll("aside a"); // Memilih semua tautan sidebar

// Logika buka/tutup sidebar
sidenav_trigger.addEventListener("click", function () {
  if (page == "virtual-reality") {
    sidenav.classList.toggle("xl:left-[18%]");
  }
  sidenav_close_button.classList.toggle("hidden");
  sidenav.classList.toggle("translate-x-0");
  sidenav.classList.toggle("shadow-soft-xl");
  if (page == "rtl") {
    top_bread.classList.toggle("-translate-x-[5px]");
    bottom_bread.classList.toggle("-translate-x-[5px]");
  } else {
    top_bread.classList.toggle("translate-x-[5px]");
    bottom_bread.classList.toggle("translate-x-[5px]");
  }
});

sidenav_close_button.addEventListener("click", function () {
  sidenav_trigger.click();
});

window.addEventListener("click", function (e) {
  if (!sidenav.contains(e.target) && !sidenav_trigger.contains(e.target)) {
    if (sidenav.classList.contains("translate-x-0")) {
      sidenav_trigger.click();
    }
  }
});

// Menambahkan status aktif untuk tautan sidebar
sidenav_links.forEach(function(link) {
  link.addEventListener("click", function() {
    // Menghapus kelas aktif dari semua tautan
    sidenav_links.forEach(function(l) {
      l.classList.remove("py-2.7", "shadow-soft-xl", "font-semibold", "bg-white", "text-slate-700");
    });

    // Menambahkan kelas aktif ke tautan yang diklik
    link.classList.add("py-2.7", "shadow-soft-xl", "font-semibold", "bg-white", "text-slate-700");
  });
});
