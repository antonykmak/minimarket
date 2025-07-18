//Busca dentro de cualquier <tbody> por id.
function FiltrarTabla(tbodyId, query) {
  const q = query.toLowerCase();
  document.querySelectorAll(`#${tbodyId} tr`).forEach(row => {
    const cell = row.querySelector('td:first-child');
    const text = cell ? cell.textContent.toLowerCase() : '';
    row.style.display = text.includes(q) ? '' : 'none';
  });
}