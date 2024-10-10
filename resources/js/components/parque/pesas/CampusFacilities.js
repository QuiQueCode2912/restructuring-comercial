import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';
import IconCardSection from '../../IconCardSection';

export const CampusFacilities = () => {
  const { language } = useLanguage(); // Acceder al idioma seleccionado
  const [content, setContent] = useState({}); // Estado para guardar el contenido traducido
  const [cards, setCards] = useState([]); // Estado para guardar las tarjetas traducidas

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Facilidades del campus",
        cards: [
          {
            svgPath: 'M240-120v-720h280q100 0 170 70t70 170q0 100-70 170t-170 70H400v240H240Zm160-400h128q33 0 56.5-23.5T608-600q0-33-23.5-56.5T528-680H400v160Z',
            fillColor: '#0088ff',
            description: 'Estacionamiento gratis'
          },
          {
            svgPath: 'M120-80v-400l63-185q8-26 30-40.5t47-14.5q8 0 16 1.5t16 5.5l166 73h102v80H440l-108-47-52 157v370H120Zm240-120v-80h480v80H360Zm420-120q-25 0-42.5-17.5T720-380q0-25 17.5-42.5T780-440q25 0 42.5 17.5T840-380q0 25-17.5 42.5T780-320Zm-260 0q-33 0-56.5-23.5T440-400v-40h-80v-80h120q17 0 28.5 11.5T520-480v40h80v-80h80v120q0 33-23.5 56.5T600-320h-80ZM320-760q-33 0-56.5-23.5T240-840q0-33 23.5-56.5T320-920q33 0 56.5 23.5T400-840q0 33-23.5 56.5T320-760Z',
            fillColor: '#0088ff',
            description: 'Disponibilidad de baños, vestidores, duchas y casilleros.'
          },
          {
            svgPath: 'M240-120q-17 0-28.5-11.5T200-160v-82q-18-20-29-44.5T160-340v-380q0-83 77-121.5T480-880q172 0 246 37t74 123v380q0 29-11 53.5T760-242v82q0 17-11.5 28.5T720-120h-40q-17 0-28.5-11.5T640-160v-40H320v40q0 17-11.5 28.5T280-120h-40Zm242-640h224-448 224Zm158 280H240h480-80Zm-400-80h480v-120H240v120Zm100 240q25 0 42.5-17.5T400-380q0-25-17.5-42.5T340-440q-25 0-42.5 17.5T280-380q0 25 17.5 42.5T340-320Zm280 0q25 0 42.5-17.5T680-380q0-25-17.5-42.5T620-440q-25 0-42.5 17.5T560-380q0 25 17.5 42.5T620-320ZM258-760h448q-15-17-64.5-28.5T482-800q-107 0-156.5 12.5T258-760Zm62 480h320q33 0 56.5-23.5T720-360v-120H240v120q0 33 23.5 56.5T320-280Z',
            fillColor: '#0088ff',
            description: 'Conectado con la Terminal de Transporte de Albrook'
          },
          {
            svgPath: 'M280-80v-366q-51-14-85.5-56T160-600v-280h80v280h40v-280h80v280h40v-280h80v280q0 56-34.5 98T360-446v366h-80Zm400 0v-320H560v-280q0-83 58.5-141.5T760-880v800h-80Z',
            fillColor: '#0088ff',
            description: 'Oferta gastronómica y tiendas  para complementar tu visita.'
          }
        ],
      },
      en: {
        title: "Campus Facilities",
        cards: [
          {
            svgPath: 'M240-120v-720h280q100 0 170 70t70 170q0 100-70 170t-170 70H400v240H240Zm160-400h128q33 0 56.5-23.5T608-600q0-33-23.5-56.5T528-680H400v160Z',
            fillColor: '#0088ff',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
          },
          {
            svgPath: 'M120-80v-400l63-185q8-26 30-40.5t47-14.5q8 0 16 1.5t16 5.5l166 73h102v80H440l-108-47-52 157v370H120Zm240-120v-80h480v80H360Zm420-120q-25 0-42.5-17.5T720-380q0-25 17.5-42.5T780-440q25 0 42.5 17.5T840-380q0 25-17.5 42.5T780-320Zm-260 0q-33 0-56.5-23.5T440-400v-40h-80v-80h120q17 0 28.5 11.5T520-480v40h80v-80h80v120q0 33-23.5 56.5T600-320h-80ZM320-760q-33 0-56.5-23.5T240-840q0-33 23.5-56.5T320-920q33 0 56.5 23.5T400-840q0 33-23.5 56.5T320-760Z',
            fillColor: '#0088ff',
            description: 'Ut enim ad minim veniam, quis nostrud exercitation.'
          },
          {
            svgPath: 'M240-120q-17 0-28.5-11.5T200-160v-82q-18-20-29-44.5T160-340v-380q0-83 77-121.5T480-880q172 0 246 37t74 123v380q0 29-11 53.5T760-242v82q0 17-11.5 28.5T720-120h-40q-17 0-28.5-11.5T640-160v-40H320v40q0 17-11.5 28.5T280-120h-40Zm242-640h224-448 224Zm158 280H240h480-80Zm-400-80h480v-120H240v120Zm100 240q25 0 42.5-17.5T400-380q0-25-17.5-42.5T340-440q-25 0-42.5 17.5T280-380q0 25 17.5 42.5T340-320Zm280 0q25 0 42.5-17.5T680-380q0-25-17.5-42.5T620-440q-25 0-42.5 17.5T560-380q0 25 17.5 42.5T620-320ZM258-760h448q-15-17-64.5-28.5T482-800q-107 0-156.5 12.5T258-760Zm62 480h320q33 0 56.5-23.5T720-360v-120H240v120q0 33 23.5 56.5T320-280Z',
            fillColor: '#0088ff',
            description: 'Ut enim ad minim veniam, quis nostrud exercitation.'
          },
          {
            svgPath: 'M280-80v-366q-51-14-85.5-56T160-600v-280h80v280h40v-280h80v280h40v-280h80v280q0 56-34.5 98T360-446v366h-80Zm400 0v-320H560v-280q0-83 58.5-141.5T760-880v800h-80Z',
            fillColor: '#0088ff',
            description: 'Ut enim ad minim veniam, quis nostrud exercitation.'
          }
        ],
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
    setCards(translations[language].cards);
  }, [language]); // Dependencia en el idioma

  return <IconCardSection title={content.title} cards={cards} />;
}

const container = document.getElementById('nwp-pesas-campus-facilities');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <CampusFacilities />
    </LanguageProvider>
  );
}