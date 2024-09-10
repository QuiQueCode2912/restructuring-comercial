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
        title: "Canchas de Tenis del Parque Ciudad del Saber",
        content: `Nuestras canchas de tenis están diseñadas para ofrecer un espacio óptimo para el entrenamiento 
                  y el disfrute de este deporte, con todas las comodidades necesarias.`,
        buttonLabel: "Descarga el reglamento de uso",
        modalTitle: "Reglamentos de uso de Canchas de Tenis",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>Deben utilizar calzado deportivo dentro de la instalación con suela de goma o lisa.</li>
            <li>No se permite quitarse la camisa dentro de la instalación.</li>
            <li>El uso de la cancha es exclusivo solamente para tenis.</li>
            <li>No se permite el ingreso de mascotas, dentro solo pueden estar los jugadores.</li>
            <li>Se permite reproducir música a bajo volumen, de manera que no incomodes o afectes el entrenamiento de las demás personas.</li>
            <li>El empleo de canastas con bolas o máquinas lanzadoras está reservado exclusivamente para instructores autorizados por la Administración. Los usuarios habituales deben restringirse al uso de un máximo de seis (6) pelotas por cancha.</li>
            <li>Cada persona usa estas instalaciones bajo su propia responsabilidad, teniendo en cuenta sus condiciones y limitaciones físicas y de salud.</li>
          </ol>
        ),
      },
      en: {
        title: "Tennis Courts at Ciudad del Saber Park",
        content: `Our tennis courts are designed to provide an optimal space for training 
                  and enjoying the sport, with all the necessary amenities.`,
        buttonLabel: "Download the usage rules",
        modalTitle: "Tennis Court Usage Rules",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>Sports shoes with rubber or smooth soles must be worn inside the facility.</li>
            <li>Removing your shirt inside the facility is not allowed.</li>
            <li>The court is exclusively for playing tennis.</li>
            <li>No pets are allowed inside, only players are permitted.</li>
            <li>Music may be played at a low volume, ensuring it does not disturb or affect others' training.</li>
            <li>The use of ball baskets or ball machines is reserved exclusively for instructors authorized by the Administration. Regular users are limited to using a maximum of six (6) balls per court.</li>
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

const container = document.getElementById('nwp-tenis-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}
