import React from 'react';
import { GoogleMap } from '../../GoogleMap';

import { createRoot } from 'react-dom/client';
import { useLanguage, LanguageProvider } from '../../context/LanguageProvider';

const VisitUs = () => {
  const placeMap = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.7091297978693!2d-79.5939517!3d9.0001067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8faca7b0a46a3bd1%3A0x93b801d16c74cc5c!2sCiudad%20del%20Saber!5e0!3m2!1sen!2spa!4v1694723436887!5m2!1sen!2spa'
  const buttonUrl = 'https://www.google.com/maps/place/Cd+del+Saber,+Panam%C3%A1,+Provincia+de+Panam%C3%A1/@9.0050237,-79.5931363,15z/data=!4m6!3m5!1s0x8faca7b0a46a3bd1:0x93b801d16c74cc5c!8m2!3d9.0014031!4d-79.5814145!16zL20vMDk1dzc0?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D'

  return (
    <>
      <div className='md:relative'>
        <div className="nwp-padding-x-container">
          <div className='nwp-container mx-auto flex flex-col md:flex-row h-[600px]'>
            {/* Mapa */}
            <div className="absolute right-1/2 w-1/2">
              <GoogleMap placeMap={placeMap} />
            </div>
            <div className='md:w-1/2'></div>
            {/* Información de Visítanos */}
            <div className="w-full md:w-1/2 flex flex-col items-start justify-center md:px-8 md:gap-y-8">
              <h1 className="text-3xl md:text-5xl font-bold">¡Visítanos! ateneo</h1>
              <p className="text-lg">
                <span className="font-semibold">Ubicación: <br></br></span> Fundación Ciudad del Saber, edificio 104, calle Luis Bonilla, Ciudad del Saber, Clayton, Panamá.
              </p>
              <p className="text-lg">
                <span className="font-semibold">Contacto: </span> 
                <a href="mailto:ciudaddelsaber@cdspanama.org" className="text-blue-500 hover:underline">
                  ciudaddelsaber@cdspanama.org
                </a>
              </p>
              <a 
                href={buttonUrl}
                class="flex gap-x-2 font-semibold text-lg items-center hover:no-underline hover:text-cdsblue duration-150 transition-all"
                target="_blank"
              >
                Conoce cómo llegar
                <div class="h-8 w-8 bg-cdsblue rounded-full grid place-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="32px" fill="#e8eaed"><path d="M673-446.67H160v-66.66h513l-240-240L480-800l320 320-320 320-47-46.67 240-240Z"/></svg>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default VisitUs;

const container = document.getElementById('nwp-aulas-105-visit-us');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <VisitUs />
    </LanguageProvider>
  );
}