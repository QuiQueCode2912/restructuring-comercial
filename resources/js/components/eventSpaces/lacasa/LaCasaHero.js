import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import FirstHero from '../../FirstHero';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';
import CustomIndex from '../../CustomIndex'; // Asegúrate de importar el índice personalizado

export default function LaCasaHero() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "La Casa",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "7:00 am - 9:00 pm",
        location: "C. Victor Garibaldo, Panamá",
        buttonText: "Conoce nuestro portafolio",
      },
      en: {
        title: "The House",
        subtitle: "",  // Puedes agregar un subtítulo si lo necesitas
        schedule: "7:00 am - 9:00 pm",
        location: "Victor Garibaldo St., Panama",
        buttonText: "Get to know our portfolio",
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
        gradientColor="from-verde-oscuro-campus via-verde-oscuro-campus to-transparent"
        backgroundImageUrl="https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" // Reemplaza con la URL correcta
        buttonText={content.buttonText}
        isVenue={true}
      />
      {/* Añadir el índice personalizado */}
      <CustomIndex
        sections={{
          es: [
            { id: '#nwp-la-casa-content-section-whith-an-image', label: 'Ten en cuenta' },
            { id: '#nwp-la-casa-gallery-section', label: 'Historia' },
            { id: '#nwp-la-casa-campus-facilities', label: 'Facilidades del campus' },
            { id: '#reservasss', label: 'Reservas' },
            { id: '#nwp-la-casa-aditional-services', label: 'Servicios adicionales' }, // Añadido 'Servicios adicionales' en español
            { id: '#nwp-la-casa-visit-us', label: 'Visítanos' },
          ],
          en: [
            { id: '#nwp-la-casa-content-section-whith-an-image', label: 'Take into account' },
            { id: '#nwp-la-casa-gallery-section', label: 'History' },
            { id: '#nwp-la-casa-campus-facilities', label: 'Campus Facilities' },
            { id: '#reservasss', label: 'Reservations' },
            { id: '#nwp-la-casa-aditional-services', label: 'Additional services' }, // Añadido 'Additional services' en inglés
            { id: '#nwp-la-casa-visit-us', label: 'Visit us' },
          ],
        }}
      />

    </div>
  );
}

const container = document.getElementById('nwp-hero-la-casa');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <LaCasaHero />
    </LanguageProvider>
  );
}
