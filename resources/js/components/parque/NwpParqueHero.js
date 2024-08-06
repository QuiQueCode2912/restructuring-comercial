import React from 'react';
import { createRoot } from 'react-dom/client';
import FirstHero from '../FirstHero';

export default function NwpParqueHero() {

  const handleButtonClick = () => {
    // Lógica para descargar el mapa
    console.log('Botón clickeado');
  };
  
  return (
    <FirstHero 
      title="Parque Ciudad del Saber" 
      subtitle="Un espacio para todos: Recreación, deporte y diversión" 
      schedule="6:30 am - 8:00 pm" 
      location="C. Victor Garibaldo, Panamá" 
      onButtonClick={handleButtonClick} 
    />
  );
}

const container = document.getElementById('nwp-parque-hero');
if (container) {
  const root = createRoot(container);
  root.render(<NwpParqueHero />);
}