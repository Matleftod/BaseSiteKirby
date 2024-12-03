export function formatDate(date) {
  return new Intl.DateTimeFormat('fr-FR').format(date);
}
