import React from 'react'
import { createRoot } from 'react-dom/client';
import PublicSpaceHero from '../PublicSpaceHero';

export default function NwpParqueSection1() {

  const handleButtonClick = () => {
    // Lógica para descargar el reglamento de uso
    console.log('Botón clickeado');
  };

  const images = [
    'https://images.unsplash.com/photo-1498955472675-532cdee9d6b4?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8cGFya3xlbnwwfHwwfHx8MA%3D%3D',
    'https://images.unsplash.com/photo-1564409972016-2825589beaed?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cGFya3xlbnwwfHwwfHx8MA%3D%3D',
  ];

  return (
    <PublicSpaceHero 
      title="Un espacio abierto al público"
      content="El corazón verde del campus, ideal para realizar actividades recreativas, deportivas o de esparcimiento. Parque Ciudad del Saber está abierto a sus visitantes de forma gratuita todos los días del año."
      buttonLabel="Descarga el reglamento de uso"
      onButtonClick={handleButtonClick}
      images={images}
    />
  );
}

const container = document.getElementById('nwp-parque-section01');
if (container) {
  const root = createRoot(container);
  root.render(<NwpParqueSection1 />);
}