import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import FirstHero from '../../FirstHero';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';
import CustomIndex from '../../CustomIndex'; // Asegúrate de importar el índice personalizado

export default function BaloncestoHero() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Cancha de Baloncesto",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "6:30 am - 8:00 pm",
        location: "C. Victor Garibaldo, Panamá",
        buttonText: "Reserva tu espacio",
      },
      en: {
        title: "Basketball Court",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "6:30 am - 8:00 pm",
        location: "Victor Garibaldo St., Panama",
        buttonText: "Book your spot",
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idiomar

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
        backgroundImageUrl="https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        buttonText={content.buttonText}
        isVenue={true}
      />
      {/* Añadir el índice personalizado */}
      <CustomIndex
        sections={{
          es: [
            { id: '#nwp-baloncesto-content-whit-video-section', label: 'Ten en cuenta' },
            { id: '#reservasss', label: 'Reservas' },
            { id: '#nwp-baloncesto-campus-facilities', label: 'Facilidades del campus' },
            { id: '#nwp-baloncesto-gallery-section', label: 'Historia' },
            { id: '#nwp-baloncesto-faq-section', label: 'Preguntas frecuentes' },
          ],
          en: [
            { id: '#nwp-baloncesto-content-whit-video-section', label: 'Take into account' },
            { id: '#reservasss', label: 'Reservations' },
            { id: '#nwp-baloncesto-campus-facilities', label: 'Campus Facilities' },
            { id: '#nwp-baloncesto-gallery-section', label: 'History' },
            { id: '#nwp-baloncesto-faq-section', label: 'FAQs' },
          ],
        }}
      />

    </div>
  );
}

const container = document.getElementById('nwp-hero-baloncesto');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <BaloncestoHero />
    </LanguageProvider>
  );
}