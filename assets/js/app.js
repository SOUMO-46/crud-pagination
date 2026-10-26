document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', () => {
      const id = button.dataset.id;
      const name = button.dataset.name || 'this student';
      if (!confirm(`Delete ${name}?\nThis action cannot be undone.`)) return;
      const form = document.createElement('form');
      form.method = 'POST'; form.action = 'delete.php';
      const input = document.createElement('input');
      input.type = 'hidden'; input.name = 'id'; input.value = id;
      form.appendChild(input); document.body.appendChild(form); form.submit();
    });
  });

  const form = document.getElementById('studentForm');
  if (form) {
    form.addEventListener('submit', event => {
      const name = form.elements.name.value.trim();
      const age = Number(form.elements.age.value);
      const city = form.elements.S_city.value;
      if (name.length < 2 || name.length > 100 || !Number.isInteger(age) || age < 1 || age > 120 || !city) {
        event.preventDefault();
        alert('Please enter valid student details.');
      }
    });
  }

  const alertBox = document.querySelector('.alert');
  if (alertBox) setTimeout(() => { alertBox.style.opacity = '0'; alertBox.style.transform = 'translateY(-8px)'; alertBox.style.transition = '.35s'; setTimeout(() => alertBox.remove(), 350); }, 4200);
});
