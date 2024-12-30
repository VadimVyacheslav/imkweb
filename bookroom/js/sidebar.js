const burgerIcon = document.querySelector('.burger-icon');
const sidebar = document.querySelector('.sidebar');

// Toggle sidebar expansion
burgerIcon.addEventListener('click', () => {
  sidebar.classList.toggle('expanded');
});
