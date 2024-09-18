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
        title: "Un espacio para el desarrollo profesional ateneo",
        content: `Las Aulas 105 están pensadas para realizar actividades de negocios y formación académica, además de ofrecer capacitaciones originadas por institutos de educación superior, entidades gubernamentales, organismos internacionales y empresas.`,
        buttonLabel: "Ver el folleto",
        modalTitle: "Reglamentos de uso de Canchas de Voleibol",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>En la cancha de tabloncillo sólo se permite calzado con suela de goma.</li>
            <li>En la cancha de arena debe utilizar calzado deportivo.</li>
            <li>No se permite quitarse la camisa dentro de la instalación.</li>
            <li>En la cancha de tabloncillo sólo pueden estar los 12 jugadores dentro de la cancha al momento del partido.</li>
            <li>En la cancha de arena sólo pueden estar los 4 jugadores dentro de la cancha al momento del partido.</li>
            <li>El uso de la cancha es exclusivo solamente para jugar voleibol.</li>
            <li>Se prohíbe mover, guindarse y manipular la red.</li>
            <li>Está prohibido el consumo de alimentos, salvo agua o bebidas hidratantes.</li>
            <li>No están permitidos los envases sin tapa o de vidrio.</li>
            <li>Se permite reproducir música a bajo volumen, de manera que no incomodes o afectes el entrenamiento de las demás personas.</li>
            <li>Cada persona usa estas instalaciones bajo su propia responsabilidad, teniendo en cuenta sus condiciones y limitaciones físicas y de salud.</li>
          </ol>
        ),
      },
      en: {
        title: "Volleyball Courts at Ciudad del Saber Park",
        content: `Our volleyball courts, both indoor and sand, provide an excellent space for training 
                  and enjoying the sport in a safe and comfortable environment.`,
        buttonLabel: "Download the usage rules",
        modalTitle: "Volleyball Court Usage Rules",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>Only rubber-soled shoes are allowed on the indoor court.</li>
            <li>Sports shoes must be worn on the sand court.</li>
            <li>Removing your shirt inside the facility is not allowed.</li>
            <li>Only 12 players are allowed on the indoor court during the game.</li>
            <li>Only 4 players are allowed on the sand court during the game.</li>
            <li>The court is exclusively for playing volleyball.</li>
            <li>Moving, hanging on, or manipulating the net is prohibited.</li>
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

const container = document.getElementById('nwp-centro-convenciones-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}



