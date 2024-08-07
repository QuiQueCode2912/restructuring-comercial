import React from 'react'
import { createRoot } from 'react-dom/client';
import Headband from '../Headband';

export default function NwpHeadband() {

  const images = [
    'https://comercial.ciudaddelsaber.org/storage/venues/7a7b41702666a764ed05d401a73da351248d2577d3b5e988c513954bc39ec680_2048.jpg',
  ];
  
  return (
    <Headband 
      imageSrc={images[0]}
      mainTitle="Vive el campus"
      subtitle="Un espacio para compartir, entrenar y divertirse"
      instagramLink="https://www.instagram.com/parquecds/?hl=es"
      instagramHandle="@parquecds"
    />

  )
}

const container = document.getElementById('nwp-parque-headband');
if (container) {
  const root = createRoot(container);
  root.render(<NwpHeadband />);
}