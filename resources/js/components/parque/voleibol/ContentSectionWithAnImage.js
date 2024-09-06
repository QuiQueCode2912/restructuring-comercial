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
        title: "La piscina más profunda de Panama",
        content: `Construida en 1948, esta piscina ha sido testigo de innumerables momentos 
                  de entrenamiento y esparcimiento para generaciones de militares. Hoy, abre 
                  sus puertas a toda la comunidad para que disfrutes de sus aguas cristalinas 
                  y de un ambiente familiar y acogedor.`,
        buttonLabel: "Descarga el reglamento de uso",
      },
      en: {
        title: "The deepest pool in Panama",
        content: `Built in 1948, this pool has witnessed countless moments of training and 
                  recreation for generations of military personnel. Today, it opens its doors 
                  to the entire community to enjoy its crystal-clear waters and a family-friendly, 
                  welcoming atmosphere.`,
        buttonLabel: "Download the usage rules",
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
      buttonLabel={content.buttonLabel}
      onButtonClick={handleButtonClick}
      image="https://images.unsplash.com/photo-1691253104600-ccfd27782f3e?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
    />
  );
}

const container = document.getElementById('nwp-voleibol-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}
