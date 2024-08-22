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
      gradientColor="from-cdsverde via-cdsverde to-transparent" 
      backgroundImageUrl="https://images.unsplash.com/photo-1663622438610-00a72c139d8c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
      buttonText="Descargar el mapa" 
      isVenue={false}
    />
  );
}

const container = document.getElementById('nwp-parque-hero');
if (container) {
  const root = createRoot(container);
  root.render(<NwpParqueHero />);
}