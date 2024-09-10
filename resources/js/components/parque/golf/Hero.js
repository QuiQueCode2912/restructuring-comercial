import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import FirstHero from '../../FirstHero';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';
import CustomIndex from '../../CustomIndex'; // Asegúrate de importar el índice personalizado

export default function GolfHero() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Cancha de Golf",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "7:00 am - 6:00 pm",
        location: "C. Victor Garibaldo, Panamá",
        buttonText: "Reserva tu espacio",
      },
      en: {
        title: "Golf Course",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "7:00 am - 6:00 pm",
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
    <div>
      {/* Componente FirstHero */}
      <FirstHero 
        title={content.title}
        subtitle={content.subtitle}
        schedule={content.schedule}
        location={content.location}
        onButtonClick={handleButtonClick}
        gradientColor="from-cdsverde via-cdsverde to-transparent"
        backgroundImageUrl="https://example.com/golf-course-image.jpg"
        buttonText={content.buttonText}
        isVenue={true}
      />
      {/* Añadir el índice personalizado */}
      <CustomIndex
        sections={{
          tenEnCuenta: '#nwp-golf-content-whit-video-section',
          reservas: '#reservasss',
          facilidades: '#nwp-golf-campus-facilities',
          historia: '#nwp-golf-gallery-section',
          preguntasFrecuentes: '#nwp-golf-faq-section',
        }}
      />
    </div>
  );
}

const container = document.getElementById('nwp-hero-golf');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <GolfHero />
    </LanguageProvider>
  );
}