import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import {NwpContentSectionWithAnImage} from '../../NwpContentSectionWithAnImage';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';

export default function ContentSectionWithAnImage() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Un espacio para el desarrollo profesional",
        content: `Las Aulas 105 están pensadas para realizar actividades de negocios y formación académica, además de ofrecer capacitaciones originadas por institutos de educación superior, entidades gubernamentales, organismos internacionales y empresas.`,
        buttonLabel: "Ver el folleto",
        modalTitle: "Reglamentos de uso de Canchas de Voleibol",
        modalDesc: ("" ),
      },
      en: {
        title: "Volleyball Courts at Ciudad del Saber Park",
        content: `Our volleyball courts, both indoor and sand, provide an excellent space for training 
                  and enjoying the sport in a safe and comfortable environment.`,
        buttonLabel: "Download the usage rules",
        modalTitle: "Volleyball Court Usage Rules",
        modalDesc: (""),
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
      modalTitle={content.modalTitle}
      modalDesc={content.modalDesc}
      onButtonClick={handleButtonClick}
      image="https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
    />
  );
}

const container = document.getElementById('nwp-la-casa-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}



