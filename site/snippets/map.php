<section class="properties">
  <div class="properties__container">
    <h2 class="properties__title">Nos propriétés</h2>
    <div id="map" class="properties__map"></div>
  </div>
</section>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

<script>
  // Initialisation de la carte sans centre défini (sera ajusté dynamiquement)
  const map = L.map('map');

  // Style de la carte (CartoDB Voyager)
  L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/">CARTO</a>',
  }).addTo(map);

  <?php if ($propertiesPage = page('properties')): ?>
    <?php if ($propertiesPage->hasChildren()): ?>
      // Données des propriétés
      const properties = <?= json_encode($propertiesPage->children()->listed()->map(function ($property) {
          return [
              'title' => $property->title()->value(),
              'description' => $property->description()->kirbytext(),
              'location' => $property->location()->value(),
              'price' => $property->price()->value(),
              'availability' => $property->availability()->isTrue() ? 'Disponible' : 'Non disponible',
              'features' => $property->features()->split(','),
              'url' => $property->url()
          ];
      })->values()) ?>;

      // Définir une icône personnalisée
      const customIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png', // Icône rouge
        
        /*Tu peux remplacer marker-icon-red.png dans l'URL par :
        Bleu : marker-icon-blue.png
        Vert : marker-icon-green.png
        Orange : marker-icon-orange.png
        Jaune : marker-icon-yellow.png
        Violet : marker-icon-violet.png
        Gris : marker-icon-grey.png
        Noir : marker-icon-black.png*/

        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/images/marker-shadow.png', // Ombre
        iconSize: [25, 41], // Taille de l'icône
        iconAnchor: [12, 41], // Ancrage de l'icône
        popupAnchor: [1, -34], // Point d'ancrage pour le popup
        shadowSize: [41, 41] // Taille de l'ombre
      });

      // Ajout des marqueurs et calcul des limites
      const bounds = [];
      properties.forEach(property => {
        const [lat, lng] = property.location.split(',').map(coord => parseFloat(coord.trim()));

        const marker = L.marker([lat, lng], { icon: customIcon }).addTo(map);
        const popupContent = `
          <div>
            <h3>${property.title}</h3>
            <p><strong>Prix :</strong> ${property.price} €/nuit</p>
            <p><strong>Disponibilité :</strong> ${property.availability}</p>
            <p><strong>Caractéristiques :</strong> ${property.features.join(', ')}</p>
            <a href="${property.url}" target="_blank">Voir plus</a>
          </div>
        `;

        marker.bindPopup(popupContent);
        bounds.push([lat, lng]);
      });

      // Ajuster la vue pour inclure tous les marqueurs
      if (bounds.length > 0) {
        map.fitBounds(bounds, { padding: [50, 50] }); // Ajuste le zoom pour inclure tous les marqueurs
      } else {
        map.setView([48.8566, 2.3522], 6); // Centre par défaut (France)
      }
    <?php else: ?>
      console.log("Aucune propriété à afficher.");
    <?php endif ?>
  <?php else: ?>
    console.error("La page 'properties' est introuvable.");
  <?php endif ?>
</script>