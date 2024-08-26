import React from 'react'
import { createRoot } from 'react-dom/client';
import PublicSpaceHero2 from '../../PublicSpaceHero2';

export default function NwpPiscinaSection1() {

  const handleButtonClick = () => {
    console.log('Botón clickeado');
  };

  return (
    <PublicSpaceHero2
      title="La piscina más profunda de Panama"
      content="Construida en 1948, esta piscina ha sido testigo de
              innumerables momentos de entrenamiento y esparcimiento
              para generaciones de militares. Hoy, abre sus puertas a toda
              la comunidad para que disfrutes de sus aguas cristalinas y de
              un ambiente familiar y acogedor."
      buttonLabel="Descarga el reglamento de uso"
      onButtonClick={handleButtonClick}
      image="https://images.unsplash.com/photo-1691253104600-ccfd27782f3e?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
    />
  )
}

const container = document.getElementById('nwp-piscina-section-1');
if (container) {
  const root = createRoot(container);
  root.render(<NwpPiscinaSection1 />);
}