import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { NwpContentSectionWithAnImage } from '../../NwpContentSectionWithAnImage';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';

export default function ContentSectionWithAnImage() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Juega, entrena y gana ",
        content: `¡Ven y disfruta de nuestras canchas! Ya sea que busques un partido amistoso, mejorar tus habilidades o simplemente pasar un buen rato, nuestras instalaciones están listas para ti. Con espacios cómodos y bien equipados, te invitamos a compartir con amigos, entrenar y, sobre todo, divertirte. ¡Reserva tu cancha y haz que cada juego cuente!`,
        buttonLabel: "Ver el reglamento de uso",
        modalTitle: "Reglamentos de uso de Canchas de Baloncesto",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>En la cancha de tabloncillo sólo se permite calzado con suela de goma.</li>
            <li>Para la cancha al aire libre debes utilizar calzado deportivo.</li>
            <li>No se permite quitarse la camisa dentro de la instalación.</li>
            <li>Al momento del partido sólo pueden estar los 10 jugadores dentro de la cancha.</li>
            <li>El uso de la cancha es exclusivo solamente para jugar baloncesto.</li>
            <li>Está prohibido el consumo de alimentos, salvo agua o bebidas hidratantes.</li>
            <li>No están permitidos los envases sin tapa o de vidrio.</li>
            <li>Se permite reproducir música a bajo volumen, de manera que no incomodes o afectes el entrenamiento de las demás personas.</li>
            <li>Cada persona usa estas instalaciones bajo su propia responsabilidad, teniendo en cuenta sus condiciones y limitaciones físicas y de salud.</li>
          </ol>
        ),
      },
      en: {
        title: "Basketball Courts at Ciudad del Saber Park",
        content: `The basketball courts at Ciudad del Saber Park provide high-quality facilities for you to 
                  enjoy a great game, both in the indoor and outdoor courts.`,
        buttonLabel: "Download the usage rules",
        modalTitle: "Basketball Court Usage Rules",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>Only rubber-soled shoes are allowed on the indoor court.</li>
            <li>Sports shoes must be worn on the outdoor court.</li>
            <li>Removing your shirt inside the facility is not allowed.</li>
            <li>During the game, only the 10 players are allowed on the court.</li>
            <li>The court is exclusively for playing basketball.</li>
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

const container = document.getElementById('nwp-baloncesto-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}
