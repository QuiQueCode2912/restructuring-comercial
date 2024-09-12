import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { LanguageProvider, useLanguage } from '../context/LanguageProvider';
import { NwpContentWithVideoSection } from '../NwpContentWithVideoSection';

export const ContentWithVideoSection = () => {
  const { language } = useLanguage(); // Acceder al idioma seleccionado
  const [content, setContent] = useState({}); // Estado para guardar el contenido traducido
  const [activities, setActivities] = useState([]); // Estado para guardar las actividades traducidas

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {

        title: "¿Qué tipos de eventos se pueden realizar en Ciudad del Saber?",
        content: "Contamos con una amplia gama de espacios ideales para eventos:",
        activities: [
          { text: "Corporativos y empresariales" },
          { text: "Sociales y celebraciones" },
          { text: "Culturales y artísticos" },
          { text: "Educativos y académicos" },
          { text: "Tecnológicos y de innovación" },
          { text: "Deportivos y recreativos" },
        ],
      },
      en: {
        title: "What types of events can be held at the City of Knowledge?",
        content: "We offer a wide range of spaces ideal for events:",
        activities: [
          { text: "Corporate and business" },
          { text: "Social and celebrations" },
          { text: "Cultural and artistic" },
          { text: "Educational and academic" },
          { text: "Technological and innovation" },
          { text: "Sports and recreational" },
        ],
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
    setActivities(translations[language].activities);
  }, [language]); // Dependencia en el idioma

  return (
    <NwpContentWithVideoSection 
      headed={content.headed}
      title={content.title}
      content={content.content}
      backgroundImage="https://images.unsplash.com/photo-1498955472675-532cdee9d6b4?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8cGFya3xlbnwwfHwwfHx8MA%3D%3D"
      videoUrl="https://www.youtube.com/watch?v=aRZ1W2apiDY"
      activities={activities}
    />
  )
}

const container = document.getElementById('nwp-event-spaces-content-whit-video-section');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentWithVideoSection />
    </LanguageProvider>
  );
}