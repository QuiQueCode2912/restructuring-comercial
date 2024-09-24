import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import FirstHero from '../../FirstHero';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';
import CustomIndex from '../../CustomIndex'; // Asegúrate de importar el índice personalizado

export default function VoleibolHero() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Cancha de Voleibol",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "7:00 am - 9:00 pm",
        location: "C. Victor Garibaldo, Panamá",
        buttonText: "Reserva tu espacio",
      },
      en: {
        title: "Volleyball Court",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "7:00 am - 9:00 pm",
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
        backgroundImageUrl="https://example.com/volleyball-court-image.jpg" // Reemplaza con la URL correcta
        buttonText={content.buttonText}
        isVenue={true}
      />
      {/* Añadir el índice personalizado */}
      <CustomIndex
        sections={{
          es: [
            { id: '#nwp-voleibol-content-whit-video-section', label: 'Ten en cuenta' },
            { id: '#reservasss', label: 'Reservas' },
            { id: '#nwp-voleibol-campus-facilities', label: 'Facilidades del campus' },
            { id: '#nwp-voleibol-gallery-section', label: 'Historia' },
            { id: '#nwp-voleibol-faq-section', label: 'Preguntas frecuentes' },
          ],
          en: [
            { id: '#nwp-voleibol-content-whit-video-section', label: 'Take into account' },
            { id: '#reservasss', label: 'Reservations' },
            { id: '#nwp-voleibol-campus-facilities', label: 'Campus Facilities' },
            { id: '#nwp-voleibol-gallery-section', label: 'History' },
            { id: '#nwp-voleibol-faq-section', label: 'FAQs' },
          ],
        }}
      />
    </div>
  );
}

const container = document.getElementById('nwp-hero-voleibol');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <VoleibolHero />
    </LanguageProvider>
  );
}
