
function changeTab(os) {
  document.querySelectorAll('.requirements').forEach(function (el) {
    el.classList.add('hidden');
  });
  document.getElementById(os).classList.remove('hidden');

  document.querySelectorAll('.icon-tab').forEach(function (el) {
    el.classList.remove('border-blue-500');
    el.classList.add('border-transparent');
  });
  document.querySelectorAll('.icon-tab').forEach(function (el) {
    if (el.textContent.toLowerCase().includes(os)) {
      el.classList.add('border-blue-500');
    }
  });
}

function changeTab(tabId) {
  document.querySelectorAll('.requirements').forEach(function (tabContent) {
    tabContent.classList.remove('active');
  });

  document.querySelectorAll('.tab').forEach(function (tab) {
    tab.classList.remove('active-tab');
  });

  document.getElementById(tabId).classList.add('active');

  document.querySelector('.tab[onclick="changeTab(\'' + tabId + '\')"]').classList.add('active-tab');
}
