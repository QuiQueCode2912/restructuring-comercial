import React from 'react'
import { createRoot } from 'react-dom/client';
import FirstHero from '../../FirstHero';

export default function NwpVenueHero(){
  const handleButtonClick = () => {
    // Lógica para descargar el mapa
    console.log('Botón clickeado');
  };
  
  return (
    <FirstHero 
      title="La Piscina" 
      subtitle="" 
      schedule="6:30 am - 8:00 pm" 
      location="C. Victor Garibaldo, Panamá" 
      onButtonClick={handleButtonClick} 
      gradientColor="from-cdsverde via-cdsverde to-transparent" 
      backgroundImageUrl="https://plus.unsplash.com/premium_photo-1668623041724-c9b6c84c436b?q=80&w=1329&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
      buttonText="Reserva tu espacio"
      isVenue={true}
    />
  );
}

const container = document.getElementById('nwp-hero-piscina');
if (container) {
  const root = createRoot(container);
  root.render(<NwpVenueHero />);
}