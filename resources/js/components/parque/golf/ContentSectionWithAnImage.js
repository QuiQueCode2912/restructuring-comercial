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
        title: "¡Disfruta y Relájate! Vive una Experiencia Única de Golf",
        content: `¡Ven y descubre nuestras canchas de golf, un lugar donde la naturaleza se encuentra con el deporte! 
                  Aquí, podrás disfrutar de un entorno hermoso mientras mejoras tu técnica y pasas un rato agradable con amigos o familiares. Ya seas un principiante o experto, nuestras canchas están diseñadas para todos los niveles.
                  ¡No esperes más, ven a jugar y siente la emoción del golf en Ciudad del Saber!`,

        buttonLabel: "Ver el reglamento de uso",
        modalTitle: "Reglamentos de uso de Golf",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>Traer sus propios implementos de golf. La Administración solo proporciona la canasta con la cantidad reservada.</li>
            <li>No se permite más de una persona por zona.</li>
            <li>Deben cumplir con el horario reservado.</li>
            <li>Las bolas reservadas deben utilizarse en su totalidad, no se realizará reembolso por el uso parcial de las bolas reservadas.</li>
            <li>Se permite un máximo de 200 bolas por cliente.</li>
          </ol>
        ),
      },
      en: {
        title: "Golf Course at Ciudad del Saber Park",
        content: `Enjoy our golf facilities with dedicated areas for practicing your shots. 
                  Bring your own equipment and take advantage of our reserved ball baskets.`,
        buttonLabel: "Download the usage rules",
        modalTitle: "Golf Usage Rules",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>Bring your own golf equipment. The administration only provides the basket with the reserved quantity.</li>
            <li>Only one person is allowed per zone.</li>
            <li>You must adhere to the reserved schedule.</li>
            <li>The reserved balls must be used in their entirety; no refunds will be issued for partial use of the reserved balls.</li>
            <li>A maximum of 200 balls per customer is allowed.</li>
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

const container = document.getElementById('nwp-golf-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}
