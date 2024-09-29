export default function () {
  const toggleButton = document.getElementById('toggle-dark-mode');
  const currentMode = localStorage.getItem('dark-mode');

  if (currentMode === 'enabled') {
    document.body.classList.add('dark-mode');
  }

  toggleButton.addEventListener('click', function () {
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
      localStorage.setItem('dark-mode', 'enabled');
    } else {
      localStorage.setItem('dark-mode', 'disabled');
    }
  });
}
