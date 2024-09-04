import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import FirstHero from '../../FirstHero';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';

export default function NwpVenueHero() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "La Piscina",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "6:30 am - 8:00 pm",
        location: "C. Victor Garibaldo, Panamá",
        buttonText: "Reserva tu espacio",
      },
      en: {
        title: "The Pool",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "6:30 am - 8:00 pm",
        location: "Victor Garibaldo St., Panama",
        buttonText: "Book your spot",
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
      schedule={content.schedule}
      location={content.location}
      onButtonClick={handleButtonClick}
      gradientColor="from-cdsverde via-cdsverde to-transparent"
      backgroundImageUrl="https://plus.unsplash.com/premium_photo-1668623041724-c9b6c84c436b?q=80&w=1329&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
      buttonText={content.buttonText}
      isVenue={true}
    />
  );
}

const container = document.getElementById('nwp-hero-piscina');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <NwpVenueHero />
    </LanguageProvider>
  );
}