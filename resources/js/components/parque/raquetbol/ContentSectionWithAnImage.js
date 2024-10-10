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
        title: "¡Ven a Jugar Ráquetbol! Diversión y Competencia Te Esperan",
        content: `Juega ráquetbol en Ciudad del Saber y vive una experiencia llena de emoción y competencia.

                  Nuestras canchas están listas para recibirte, ya sea que busques entrenar, divertirte con amigos o desafiar a otros jugadores. 

                  Disfruta de un ambiente amigable y motivador, donde cada punto cuenta y la diversión nunca termina. ¡No esperes más, ven y únete a la acción en nuestras canchas de ráquetbol!`,
        buttonLabel: "Ver el reglamento de uso",
        modalTitle: "Reglamentos de uso de Canchas de Ráquetbol",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>El cliente debe traer su raqueta y pelotas para jugar.</li>
            <li>Es obligatorio el uso de lentes de protección para ingresar a las canchas.</li>
          </ol>
        ),
      },
      en: {
        title: "Racquetball Courts at Ciudad del Saber Park",
        content: `Our racquetball courts provide the perfect space to enjoy the sport, 
                  ensuring a safe and well-equipped environment.`,
        buttonLabel: "Download the usage rules",
        modalTitle: "Racquetball Court Usage Rules",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>The customer must bring their own racquet and balls to play.</li>
            <li>Protective eyewear is mandatory to enter the courts.</li>
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

const container = document.getElementById('nwp-raquetbol-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}
