import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import {NwpContentSectionWithAnImage} from '../NwpContentSectionWithAnImage';
import { LanguageProvider, useLanguage } from '../context/LanguageProvider';

export default function ContentSectionWithAnImage() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Canchas de Voleibol del Parque Ciudad del Saber",
        content: `Nuestras canchas de voleibol, tanto en tabloncillo como en arena, ofrecen un espacio excelente para entrenar 
                  y disfrutar de este deporte en un ambiente seguro y cómodo.`,
      },
      en: {
        title: "Volleyball Courts at Ciudad del Saber Park",
        content: `Our volleyball courts, both indoor and sand, provide an excellent space for training 
                  and enjoying the sport in a safe and comfortable environment.`,
      },
    };
  
    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idioma

  const handleButtonClick = () => {
    console.log('Button clicked');
  };

  return (
    <NwpContentSectionWithAnImage
      title={content.title}
      content={content.content}
      image="https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
    />
  );
}

const container = document.getElementById('nwp-event-spaces-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}