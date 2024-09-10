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
        title: "Reglamentos de uso de Boxeo en el Parque Ciudad del Saber",
        content: `Nuestras instalaciones de boxeo ofrecen un espacio ideal para entrenar de manera segura y eficiente, 
                  cumpliendo con todas las normas de seguridad y uso.`,
        buttonLabel: "Descarga el reglamento de uso",
        modalTitle: "Reglamentos de uso de Boxeo",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>Deben utilizar calzado deportivo dentro de la instalación con suela de goma o lisa.</li>
            <li>Es obligatorio el uso de guantes y toalla.</li>
            <li>No se permite quitarse la camisa dentro de la instalación.</li>
            <li>El uso del espacio es exclusivo solamente para boxeo.</li>
            <li>No se permite guindarse sobre en los sacos o mover las peras.</li>
            <li>Está prohibido el consumo de alimentos, salvo agua o bebidas hidratantes.</li>
            <li>No están permitidos los envases sin tapa o de vidrio.</li>
            <li>Se permite reproducir música a bajo volumen, de manera que no incomodes o afectes el entrenamiento de las demás personas.</li>
            <li>Cada persona usa estas instalaciones bajo su propia responsabilidad, teniendo en cuenta sus condiciones y limitaciones físicas y de salud.</li>
          </ol>
        ),
      },
      en: {
        title: "Boxing Regulations at Ciudad del Saber Park",
        content: `Our boxing facilities provide an ideal space for safe and efficient training, 
                  complying with all safety and usage regulations.`,
        buttonLabel: "Download the usage rules",
        modalTitle: "Boxing Usage Rules",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>Sports shoes with rubber or smooth soles must be worn inside the facility.</li>
            <li>Wearing gloves and a towel is mandatory.</li>
            <li>Removing your shirt inside the facility is not allowed.</li>
            <li>The space is exclusively for boxing.</li>
            <li>Hanging on the punching bags or moving the speed bags is not allowed.</li>
            <li>The consumption of food is prohibited, except for water or sports drinks.</li>
            <li>Unsealed or glass containers are not allowed.</li>
            <li>Music may be played at a low volume, ensuring it does not disturb or affect others' training.</li>
            <li>Each person uses these facilities at their own risk, taking into account their physical and health conditions and limitations.</li>
          </ol>
        ),
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
      modalTitle={content.modalTitle}
      modalDesc={content.modalDesc}
      onButtonClick={handleButtonClick}
      image="https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
    />
  );
}

const container = document.getElementById('nwp-boxeo-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}
