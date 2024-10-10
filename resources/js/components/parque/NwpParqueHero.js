import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import FirstHero from '../FirstHero';
import { LanguageProvider, useLanguage } from '../context/LanguageProvider';
import CustomIndex from '../CustomIndex';

export default function NwpParqueHero() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  console.log(language);

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Parque Ciudad del Saber",
        subtitle: "Un espacio para todos: Recreación, deporte y diversión",
        schedule: "6:30 am - 8:00 pm",
        location: "C. Victor Garibaldo, Panamá",
        buttonText: "Descargar el mapa",
      },
      en: {
        title: "Ciudad del Saber Park",
        subtitle: "A space for everyone: Recreation, sports, and fun",
        schedule: "6:30 am - 8:00 pm",
        location: "Victor Garibaldo St., Panama",
        buttonText: "Download the map",
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idioma

  const handleButtonClick = () => {
    console.log('Button clicked');
  };

  return (
    <>
      <FirstHero 
        title={content.title}
        subtitle={content.subtitle}
        schedule={content.schedule}
        location={content.location}
        onButtonClick={handleButtonClick}
        gradientColor="from-cdsverde via-cdsverde to-transparent"
        backgroundImageUrl="/assets/nwp-images/parque-vista-aerea.png"
        buttonText={content.buttonText}
        isVenue={false}
      />
      <CustomIndex
        sections={{
          es: [
            { id: '#nwp-parque-section02', label: 'Qué hacer' },
            { id: '#nwp-venues-table', label: 'Espacios del parque' },
            { id: '#nwp-parque-headband', label: 'Conéctate' },
            { id: '#nwp-parque-faq', label: 'Preguntas frecuentes' },
          ],
          en: [
            { id: '#nwp-parque-section02', label: 'What to do' },
            { id: '#nwp-venues-table', label: 'Park Spaces' },
            { id: '#nwp-parque-headband', label: 'Connect' },
            { id: '#nwp-parque-faq', label: 'FAQs' },
          ],
        }}
      />
    </>
  );
}

const container = document.getElementById('nwp-parque-hero');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider> 
      <NwpParqueHero /> 
    </LanguageProvider>
  );
}
