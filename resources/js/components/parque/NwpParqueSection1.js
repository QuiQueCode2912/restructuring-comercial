import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import PublicSpaceHero from '../PublicSpaceHero';
import { LanguageProvider, useLanguage } from '../context/LanguageProvider';

export default function NwpParqueSection1() {
  const { language } = useLanguage(); // Acceder al idioma seleccionado
  const [content, setContent] = useState({}); // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Un espacio abierto al público",
        content: "El corazón verde del campus, ideal para realizar actividades recreativas, deportivas o de esparcimiento. Parque Ciudad del Saber está abierto a sus visitantes de forma gratuita todos los días del año.",
        buttonLabel: "Reglamento de uso del Parque Ciudad del Saber",
        buttonLabel2: "Políticas de reserva y cancelación de espacios de CDS",
      },
      en: {
        title: "A public open space",
        content: "The green heart of the campus, ideal for recreational, sports, or leisure activities. Ciudad del Saber Park is open to visitors free of charge every day of the year.",
        buttonLabel: "Regulation for use of the City of Knowledge Park",
        buttonLabel2: "CDS space reservation and cancellation policies",
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]); // Dependencia en el idioma

  const handleButtonClick = () => {
    // Lógica para descargar el reglamento de uso
    console.log('Button clicked');
  };

  const images = [
    '/assets/nwp-images/niña-en-columpio.jpg',
    '/assets/nwp-images/campo-naturaleza.jpg',
  ];

  return (
    <PublicSpaceHero 
      title={content.title}
      content={content.content}
      buttonLabel={content.buttonLabel}
      buttonLabel2={content.buttonLabel2}
      onButtonClick={handleButtonClick}
      images={images}
    />
  );
}

const container = document.getElementById('nwp-parque-section01');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <NwpParqueSection1 />
    </LanguageProvider>
  );
}