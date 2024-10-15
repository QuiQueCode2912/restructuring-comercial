import React from 'react';
import { GoogleMap } from '../../GoogleMap';

import { createRoot } from 'react-dom/client';
import { useLanguage, LanguageProvider } from '../../context/LanguageProvider';

const VisitUs = () => {
  const placeMap = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.7091297978693!2d-79.5939517!3d9.0001067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8faca7b0a46a3bd1%3A0x93b801d16c74cc5c!2sCiudad%20del%20Saber!5e0!3m2!1sen!2spa!4v1694723436887!5m2!1sen!2spa'
  const buttonUrl = 'https://www.google.com/maps/place/Cd+del+Saber,+Panam%C3%A1,+Provincia+de+Panam%C3%A1/@9.0050237,-79.5931363,15z/data=!4m6!3m5!1s0x8faca7b0a46a3bd1:0x93b801d16c74cc5c!8m2!3d9.0014031!4d-79.5814145!16zL20vMDk1dzc0?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D'  
  const title = '¡Visítanos!';
  const description = 'Ubicación: Fundación Ciudad del Saber, edificio 104, calle Luis Bonilla, Ciudad del Saber, Clayton, Panamá.';
  const contactEmail = 'ciudaddelsaber@cdspanama.org';

  return (
    <GoogleMap 
      placeMap={placeMap} 
      title={title} 
      description={description} 
      contactEmail={contactEmail} 
      buttonUrl={buttonUrl} 
    />
  );
};

export default VisitUs;

const container = document.getElementById('nwp-ateneo-visit-us');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <VisitUs />
    </LanguageProvider>
  );
}