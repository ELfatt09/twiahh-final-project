   function active(element) {
    // Ubah gaya tab aktif
    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.classList.remove('border-primary');
      btn.classList.add('border-black');
    });

    element.classList.remove('border-black');
    element.classList.add('border-primary');

    // Ubah konten tab
    const isForYou = element.textContent.trim() === "For You";
    document.getElementById("forYou").classList.toggle("hidden", !isForYou);
    document.getElementById("following").classList.toggle("hidden", isForYou);
  }

   let hasLiked = false;

  function toggleLike() {
    const likeSpan = document.getElementById("likeCount");
    const likeIcon = document.getElementById("likeIcon");
    const burst = document.getElementById("burst");

    let current = parseInt(likeSpan.innerText.replace(/,/g, ''));

    if (!hasLiked) {
      // LIKE
      current += 1;
      likeSpan.innerText = current.toLocaleString();
      likeIcon.classList.remove("fa-regular");
      likeIcon.classList.add("fa-solid", "text-primary");
      hasLiked = true;

      // Tampilkan efek burst
      burst.classList.remove("opacity-0", "scale-0");
      burst.classList.add("opacity-50", "scale-150");

      // Sembunyikan kembali efek burst setelah 300ms
      setTimeout(() => {
        burst.classList.add("opacity-0", "scale-0");
        burst.classList.remove("opacity-50", "scale-150");
      }, 300);
    } else {
      // UNLIKE
      current -= 1;
      likeSpan.innerText = current.toLocaleString();
      likeIcon.classList.remove("fa-solid", "text-primary");
      likeIcon.classList.add("fa-regular");
      hasLiked = false;
    }
  }

  let hasReposted = false;

  function toggleRepost() {
    const icon = document.getElementById("repostIcon");

    if (!hasReposted) {
      // Aktifkan repost
      icon.classList.remove("text-black");
      icon.classList.add("text-primary");
      hasReposted = true;
    } else {
      // Nonaktifkan repost
      icon.classList.remove("text-primary");
      icon.classList.add("text-black");
      hasReposted = false;
    }
  }
  
  let hasSaved = false;

  function toggleSave() {
    const save = document.getElementById("saveIcon");

    if (!hasSaved) {
      // Aktifkan repost
      save.classList.remove("fa-regular", "text-black");
      save.classList.add("fa-solid", "text-primary");
      hasSaved = true;
    } else {
      // Nonaktifkan repost
      save.classList.remove("fa-solid", "text-primary");
      save.classList.add("fa-regular","text-black");
      hasSaved = false;
    }
  }

  let isFollowed = false;

  function toggleFollow() {
    const btn = document.getElementById("followBtn");

    isFollowed = !isFollowed;

    if (isFollowed) {
      btn.textContent = "Followed";
      btn.classList.remove("text-secondary");
      btn.classList.add("text-primary");
    } else {
      btn.textContent = "Follow";
      btn.classList.remove("text-primary");
      btn.classList.add("text-secondary");
    }
  }

  const toggleBtn = document.getElementById('menu-toggle');
  const sidebar = document.getElementById('sidebar');

  toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      if (sidebar.classList.contains('w-96')) {
          sidebar.classList.remove('w-96');
          sidebar.classList.add('w-0');
      } else {
          sidebar.classList.add('w-96');
          sidebar.classList.remove('w-0');
      }
  });

//   Profile
let followers = [
    "Sevalino", "wafi", "Hilmi", "Aiman", "Afiq", "Zul", "Hakim", "Farhan", "Syafiq", "Arif",
    "Danish", "Faiz", "Imran", "Naufal", "Izzat", "Amin", "Rizal", "Haris", "Taufiq", "Firdaus",
    "Azim", "Fahmi", "Khairul", "Siti", "Nurul", "Aisyah", "Nadia", "Sarah", "Fatin", "Amira",
    "Balqis", "Nurin", "Aina", "Farah", "Irdina", "Zulaikha", "Hannah", "Nabila", "Adlina", "Liyana",
    "Sofea", "Diyana", "Raihan", "Alif", "Azlan", "Syazwan", "Haikal", "Shafiq", "Fikri", "Iqbal",
    "Hakimi", "Rafiq", "Muaz", "Maisarah", "Syahirah", "Najwa", "Dayana", "Atikah", "Zarina", "Alia",
    "Tasya", "Dahlia", "Melati", "Mika", "Khalish", "Elisa", "Hafiz", "Syamil", "Anis", "Irfan",
    "Yusof", "Saiful", "Yusuf", "Adam", "Mikael", "Iskandar", "Reza", "Ilham", "Aidil", "Daniel",
    "Nizam", "Akmal", "Aqil", "Humaira", "Qistina", "Khairunnisa", "Syuhada", "Faris", "Maisara", "Adib",
    "Yana", "Zikri", "Luqman", "Shazana", "Wani", "Zaim", "Ellyna", "Irham", "Fahda", "Ruzaini",
    "Roslan", "cecep"
  ];

  let following = ["Ibnu", "Yazid"];

  function showTab(tabId) {
    const tabs = ['view-tab', 'edit-tab'];
    tabs.forEach(id => document.getElementById(id).classList.add('hidden'));
    document.getElementById(tabId).classList.remove('hidden');

    const btns = ['btn-view', 'btn-edit'];
    btns.forEach(id => {
      const btn = document.getElementById(id);
      btn.classList.remove('bg-transparent', 'text-secondary', 'border-secondary');
      btn.classList.add('bg-primary', 'border-primary', 'text-black');
    });

    const activeBtn = document.getElementById('btn-' + tabId.split('-')[0]);
    activeBtn.classList.remove('bg-primary', 'text-black');
    activeBtn.classList.add('bg-transparent', 'text-secondary', 'border-secondary');
  }

  function updateCounts() {
    // document.getElementById("followers-count").textContent = {{ $user ? $user->followers->count() : Auth::user()->followers->count() }};
    // document.getElementById("following-count").textContent = {{ $user ? $user->follows->count() : Auth::user()->following->count() }};
  }

  function renderList(containerId, dataArray, type) {
    const container = document.getElementById(containerId);
    container.innerHTML = "";

    dataArray.forEach((name, index) => {
      const userCard = document.createElement("div");
      userCard.className = "flex items-center justify-between p-3 bg-white rounded-lg shadow-sm";

      const avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=random&size=64&rounded=true`;

      userCard.innerHTML = `
        <div class="flex items-center gap-4">
          <img src="${avatarUrl}" class="w-10 h-10 rounded-full object-cover" alt="${name}" />
          <div class="text-sm">
            <p class="font-semibold text-gray-800">${name}</p>
            <p class="text-xs text-gray-500">@${name.toLowerCase()}</p>
          </div>
        </div>
        <button class="remove-btn text-sm text-white bg-red-500 px-3 py-1 rounded-full hover:bg-red-600" data-index="${index}" data-type="${type}">Remove</button>
      `;

      container.appendChild(userCard);
    });

    attachRemoveEvents(); 
  }
  function attachRemoveEvents() {
    document.querySelectorAll(".remove-btn").forEach(button => {
      button.addEventListener("click", function () {
        const index = parseInt(this.getAttribute("data-index"));
        const type = this.getAttribute("data-type");

        if (type === "followers") {
          followers.splice(index, 1);
          renderList("followers-container", followers, "followers");
        } else {
          following.splice(index, 1);
          renderList("following-container", following, "following");
        }

        updateCounts();
      });
    });
  }

  function toggleList(listId) {
    const lists = ['followers-list', 'following-list'];
    lists.forEach(id => {
      const el = document.getElementById(id);
      if (id === listId) {
        el.classList.toggle('hidden');
      } else {
        el.classList.add('hidden');
      }
    });
  }

  document.addEventListener("DOMContentLoaded", function () { 
    let settingsData = {
  email: "yazid@example.com",
  password: "",
  language: "Indonesia"
};

document.addEventListener("DOMContentLoaded", function () {
 
  document.querySelector("#settings-tab form").addEventListener("submit", function(e) {
    e.preventDefault();

    const emailInput = this.querySelector('input[type="email"]');
    const passwordInput = this.querySelector('input[type="password"]');
    const languageSelect = this.querySelector('select');

    // Simpan data settings ke objek
    settingsData.email = emailInput.value;
    settingsData.password = passwordInput.value; 
    settingsData.language = languageSelect.value;

    alert("Settings berhasil disimpan!");

    passwordInput.value = "";

    showTab('view-tab');
  });
});

    showTab('view-tab');
    updateCounts();
    renderList("followers-container", followers, "followers");
    renderList("following-container", following, "following");

    document.getElementById('edit-form').addEventListener('submit', function (e) {
      e.preventDefault();
      const newName = document.getElementById('edit-name').value;
      const newUsername = document.getElementById('edit-username').value;
      const newBio = document.getElementById('edit-bio').value;

      document.getElementById('view-name').textContent = newName;
      document.getElementById('view-username').textContent = newUsername;
      document.getElementById('view-bio').textContent = newBio;

      showTab('view-tab');
    });
  });
//   Profile

    function openModal(parentID = null, repostID = null) {
      const modal = document.getElementById('modal')
      const parent_id_input = document.getElementById('parent_id')
      const repost_id_input = document.getElementById('repost_id')
      modal.classList.remove('hidden')
      parent_id_input.value = parentID
      repost_id_input.value = repostID
}
    function closeModal() {
      const modal = document.getElementById('modal')
      const parent_id_input = document.getElementById('parent_id')
      const repost_id_input = document.getElementById('repost_id')
      modal.classList.add('hidden')
      parent_id_input.value = null
      repost_id_input.value = null
}
    
window.openModal = openModal
window.closeModal = closeModal

    function openModalReply(parentID = null, repostID = null) {
      const modal = document.getElementById('modal')
      const parent_id_input = document.getElementById('parent_id')
      const repost_id_input = document.getElementById('repost_id')
      modal.classList.remove('hidden')
      parent_id_input.value = parentID
      repost_id_input.value = repostID
}
    function closeModalReply() {
      const modal = document.getElementById('modalReply')
      const parent_id_input = document.getElementById('parent_id')
      const repost_id_input = document.getElementById('repost_id')
      modal.classList.add('hidden')
      parent_id_input.value = null
      repost_id_input.value = null
}
    
window.openModalReply = openModalReply
window.closeModalReply = closeModalReply
window.showTab = showTab

        function hashtag() {
          const textarea = document.getElementById("text-col");
          
          textarea.value += " #";
        }

        document.documentElement.classList.remove('dark');
localStorage.setItem('theme', 'light');
    
document.addEventListener("DOMContentLoaded", function () {
  const dateElement = document.getElementById("date");
  
  function updateDate() {
    const now = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZone: 'Asia/Jakarta'};
    const formattedDate = now.toLocaleDateString('en-US', options);
    dateElement.textContent = formattedDate;
  }

  updateDate();
});

