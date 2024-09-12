import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import FirstHero from '../FirstHero';
import { LanguageProvider, useLanguage } from '../context/LanguageProvider';
import { divide } from 'lodash';

export default function Hero() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  console.log(language);

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Reserva tus espacios para eventos y reuniones",
        subtitle: "Ambientes flexibles y personalizados para cada ocasión"
      },
      en: {
        title: "Reserva tus espacios para eventos y reuniones",
        subtitle: "A space for everyone: Recreation, sports, and fun"
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idioma

  const handleButtonClick = () => {
    console.log('Button clicked');
  };

  return (
      <FirstHero 
        title={content.title}
        subtitle={content.subtitle}
        onButtonClick={handleButtonClick}
        gradientColor="from-verde-oscuro-campus via-verde-oscuro-campus to-transparent"
        backgroundImageUrl="https://images.unsplash.com/photo-1663622438610-00a72c139d8c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        isVenue={false}
      />
  );
}

const container = document.getElementById('nwp-event-spaces-hero');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider> 
      <Hero /> 
    </LanguageProvider>
  );
}