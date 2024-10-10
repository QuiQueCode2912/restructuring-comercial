import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';
import { NwpContentWithVideoSection} from '../../NwpContentWithVideoSection';

export const ContentWithVideoSection = () => {
  const { language } = useLanguage(); // Acceder al idioma seleccionado
  const [content, setContent] = useState({}); // Estado para guardar el contenido traducido
  const [activities, setActivities] = useState([]); // Estado para guardar las actividades traducidas

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {

        title: "Ten en cuenta para tu visita",
        content: `Ten en cuenta que para disfrutar al máximo de nuestras canchas, es fundamental hacer tu reserva con anticipación, ya que así aseguramos que el espacio esté disponible para ti en el momento que lo necesites.<br/><br/>

                  Además, recuerda traer el equipo adecuado para la actividad que vas a realizar y respetar los horarios establecidos para el uso de las canchas.<br/><br/>

                  Esto no solo garantiza que todos los usuarios puedan disfrutar de un entorno ordenado, sino que también permite mantener la calidad de nuestras instalaciones.<br/><br/>

                  ¡Te esperamos para que aproveches al máximo tu tiempo de juego y entrenamiento!`,
        activities: [],
      },
      en: {
        title: "What to do on a day at the park?",
        content: "At Ciudad del Saber Park, you'll find a variety of activities to enjoy. We offer free and open options for the public, perfect for sharing with your family, friends, and even your pet.",
        activities: [
          {
            text: "Walk 21km of trail in our forest reserve"
          },
          {
            text: "Have fun with your family at the children's park"
          },
          {
            text: "Enjoy a pet-friendly space at the pet park"
          },
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

const container = document.getElementById('nwp-baloncesto-content-whit-video-section');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentWithVideoSection />
    </LanguageProvider>
  );
}