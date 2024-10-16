import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import FirstHero from '../../FirstHero';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';
import CustomIndex from '../../CustomIndex'; // Asegúrate de importar el índice personalizado

export default function Hero() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Sala de Boxeo",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "6:00 am - 9:00 pm",
        location: "C. Victor Garibaldo, Panamá",
        buttonText: "Reserva tu espacio",
      },
      en: {
        title: "Boxing Room",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "6:00 am - 9:00 pm",
        location: "Victor Garibaldo St., Panama",
        buttonText: "Book your spot",
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idioma

  const handleButtonClick = (sectionId) => {
    const element = document.getElementById('reservasss');
    if (element) {
      const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
      const offsetPosition = elementPosition - 100; // Ajustar el desplazamiento a 40px antes

      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth',
      });
    }
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
        backgroundImageUrl="https://example.com/boxing-room-image.jpg" // Reemplaza con la URL correcta
        buttonText={content.buttonText}
        isVenue={true}
      />
      {/* Añadir el índice personalizado */}
      <CustomIndex
        sections={{
          es: [
            { id: '#nwp-boxeo-content-whit-video-section', label: 'Ten en cuenta' },
            { id: '#reservasss', label: 'Reservas' },
            { id: '#nwp-boxeo-campus-facilities', label: 'Facilidades del campus' },
            { id: '#nwp-boxeo-gallery-section', label: 'Historia' },
            { id: '#nwp-boxeo-faq-section', label: 'Preguntas frecuentes' },
          ],
          en: [
            { id: '#nwp-boxeo-content-whit-video-section', label: 'Take into account' },
            { id: '#reservasss', label: 'Reservations' },
            { id: '#nwp-boxeo-campus-facilities', label: 'Campus Facilities' },
            { id: '#nwp-boxeo-gallery-section', label: 'History' },
            { id: '#nwp-boxeo-faq-section', label: 'FAQs' },
          ],
        }}
      />
    </div>
  );
}

const container = document.getElementById('nwp-hero-boxeo');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <Hero />
    </LanguageProvider>
  );
}